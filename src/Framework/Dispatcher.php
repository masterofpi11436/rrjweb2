<?php

// Enforce type checking
declare(strict_types=1);

namespace Framework;

// Use ReflectionMethod to get information about class methods
use ReflectionMethod;
use UnexpectedValueException;

// Using custom Exception class
use Framework\Exceptions\PageNotFoundException;

class Dispatcher
{
    /**
     * Constructor.
     *
     * @param Router $router The router object
     * @param Container $container The service container object
     */
    public function __construct(private Router $router, private Container $container, private array $middleware_classes) {}

    /**
     * Handles the dispatching of the matched route from the router and performs necessary actions.
     *
     * @param Request $request The current request
     */
    public function handle(Request $request): Response
    {
        $path = $this->getPath($request->uri);

        // Match the requested path with the defined routes
        $params = $this->router->match($path, $request->method);

        // If no matching route is found, exit with a "Page not Found" message
        if ($params === false) {

            throw new PageNotFoundException("No route matched for $path with the method '{$request->method}'");
        }

        // Build the fully qualified name of the controller class
        $controller = $this->getControllerName($params);

        // Get the action method name
        $action = $this->getActionName($params);

        // Get the controller object with its dependencies recursively resolved
        $controller_object = $this->container->get($controller);

        // Set the request and viewer objects in the controller
        $controller_object->setViewer($this->container->get(Viewer::class));

        $controller_object->setResponse($this->container->get(Response::class));


        // Get the arguments for the action method using reflection
        $args = $this->getActionArguments($controller, $action, $params);
        
        // Create a controller request handler.
        $controller_handler = new ControllerRequestHandler($controller_object,
                                                           $action,
                                                           $args);

        // Get the middleware for the current route.
        $middleware = $this->getMiddleware($params);

        // Create a middleware request handler.
        $middleware_handler = new MiddlewareRequestHandler($middleware,
                                                           $controller_handler);

                                                           // Handle the request and return the response.
        return $middleware_handler->handle($request);
    }

    /**
     * Get the middleware for the current route.
     *
     * @param array $params The route parameters.
     * @return array The array of middleware instances.
     */
    private function getMiddleware(array $params): array
    {
        if ( ! array_key_exists("middleware", $params)) {

            return [];

        }
        
        $middleware = explode("|", $params["middleware"]);

        array_walk($middleware, function(&$value) {

            if ( ! array_key_exists($value, $this->middleware_classes)) {

                throw new UnexpectedValueException("Middleware '$value' not found in config settings");

            }

            $value = $this->container->get($this->middleware_classes[$value]);

        });

        return $middleware;
    }

    /**
     * Gets the arguments for the action method using reflection.
     *
     * @param string $controller The fully qualified controller class name
     * @param string $action The action method name
     * @param array $params The route parameters
     * @return array The arguments for the action method
     */
    private function getActionArguments(string $controller, string $action, array $params): array
    {
        $args = [];

        // Instantiate the ReflectionMethod to analyze the method's parameters
        $method = new ReflectionMethod($controller, $action);

        // For each parameter of the method, retrieve its name and find the corresponding value in $params
        foreach ($method->getParameters() as $parameters) {

            $name = $parameters->getName();

            $args[$name] = $params[$name];
        }

        return $args;
    }

    /**
     * Converts the controller name from the route's path to a fully qualified class name.
     *
     * @param array $params The route parameters
     * @return string The fully qualified controller class name
     */
    private function getControllerName(array $params): string
    {
        // Get the controller name from the route parameters
        $controller = $params["controller"];

        // Convert the controller name to studly caps (e.g., "home-controller" to "HomeController")
        $controller = str_replace("-", "", ucwords(strtolower($controller), "-"));

        // Define the base namespace for controllers
        $namespace = "App\Controllers";

        // Append any additional namespace from the route parameters
        if (array_key_exists("namespace", $params)) {

            $namespace .= "\\" . $params["namespace"];
        }

        // Return the fully qualified controller class name
        return $namespace . "\\" . $controller;
    }

    /**
     * Converts the action name from the route's path to a camel case method name.
     *
     * @param array $params The route parameters
     * @return string The camel case action method name
     */
    private function getActionName(array $params): string
    {
        // Get the action name from the route parametersv
        $action = $params["action"];

        // Convert the action name to camel case (e.g., "show-page" to "showPage")
        $action = lcfirst(str_replace("-", "", ucwords(strtolower($action), "-")));

        return $action;
    }

    /**
     * Parses the URI to extract the path.
     *
     * @param string $uri The full request URI
     * @return string The parsed path
     * @throws UnexpectedValueException If the URL is malformed
     */
    public function getPath(string $uri): string
    {
        // Parse the URL as a string
        $path = parse_url($uri, PHP_URL_PATH);

        // Check if the URL is malformed
        if ($path === false) {

            throw new UnexpectedValueException("Malformed URL: '{$uri}'");
        }

        return $path;
    }
}