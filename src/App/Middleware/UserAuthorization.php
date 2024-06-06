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
        // Start the session if it is not already started
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        // Check if the user is logged in
        if (!isset($_SESSION['user_id'])) {
            // Log the event
            error_log("User not logged in. Redirecting to login page.");
            // Redirect to the login page if not logged in
            $this->response->redirect('/login');
            return $this->response;
        }

        // Get user role id from session
        $roleId = $_SESSION['role_id'] ?? null;

        // Check if the user has permission to access the requested route
        $route = $request->uri;
        if ($this->hasAccess($route, $roleId)) {
            // Proceed to the next middleware or controller if access is allowed
            return $next->handle($request);
        } else {
            // Log the access denial
            error_log("Access denied for role ID $roleId to route: $route. Redirecting to login page.");
            $this->response->redirect('/login');
            return $this->response;
        }
    }

    private function hasAccess(string $route, ?int $roleId): bool
    {
        $rolePermissions = [
            1 => ['/.*'], // Role ID 1 (admin): Access to all routes
            2 => ['/tablets/.*'], // Role ID 2: Access to tablet-related routes
            3 => ['/phones/.*'], // Role ID 3: Access to phone-related routes
            4 => ['/mailrooms/.*'], // Role ID 4: Access to phone-related routes
        ];

        if ($roleId === null) {
            // Log the missing role ID
            error_log("Role ID is null for user trying to access: $route");
            return false;
        }

        // Admin has access to all routes
        if ($roleId == 1) {
            return true;
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
