<?php

declare(strict_types=1);

namespace App\Middleware;

use Framework\Request;
use Framework\Response;
use Framework\RequestHandlerInterface;
use Framework\MiddlewareInterface;

class UserAuthorization implements MiddlewareInterface
{
    /**
     * Constructor.
     *
     * @param Response $response The response instance.
     */
    public function __construct(private Response $response){}

    /**
     * Process the request and authorize the user.
     *
     * @param Request $request The current request.
     * @param RequestHandlerInterface $next The next handler in the chain.
     * @return Response The response from the next middleware or controller.
     */
    public function process(Request $request, RequestHandlerInterface $next): Response
    {
        // Check if the user is logged in
        if (!isset($_SESSION['user_id'])) {
            // Redirect to the login page if not logged in
            $this->response->redirect('/login');
            return $this->response;
        }

        // Proceed to the next middleware or controller
        return $next->handle($request);
    }
}