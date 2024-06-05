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
 * Controller for handling administrator-related actions.
 */
class Admins extends Controller
{
    public function __construct(private User $model){}

    public function dashboard(): Response
    {
        // Render the header
        $this->response->appendBody($this->viewer->render("shared/header.php", ["title" => "Admin Dashboard", "heading" => "Admin Dashboard"]));

        // Render the dashboard console
        $this->response->appendBody($this->viewer->render("Admins/dashboard.php"));

        // Render the footer
        $this->response->appendBody($this->viewer->render("shared/footer.php", ["creator" => "Mark Tuggle"]));

        return $this->response;
    }

    /**
     * Retrieves the user by ID.
     *
     * @param string $id The user ID
     * @return array The user data
     * @throws PageNotFoundException If the user is not found
     */
    private function getUserID(string $id): array
    {
        // Assign this model's id to the $user variable to the 
        $user = $this->model->getOne($id);

        // Verify if the user was found
        if ($user === false) {

            throw new PageNotFoundException("No Information Found");
        }

        return $user;
    }

    /**
     * Displays all users or search results.
     */
    public function viewAll(): Response
    {
        $search = $this->request->get['search'] ?? '';

        if ($search) {
            // Perform search query
            $users = $this->model->searchUsers($search);
        } else {
            // Retrieve all records if no search query
            $users = $this->model->getAll();
        }

        // Render the header
        $this->response->appendBody($this->viewer->render("shared/header.php", ["title" => "Manage Users", "heading" => "Manage Users"]));

        // Render the all users view
        $this->response->appendBody($this->viewer->render("Admins/all_users.php", ["users" => $users]));

        // Render the footer
        $this->response->appendBody($this->viewer->render("shared/footer.php", ["creator" => "Mark Tuggle"]));

        return $this->response;
    }


    /**
     * Displays a single user by ID.
     *
     * @param string $id The user ID
     */
    public function viewOne(string $id)
    {
        $user = $this->getUserID($id);

        // Render the header
        $this->response->appendBody($this->viewer->render("shared/header.php", ["title" => "Showing One Listing", "heading" => "Showing One Listing"]));

        // Render the one user view
        $this->response->appendBody($this->viewer->render("Admins/one_user.php", ["user" => $user]));

        // Render the footer
        $this->response->appendBody($this->viewer->render("shared/footer.php", ["creator" => "Mark Tuggle"]));

        return $this->response;
    }

    /**
     * Renders the form to add a new user.
     */
    public function addNewUser()
    {
        // Render the header
        $this->response->appendBody($this->viewer->render("shared/header.php", ["title" => "Add User", "heading" => "Add User"]));

        // Render the form for adding a new user
        $this->response->appendBody($this->viewer->render("Admins/add_user.php"));

        // Render the footer
        $this->response->appendBody($this->viewer->render("shared/footer.php", ["creator" => "Mark Tuggle"]));

        return $this->response;
    }

    /**
     * Creates a new user.
     */
    public function create(): Response
    {
        // Get the form data
        $data = [
            "first_name" => $this->request->post["first_name"],
            "last_name" => $this->request->post["last_name"],
            "email" => $this->request->post["email"],
            "password" => $this->request->post["password"],
            "role_id" => $this->request->post["role_id"]
        ];

        // Attempt to insert the new user record
        if ($this->model->insertRecord($data)) {
            // Redirect to the newly created user's page
            return $this->redirect("/admins/one/{$this->model->getInsertID()}");
        } else {
            // Render the form again with error messages
            $this->response->appendBody($this->viewer->render("shared/header.php", ["title" => "Add User", "heading" => "Add User Listing"]));
            $this->response->appendBody($this->viewer->render("Admins/add_user.php", ["errorMessage" => $this->model->getErrors(), "user" => $data]));
            $this->response->appendBody($this->viewer->render("shared/footer.php", ["creator" => "Mark Tuggle"]));

            return $this->response;
        }
    }


    /**
     * Renders the form to edit an existing user.
     *
     * @param string $id The user ID
     */
    public function editUser(string $id)
    {
        $user = $this->getUserID($id);

        // Render the header
        $this->response->appendBody($this->viewer->render("shared/header.php", ["title" => "Edit Number", "heading" => "Edit Number"]));

        // Render the edit user view
        $this->response->appendBody($this->viewer->render("Admins/edit_user.php", ["user" => $user]));

        // Render the footer
        $this->response->appendBody($this->viewer->render("shared/footer.php", ["creator" => "Mark Tuggle"]));

        return $this->response;
    }

    /**
     * Updates an existing user.
     *
     * @param string $id The user ID
     */
    public function updateUser(string $id): Response
    {
        // Retrieve the user record
        $user = $this->getUserID($id);

        // Get the form data and set empty fields to null
        $user["first_name"] = $this->request->post["first_name"];
        $user["last_name"] = $this->request->post["last_name"];
        $user["email"] = $this->request->post["email"];
        $user["role_id"] = $this->request->post["role_id"];
        $user["password"] = $this->request->post["password"];

        // Attempt to update the user record
        if ($this->model->updateRecord($id, $user)) {
            // Redirect to the updated user's page
            return $this->redirect("/admins/one/{$id}");
        } else {
            // Render the form again with error messages if update fails
            $this->response->appendBody($this->viewer->render("shared/header.php", ["title" => "Edit User", "heading" => "Edit User"]));
            $this->response->appendBody($this->viewer->render("Admins/edit_user.php", ["errorMessage" => $this->model->getErrors(), "user" => $user]));
            $this->response->appendBody($this->viewer->render("shared/footer.php", ["creator" => "Mark Tuggle"]));

            return $this->response;
        }
    }

    /**
     * Renders the form to delete a user.
     *
     * @param string $id The user ID
     */
    public function deleteUser($id)
    {
        // Get the ID of the record
        $user = $this->getUserID($id);

        // Render the header
        $this->response->appendBody($this->viewer->render("shared/header.php", ["title" => "Delete Listing", "heading" => "Delete Listing"]));

        // Render the new user form
        $this->response->appendBody($this->viewer->render("Admins/delete_user.php", ["user" => $user]));

        // Render the footer
        $this->response->appendBody($this->viewer->render("shared/footer.php", ["creator" => "Mark Tuggle"]));

        return $this->response;
    }

    /**
     * Deletes a user.
     *
     * @param string $id The user ID
     */
    public function destroyUser(string $id): Response
    {
        $user = $this->getUserID($id);

        $this->model->deleteRecord($id);

        return $this->redirect("/admins/all");
    }
}