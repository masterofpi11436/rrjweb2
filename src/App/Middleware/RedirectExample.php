<?php

declare(strict_types=1);

namespace App\Middleware;

use Framework\Request;
use Framework\Response;
use Framework\RequestHandlerInterface;
use Framework\MiddlewareInterface;

class RedirectExample implements MiddlewareInterface
{
    /**
     * Constructor.
     *
     * @param Response $response The response instance.
     */
    public function __construct(private Response $response){}

    /**
     * Process the request and redirect the user.
     *
     * @param Request $request The current request.
     * @param RequestHandlerInterface $next The next handler in the chain.
     * @return Response The redirect response.
     */
    public function process(Request $request, RequestHandlerInterface $next): Response
    {
        // Redirect to a different URL.
        $this->response->redirect("/products/hello");

        return $this->response;
    }
}