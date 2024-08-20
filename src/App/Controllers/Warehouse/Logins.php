<?php

// Enforce type checking
declare(strict_types=1);

namespace App\Controllers\Warehouse;

use App\Security\User;
use Framework\Viewer;
use Framework\Exceptions\PageNotFoundException;
use Framework\Controller;
use Framework\Response;
use Framework\Request;
use App\Models\Warehouse\Mail;

/**
 * Controller for handling user-related actions.
 */
class Logins extends Controller
{
    /**
     * Constructor.
     *
     * @param User $model The user model
     */
    public function __construct(private User $model, private Mail $mailer){}

    // Log in Page
    public function login(): Response
    {
        $this->response->appendBody($this->viewer->render("shared/warehouse_header.php", ["title" => "Admin Login", "heading" => "Log In"]));

        $this->response->appendBody($this->viewer->render("Warehouse/Logins/login.php"));

        $this->response->appendBody($this->viewer->render("shared/footer.php", ["creator" => "Mark Tuggle"]));

        return $this->response;
    }

    // Modify the auth() method in Users controller
    public function auth(): Response
    {
        $data = [
            "email" => $this->request->post["email"],
            "password" => $this->request->post["password"]
        ];

        if ($this->model->validateLogin($data)) {
            $user = $this->model->findByEmail($data["email"]);
            if ($user && password_verify($data['password'], $user['password'])) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_email'] = $user['email'];
                $_SESSION['role_id'] = $user['warehouse_role']; // Store role_id in session

                // Redirect based on role
                switch ($user['warehouse_role']) {
                    case 8:
                        return $this->redirect('/warehouse/dashboard');
                    case 9:
                        return $this->redirect('/warehouse/supervisors/dashboard');
                    case 10:
                        return $this->redirect('/warehouse/users/section');
                    case 11:
                        return $this->redirect('/warehouse/warehousesupervisors/dashboard');
                    default:
                        return $this->redirect('/login'); // Default fallback
                }
            }
        }

        // Set error message
        $errorMessage = 'Incorrect email or password. Please try again.';

        $this->response->appendBody($this->viewer->render("shared/warehouse_header.php", ["title" => "Admin Login", "heading" => "Log In"]));
        $this->response->appendBody($this->viewer->render("Logins/login.php", ["errorMessage" => $errorMessage]));
        $this->response->appendBody($this->viewer->render("shared/footer.php", ["creator" => "Mark Tuggle"]));

        return $this->response;
    }

    public function logout(): Response
    {
        // Destroy the session
        session_destroy();

        // Redirect to the login page or home page
        return $this->redirect('/warehouse/login');
    }
}