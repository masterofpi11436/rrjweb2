<?php

// Enforce type checking
declare(strict_types=1);

namespace App\Controllers;

use App\Security\User;
use Framework\Viewer;
use Framework\Exceptions\PageNotFoundException;
use Framework\Controller;
use Framework\Response;

/**
 * Controller for handling user-related actions.
 */
class Users extends Controller
{
    /**
     * Constructor.
     *
     * @param User $model The user model
     */
    public function __construct(private User $model){}

    // Log in Page
    public function login(): Response
    {
        $this->response->appendBody($this->viewer->render("shared/header.php", ["title" => "Admin Login", "heading" => "Log In"]));

        $this->response->appendBody($this->viewer->render("login.php"));

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
            $password = $this->model->findByPassword($data["password"]);
            if ($user && $password) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_email'] = $user['email'];
                $_SESSION['role_id'] = $user['role_id']; // Store role_id in session

                // Redirect based on role
                switch ($user['role_id']) {
                    case 1:
                        return $this->redirect('/admins/dashboard'); // Admin dashboard or relevant page
                    case 2:
                        return $this->redirect('/tablets/all');
                    case 3:
                        return $this->redirect('/phones/all');
                    default:
                        return $this->redirect('/login'); // Default fallback
                }
            }
        }

        // Set error message
        $errorMessage = 'Incorrect email or password. Please try again.';

        $this->response->appendBody($this->viewer->render("shared/header.php", ["title" => "Admin Login", "heading" => "Log In"]));
        $this->response->appendBody($this->viewer->render("login.php", ["errorMessage" => $errorMessage]));
        $this->response->appendBody($this->viewer->render("shared/footer.php", ["creator" => "Mark Tuggle"]));

        return $this->response;
    }
}
