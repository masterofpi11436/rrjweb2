<?php

// Enforce type checking
declare(strict_types=1);

namespace App\Controllers;

use App\Security\User;
use Framework\Viewer;
use Framework\Exceptions\PageNotFoundException;
use Framework\Controller;
use Framework\Response;
use Framework\Request;
use Framework\Mailer;

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
    public function __construct(private User $model, private Mailer $mailer){}

    // Log in Page
    public function login(): Response
    {
        $this->response->appendBody($this->viewer->render("shared/header.php", ["title" => "Admin Login", "heading" => "Log In"]));

        $this->response->appendBody($this->viewer->render("Logins/login.php"));

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
                $_SESSION['role_id'] = $user['role_id']; // Store role_id in session

                // Redirect based on role
                switch ($user['role_id']) {
                    case 1:
                        return $this->redirect('/admins/dashboard');
                    case 2:
                        return $this->redirect('/tablets/all');
                    case 3:
                        return $this->redirect('/phones/all');
                    case 4:
                        return $this->redirect('/mailrooms/all');
                    case 5:
                        return $this->redirect('/programs/dashboard');
                    case 6:
                        return $this->redirect('/programs/contractors/all');
                    case 7:
                        return $this->redirect('/programs/volunteers/all');
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

        $this->response->appendBody($this->viewer->render("shared/header.php", ["title" => "Admin Login", "heading" => "Log In"]));
        $this->response->appendBody($this->viewer->render("Logins/login.php", ["errorMessage" => $errorMessage]));
        $this->response->appendBody($this->viewer->render("shared/footer.php", ["creator" => "Mark Tuggle"]));

        return $this->response;
    }

    // Log out of the current session
    public function logout(): Response
    {
        // Destroy the session
        session_destroy();

        // Redirect to the login page or home page
        return $this->redirect('/login');
    }

    // Page to verify email of user if password is forgotten
    public function forgotPassword(): Response
    {
        $this->response->appendBody($this->viewer->render("shared/header.php", ["title" => "Forgot Password", "heading" => "Verify Your Email"]));
        $this->response->appendBody($this->viewer->render("Logins/forgot.php", ["title" => "Forgot Password"]));
        $this->response->appendBody($this->viewer->render("shared/footer.php", ["creator" => "Mark Tuggle"]));

        return $this->response;
    }

    public function verifyUser(): Response
    {
        $email = $this->request->post["email"] ?? '';
        $errorMessage = "";

        if (empty($email)) {
            $errorMessage = "Email is required";
        } else {
            $user = $this->model->findByEmail($email);

            if ($user) {
                $token = bin2hex(random_bytes(50));
                $expiry = date('Y-m-d H:i:s', strtotime('+1 hour'));

                $this->model->storeResetToken($user['id'], $token, $expiry);

                $resetLink = "http://rrjweb2/reset_password?token=$token";
                $sendResult = $this->mailer->sendNewPass($email, $resetLink);

                if ($sendResult === true) {
                    return $this->redirect("/success");
                } else {
                    $errorMessage = $sendResult;
                }
            } else {
                $errorMessage = "No account is found with that email, please verify your email is correct";
            }
        }

        $this->response->appendBody($this->viewer->render("shared/header.php", ["title" => "Forgot Password", "heading" => "Verify Your Email"]));
        $this->response->appendBody($this->viewer->render("Logins/forgot.php", ["errorMessage" => $errorMessage]));
        $this->response->appendBody($this->viewer->render("shared/footer.php"));

        return $this->response;
    }

    // Success page if the user was found and an email was sent
    public function success(): Response
    {
        $this->response->appendBody($this->viewer->render("shared/header.php", ["title" => "Success", "heading" => "Email Sent Has Been Sent"]));

        $this->response->appendBody($this->viewer->render("Logins/success.php"));

        $this->response->appendBody($this->viewer->render("shared/footer.php", ["creator" => "Mark Tuggle"]));

        return $this->response;
    }

    // Password reset pages
    public function resetPassword(): Response
    {
        $token = $this->model->getToken();

        $errorMessage = '';

        if ((strtotime($token['token_expiry'])) <= time()) {
            $errorMessage = "Time limit has expired for this reset, please go back and reset again";
        }

        $this->response->appendBody($this->viewer->render("shared/header.php", ["title" => "Reset Password", "heading" => "Reset Your Password"]));
        $this->response->appendBody($this->viewer->render("Logins/reset_password.php", ["token" => $token, "errorMessage" => $errorMessage]));
        $this->response->appendBody($this->viewer->render("shared/footer.php", ["creator" => "Mark Tuggle"]));

        return $this->response;
    }


    public function createNewPassword(): Response
    {
        // Get the form data
        $data = [
            "new_password" => $this->request->post["new_password"],
            "confirm_password" => $this->request->post["confirm_password"],
            "reset_token" => $this->request->post["reset_token"]
        ];

        // Validate the form data
        if ($data['new_password'] !== $data['confirm_password']) {
            $errorMessage = "Passwords do not match.";
        } else {
            $errorMessage = '';

            // Attempt to update the password
            if ($this->model->updatePassword($data)) {
                return $this->redirect("/login");
            } else {
                $errorMessage = "Failed to update the password.";
            }
        }

        // Render the form again with error messages
        $this->response->appendBody($this->viewer->render("shared/header.php", ["title" => "Reset Password", "heading" => "Reset Your Password"]));
        $this->response->appendBody($this->viewer->render("Logins/reset_password.php", ["errorMessage" => $errorMessage, "user" => $data, "token" => ["reset_token" => $data["reset_token"]]]));
        $this->response->appendBody($this->viewer->render("shared/footer.php", ["creator" => "Mark Tuggle"]));

        return $this->response;
    }

    // New User sets new password
    public function newPassword(): Response
    {

    }
    // New User's password is updated to the database after registration link is sent.
    public function processNewPassword(): Response
    {

    }

}
