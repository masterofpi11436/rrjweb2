<?php

declare(strict_types=1);

namespace App\Middleware;

use Framework\Request;
use Framework\Response;
use Framework\RequestHandlerInterface;
use Framework\MiddlewareInterface;

class ChangeRequestExample implements MiddlewareInterface
{
    /**
     * Process the request and modify the post array.
     *
     * @param Request $request The current request.
     * @param RequestHandlerInterface $next The next handler in the chain.
     * @return Response The response from the next middleware or controller.
     */
    public function process(Request $request, RequestHandlerInterface $next): Response
    {
        // Trim leading and trailing spaces from all post data.
        $request->post = array_map("trim", $request->post);
        
        // Pass the request to the next middleware or controller.
        $response = $next->handle($request);

        return $response;
    }
}