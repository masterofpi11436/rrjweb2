<?php

// Enforce type checking
declare(strict_types=1);

namespace App\Controllers\Warehouse;

use App\Models\Warehouse\Admin;
use Framework\Viewer;
use Framework\Exceptions\PageNotFoundException;
use Framework\Controller;
use Framework\Response;

/**
 * Controller for handling admin-related actions.
 */
class Admins extends Controller
{
/**
     * Constructor.
     *
     * @param Admin $model The admin model
     */
    public function __construct(private Admin $model){}

    public function dashboard(): Response
    {
        // Render the header
        $this->response->appendBody($this->viewer->render("shared/header.php", ["title" => "Admin Dashboard", "heading" => "WSR Admin Dashboard"]));

        // Render the dashboard console
        $this->response->appendBody($this->viewer->render("Warehouse/Admins/dashboard.php"));

        // Render the footer
        $this->response->appendBody($this->viewer->render("shared/footer.php", ["creator" => "Mark Tuggle"]));

        return $this->response;
    }

    /**
     * Retrieves the admin by ID.
     *
     * @param string $id The admin ID
     * @return array The admin data
     * @throws PageNotFoundException If the admin is not found
     */
    private function getAdminID(string $id): array
    {
        // Assign this model's id to the $admin variable to the 
        $admin = $this->model->getOne($id);

        // Verify if the admin was found
        if ($admin === false) {

            throw new PageNotFoundException("No Information Found");
        }

        return $admin;
    }

    /**
     * Displays all inmates or search results.
     */
    public function viewAll(): Response
    {
        $search = $this->request->get['search'] ?? '';

        if ($search) {
            // Perform search query
            $admins = $this->model->searchAdminssWithRoles($search);
        } else {
            // Retrieve all records if no search query
            $admins = $this->model->getAdminsWithRoles();
        }

        // Render the header
        $this->response->appendBody($this->viewer->render("shared/header.php", ["title" => "All Users", "heading" => "All Users"]));

        // Render the all admins view
        $this->response->appendBody($this->viewer->render("Warehouse/Admins/all_admins.php", ["admins" => $admins]));

        // Render the footer
        $this->response->appendBody($this->viewer->render("shared/footer.php", ["creator" => "Mark Tuggle"]));

        return $this->response;
    }


    /**
     * Displays a single admin by ID.
     *
     * @param string $id The admin ID
     */
    public function viewOne(string $id)
    {
        $admin = $this->getAdminID($id);

        // Render the header
        $this->response->appendBody($this->viewer->render("shared/header.php", ["title" => "Showing One", "heading" => "Admin's Details"]));

        // Render the one admins view
        $this->response->appendBody($this->viewer->render("Warehouse/Admins/one_admin.php", ["admin" => $admin]));

        // Render the footer
        $this->response->appendBody($this->viewer->render("shared/footer.php", ["creator" => "Mark Tuggle"]));

        return $this->response;
    }

    /**
     * Renders the form to add a new admin.
     */
    public function addNewAdmin()
    {
        // Render the header
        $this->response->appendBody($this->viewer->render("shared/header.php", ["title" => "Add Admin", "heading" => "Add Admin"]));

        // Render the form for adding a new admin
        $this->response->appendBody($this->viewer->render("Warehouse/Admins/add_admin.php"));

        // Render the footer
        $this->response->appendBody($this->viewer->render("shared/footer.php", ["creator" => "Mark Tuggle"]));

        return $this->response;
    }

    /**
     * Creates a new admin.
     */
    public function create()
    {
        // Get the form data
        $data = [
            "first_name" => $this->request->post["first_name"],
            "last_name" => $this->request->post["last_name"],
            "email" => $this->request->post["email"],
            "password" => $this->request->post["password"],
            "role_id" => $this->request->post["role_id"]
        ];

        // Hash the password
        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

        // Attempt to insert the new admin record
        if ($this->model->insertRecord($data)) {
            // Redirect to the newly created admin's page
            return $this->redirect("/warehouse/admins/one/{$this->model->getInsertID()}");
        } else {
            // Render the form again with error messages
            $this->response->appendBody($this->viewer->render("shared/header.php", ["title" => "Add Admin", "heading" => "Add Admin"]));
            $this->response->appendBody($this->viewer->render("Warehouse/Admins/add_admin.php", ["errorMessage" => $this->model->getErrors(), "admin" => $data]));
            $this->response->appendBody($this->viewer->render("shared/footer.php", ["creator" => "Mark Tuggle"]));

            return $this->response;
        }
    }


    /**
     * Renders the form to edit an existing admin.
     *
     * @param string $id The admin ID
     */
    public function editAdmin(string $id)
    {
        $admin = $this->getAdminID($id);

        // Render the header
        $this->response->appendBody($this->viewer->render("shared/header.php", ["title" => "Edit Number", "heading" => "Edit Number"]));

        // Render the edit admin view
        $this->response->appendBody($this->viewer->render("Warehouse/Admins/edit_admin.php", ["admin" => $admin]));

        // Render the footer
        $this->response->appendBody($this->viewer->render("shared/footer.php", ["creator" => "Mark Tuggle"]));

        return $this->response;
    }

    /**
     * Updates an existing admin.
     * 
     * @param string $id The admin ID
     */
    public function updateAdmin(string $id): Response
    {
        // Retrieve the admin record
        $admin = $this->getAdminID($id);

        // Get the form data and set empty fields to null
        $admin["first_name"] = $this->request->post["first_name"];
        $admin["last_name"] = $this->request->post["last_name"];
        $admin["email"] = $this->request->post["email"];
        $admin["role_id"] = $this->request->post["role_id"];

        // Check if password field is not empty before hashing and updating
        if (!empty($this->request->post["password"])) {
            $admin["password"] = $this->request->post["password"];
            $admin['password'] = password_hash($admin['password'], PASSWORD_DEFAULT);
        } else {
            // Unset password key to prevent updating it
            unset($admin['password']);
        }
        
        // Attempt to update the admin record
        if ($this->model->updateRecord($id, $admin)) {

            // Redirect to the newly created tablet's page
            return $this->redirect("/warehouse/admins/one/{$id}");
        } else {

            // Render the form again with error messages if update fails
            $this->response->appendBody($this->viewer->render("shared/header.php", ["title" => "Edit Admin", "heading" => "Edit Admin"]));
            $this->response->appendBody($this->viewer->render("Warehouse/Admins/edit_admin.php", ["errorMessage" => $this->model->getErrors(), "admin" => $admin]));
            $this->response->appendBody($this->viewer->render("shared/footer.php", ["creator" => "Mark Tuggle"]));

            return $this->response;
        }
    }

    /**
     * Renders the form to delete a admin.
     *
     * @param string $id The admin ID
     */
    public function deleteAdmin($id)
    {
        // Get the ID of the record
        $admin = $this->getAdminID($id);

        // Render the header
        $this->response->appendBody($this->viewer->render("shared/header.php", ["title" => "Delete Listing", "heading" => "Delete Listing"]));

        // Render the new admin form
        $this->response->appendBody($this->viewer->render("Warehouse/Admins/delete_admin.php", ["admin" => $admin]));

        // Render the footer
        $this->response->appendBody($this->viewer->render("shared/footer.php", ["creator" => "Mark Tuggle"]));

        return $this->response;
    }

    /**
     * Deletes a admin.
     *
     * @param string $id The admin ID
     */
    public function destroyAdmin(string $id): Response
    {
        $admin = $this->getAdminID($id);

        $this->model->deleteRecord($id);

        return $this->redirect("/warehouse/admins/all");
    }

    /*********************************************************************************************************************************** */
    // Order Request Pages



    /*********************************************************************************************************************************** */
    // History Pages

    // Main History Page
    public function history(): Response
    {
        $this->response->appendBody($this->viewer->render("shared/header.php", ["title" => "History", "heading" => "History"]));

        // Render the new admin form
        $this->response->appendBody($this->viewer->render("Warehouse/Admins/History/main.php"));

        // Render the footer
        $this->response->appendBody($this->viewer->render("shared/footer.php", ["creator" => "Mark Tuggle"]));

        return $this->response;
    }
}