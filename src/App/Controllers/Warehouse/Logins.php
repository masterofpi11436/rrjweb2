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
        $this->response->appendBody($this->viewer->render("shared/warehouse_header.php", ["title" => "WSR Login", "heading" => ""]));

        $this->response->appendBody($this->viewer->render("Warehouse/Logins/login.php")); //login       coming_soon

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
    
        // Initialize session attempt counter if not set
        if (!isset($_SESSION['login_attempts'])) {
            $_SESSION['login_attempts'] = 0;
        }
    
        // Validate the login data
        if (!$this->model->validateLogin($data)) {
            $errors = $this->model->getErrors();
    
            $this->response->appendBody($this->viewer->render("shared/warehouse_header.php", ["title" => "Admin Login", "heading" => "Log In"]));
            $this->response->appendBody($this->viewer->render("Warehouse/Logins/login.php", ["errors" => $errors]));
            $this->response->appendBody($this->viewer->render("shared/footer.php", ["creator" => "Mark Tuggle"]));
    
            return $this->response;
        }
    
        $user = $this->model->findByEmail($data["email"]);
        if ($user && password_verify($data['password'], $user['password'])) {
            // Reset attempts on successful login
            $_SESSION['login_attempts'] = 0;
    
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
                case 12:
                    return $this->redirect('/warehouse/properties/dashboard');
                default:
                    return $this->redirect('/warehouse/login'); // Default fallback
            }
        } else {
            // Increment the attempt counter
            $_SESSION['login_attempts']++;
    
            // Check if attempts exceed the limit
            if ($_SESSION['login_attempts'] >= 3) {
                // If the user doesn't exist after 3 attempts, suggest they may not have an account
                if (!$user) {
                    $errorMessage = 'It seems you may not have an account. Please reach out to the Warehouse Manager to get an account.';
                    $_SESSION['login_attempts'] = 0;
                } else {
                    $errorMessage = 'If you have forgotten your password, click the reset password button to change it.';
                }
            } else {
                $errorMessage = 'Incorrect email or password. Please try again.';
            }
    
            $this->response->appendBody($this->viewer->render("shared/warehouse_header.php", ["title" => "Admin Login", "heading" => "Log In"]));
            $this->response->appendBody($this->viewer->render("Warehouse/Logins/login.php", ["errorMessage" => $errorMessage]));
            $this->response->appendBody($this->viewer->render("shared/footer.php", ["creator" => "Mark Tuggle"]));
    
            return $this->response;
        }
    }
    
    
    

    public function logout(): Response
    {
        // Destroy the session
        session_destroy();

        // Redirect to the login page or home page
        return $this->redirect('/warehouse/login');
    }
}