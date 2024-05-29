<?php

declare(strict_types=1);

namespace App\Middleware;

use Framework\Request;
use Framework\Response;
use Framework\RequestHandlerInterface;
use Framework\MiddlewareInterface;

class ChangeResponseExample implements MiddlewareInterface
{
    /**
     * Process the request and modify the response body.
     *
     * @param Request $request The current request.
     * @param RequestHandlerInterface $next The next handler in the chain.
     * @return Response The modified response.
     */
    public function process(Request $request, RequestHandlerInterface $next): Response
    {
        // Pass the request to the next middleware or controller.
        $response = $next->handle($request);

        // Modify the response body.
        $response->setBody($response->getBody() . " Hello from the middleware");

        return $response;
    }
}