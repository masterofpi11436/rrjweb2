<?php

declare(strict_types=1);

namespace App\Middleware;

use Framework\Request;
use Framework\Response;
use Framework\RequestHandlerInterface;
use Framework\MiddlewareInterface;
use App\Security\User;

class UserAuthorization implements MiddlewareInterface
{
    /**
     * Constructor.
     *
     * @param Response $response The response instance.
     */
    public function __construct(private Response $response, private User $userModel){}

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
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if (!isset($_SESSION['last_activity'])) {
            
            $_SESSION['last_activity'] = time();

        }
        // Session duration
        $sessionDuration = 3600;

        if (!isset($_SESSION['user_id']) || time() - $_SESSION['last_activity'] > $sessionDuration) {
            session_unset();
            session_destroy();
            $this->response->redirect('/login');
            return $this->response;
        }

        // Update the last activity time stamp
        $_SESSION['last_activity'] = time();

        $userId = $_SESSION['user_id'];
        $roleId = $_SESSION['role_id'] ?? null;

        if (!isset($_SESSION['user_first_name']) || !isset($_SESSION['user_last_name'])) {
            $user = $this->userModel->findById($userId);
            if ($user) {
                $_SESSION['user_first_name'] = $user['first_name'];
                $_SESSION['user_last_name'] = $user['last_name'];
            } else {
                $this->response->redirect('/login');
                return $this->response;
            }
        }

        // Check if the user has permission to access the requested route
        $route = $request->uri;
        if ($this->hasAccess($route, $roleId)) {
            // Proceed to the next middleware or controller if access is allowed
            return $next->handle($request);
        } else {
            $this->response->redirect('/login');
            return $this->response;
        }
    }

    private function hasAccess(string $route, int|string $roleId): bool
    {
        $rolePermissions = [
            1 => ['/.*'], // Role ID 1 (admin): Access to all routes
            2 => ['/tablets/.*'], // Role ID 2: Access to tablet-related routes
            3 => ['/phones/.*'], // Role ID 3: Access to phone-related routes
            4 => ['/mailrooms/.*'], // Role ID 4: Access to OPR and Mailroom-related routes
            5 => ['/programs/.*'], // Role ID 5: Access to programs-related routes
            6 => ['/programs/contractors/.*'], // Role ID 6: Access to the program's contractor-related routes
            7 => ['/programs/volunteers/.*'], // Role ID 7: Access to the program's volunteer-related routes
            8 => ['/warehouse/.*'], // Role ID 8: Access to the WSR Manager-related routes
            9 => ['/warehouse/supervisors/.*'], // Role ID 9: Access to the WSR Supervisor-related routes
            10 => ['/warehouse/users/.*'], // Role ID 10: Access to the WSR User-related routes
            11 => ['/warehouse/.*'], // Role ID 11: Access to the WSR supervisor-related routes
        ];

        if ($roleId === null) {
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
