<?php

declare(strict_types=1);

namespace Framework;

class ControllerRequestHandler implements RequestHandlerInterface
{
    /**
     * Constructor.
     *
     * @param Controller $controller The controller instance.
     * @param string $action The action method name.
     * @param array $args Arguments for the action method.
     */
    public function __construct(private Controller $controller,
                                private string $action,
                                private array $args)
    {
    }

    /**
     * Handle the request by invoking the controller action.
     *
     * @param Request $request The current request.
     * @return Response The response from the controller action.
     */
    public function handle(Request $request): Response
    {
        // Set the request in the controller.
        $this->controller->setRequest($request);

        // Call the controller action with the provided arguments and return the response.
        return ($this->controller)->{$this->action}(...$this->args);
    }
}