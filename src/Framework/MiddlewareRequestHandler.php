<?php

declare(strict_types=1);

namespace Framework;

class MiddlewareRequestHandler implements RequestHandlerInterface
{
    /**
     * Constructor.
     *
     * @param array $middlewares Array of middleware instances.
     * @param RequestHandlerInterface $controller_handler The controller handler.
     */
    public function __construct(private array $middlewares, private ControllerRequestHandler $controller_handler){}

    /**
     * Handle the request by passing it through the middleware chain.
     *
     * @param Request $request The current request.
     * @return Response The response from the middleware chain or controller.
     */
    public function handle(Request $request): Response
    {
        // Shift the first middleware off the stack.
        $middleware = array_shift($this->middlewares);

        // If no more middleware, handle the request with the controller.
        if ($middleware === null) {

            return $this->controller_handler->handle($request);
        }

        // Process the request with the current middleware and pass the rest of the chain.
        return $middleware->process($request, $this);
    }
}