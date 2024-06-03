<?php

declare(strict_types=1);

namespace App\Middleware;

use Framework\Request;
use Framework\Response;
use Framework\RequestHandlerInterface;
use Framework\MiddlewareInterface;
use Framework\Exceptions\PageNotFoundException;

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
        // Start the session if it is not already started
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        // Check if the user is logged in
        if (!isset($_SESSION['user_id'])) {
            // Redirect to the login page if not logged in
            $this->response->redirect('/login');
            return $this->response;
        }

        // Get user role id from session
        $roleId = $_SESSION['role_id'] ?? null;

        // Check if the user has permission to access the requested route
        $route = $request->uri;
        if (!$this->hasAccess($route, $roleId)) {
            throw new PageNotFoundException("You do not have access to this page.");
        }

        // Proceed to the next middleware or controller
        return $next->handle($request);
    }

    private function hasAccess(string $route, ?int $roleId): bool
    {
        $rolePermissions = [
            1 => ['/.*'], // Role ID 1 (admin): Access to all routes
            2 => ['/tablets/.*'], // Role ID 2: Access to tablet-related routes
            3 => ['/phones/.*'], // Role ID 3: Access to phone-related routes
        ];

        if ($roleId === null) {
            return false;
        }

        // Check if the route matches the role's permissions
        foreach ($rolePermissions[$roleId] ?? [] as $pattern) {
            if (preg_match("#^{$pattern}$#", $route)) {
                return true;
            }
        }

        return false;
    }
}
