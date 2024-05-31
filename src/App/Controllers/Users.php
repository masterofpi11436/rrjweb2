<?php

// Enforce type checking
declare(strict_types=1);

namespace App\Controllers;

use App\Models\User;
use Framework\Viewer;
use Framework\Exceptions\PageNotFoundException;
use Framework\Controller;
use Framework\Response;

/**
 * Controller for handling tablet-related actions.
 */
class Users extends Controller
{
    /**
     * Constructor.
     *
     * @param User $model The tablet model
     */
    public function __construct(private User $model){}

    // Log in Page
    public function login(): Response
    {
        $this->response->appendBody($this->viewer->render("shared/header.php", ["title" => "Admin Login", "heading" => "Log In"]));

        $this->response->appendBody($this->viewer->render("tablets/login.php"));

        $this->response->appendBody($this->viewer->render("shared/footer.php", ["creator" => "Mark Tuggle"]));

        return $this->response;
    }

    // Authorize the log in
    public function auth(): Response
    {
        // Form data
        $data = [
            "email" => $this->request->post["email"],
            "password" => $this->request->post["password"]
        ];

        // Authenticate the user
        if ($this->model->validateLogin($data)) {
            $user = $this->model->findByEmail($data["email"]);
            if ($user && password_verify($data["password"], $user['password'])) { // Access 'password' key in the array
                // Set up the session
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_email'] = $user['email'];

                // Redirect to the dashboard or desired page
                return $this->redirect('/tablets/all');
            }
        }

        // Render the form again with error messages
        $this->response->appendBody($this->viewer->render("shared/header.php", ["title" => "Admin Login", "heading" => "Log In"]));
        $this->response->appendBody($this->viewer->render("tablets/login.php", ["errorMessage" => $this->model->getErrors()]));
        $this->response->appendBody($this->viewer->render("shared/footer.php", ["creator" => "Mark Tuggle"]));

        return $this->response;
    }
}
