<?php

namespace Framework;

/**
* Process the request and pass it to the next middleware or to the controller.
*
* @param Request $request The current request.
* @param RequestHandlerInterface $next The next handler in the chain.
* @return Response The response from the next middleware or controller.
*/
interface MiddlewareInterface
{
    // Process the request and pass to next middle ware or to the controller
    public function process(Request $request, RequestHandlerInterface $next): Response;

}