<?php

// Enforce type checking
declare(strict_types=1);

namespace App\Controllers;

use App\Models\Mailroom;
use Framework\Viewer;
use Framework\Exceptions\PageNotFoundException;
use Framework\Controller;
use Framework\Response;

/**
 * Controller for handling name-related actions.
 */
class Mailrooms extends Controller
{
    /**
     * Constructor.
     *
     * @param Mailroom $model The name model
     */
    public function __construct(private Mailroom $model){}

    /**
     * Retrieves the name by ID.
     *
     * @param string $id The name ID
     * @return array The name data
     * @throws PageNotFoundException If the name is not found
     */
    private function getNameID(string $id): array
    {
        // Assign this model's id to the $name variable to the 
        $name = $this->model->getOne($id);

        // Verify if the name was found
        if ($name === false) {

            throw new PageNotFoundException("No Information Found");
        }

        return $name;
    }

    /**
     * Displays all inmates or search results.
     */
    public function viewAll(): Response
    {
        $search = $this->request->get['search'] ?? '';

        if ($search) {
            // Perform search query
            $names = $this->model->searchNames($search);
        } else {
            // Retrieve all records if no search query
            $names = $this->model->getAll();
        }

        // Render the header
        $this->response->appendBody($this->viewer->render("shared/header.php", ["title" => "All Names", "heading" => "All Names to forward to OPR"]));

        // Render the all names view
        $this->response->appendBody($this->viewer->render("Mailrooms/all_names.php", ["names" => $names]));

        // Render the footer
        $this->response->appendBody($this->viewer->render("shared/footer.php", ["creator" => "Mark Tuggle"]));

        return $this->response;
    }


    /**
     * Displays a single name by ID.
     *
     * @param string $id The name ID
     */
    public function viewOne(string $id)
    {
        $name = $this->getNameID($id);

        // Render the header
        $this->response->appendBody($this->viewer->render("shared/header.php", ["title" => "Showing One Name", "heading" => "Inmate Details"]));

        // Render the one name view
        $this->response->appendBody($this->viewer->render("Mailrooms/one_name.php", ["name" => $name]));

        // Render the footer
        $this->response->appendBody($this->viewer->render("shared/footer.php", ["creator" => "Mark Tuggle"]));

        return $this->response;
    }

    /**
     * Renders the form to add a new name.
     */
    public function addNewName()
    {
        // Render the header
        $this->response->appendBody($this->viewer->render("shared/header.php", ["title" => "Add Name", "heading" => "Add Name"]));

        // Render the form for adding a new name
        $this->response->appendBody($this->viewer->render("Mailrooms/add_name.php"));

        // Render the footer
        $this->response->appendBody($this->viewer->render("shared/footer.php", ["creator" => "Mark Tuggle"]));

        return $this->response;
    }

    /**
     * Creates a new name.
     */
    public function create()
    {
        // Get the form data
        $data = [
            "inmate_number" => empty($this->request->post["inmate_number"]) ? null : $this->request->post["inmate_number"],
            "first_name" => empty($this->request->post["first_name"]) ? null : $this->request->post["first_name"],
            "last_name" => empty($this->request->post["last_name"]) ? null : $this->request->post["last_name"]
        ];

        // Attempt to insert the new name record
        if ($this->model->insertRecord($data)) {
            // Redirect to the newly created name's page
            return $this->redirect("/mailrooms/one/{$this->model->getInsertID()}");
        } else {
            // Render the form again with error messages
            $this->response->appendBody($this->viewer->render("shared/header.php", ["title" => "Add Name", "heading" => "Add Name"]));
            $this->response->appendBody($this->viewer->render("Mailrooms/add_name.php", ["errorMessage" => $this->model->getErrors(), "name" => $data]));
            $this->response->appendBody($this->viewer->render("shared/footer.php", ["creator" => "Mark Tuggle"]));

            return $this->response;
        }
    }


    /**
     * Renders the form to edit an existing name.
     *
     * @param string $id The name ID
     */
    public function editName(string $id)
    {
        $name = $this->getNameID($id);

        // Render the header
        $this->response->appendBody($this->viewer->render("shared/header.php", ["title" => "Edit Inmate", "heading" => "Edit Inmate"]));

        // Render the edit name view
        $this->response->appendBody($this->viewer->render("Mailrooms/edit_name.php", ["name" => $name]));

        // Render the footer
        $this->response->appendBody($this->viewer->render("shared/footer.php", ["creator" => "Mark Tuggle"]));

        return $this->response;
    }

    /**
     * Updates an existing name.
     *
     * @param string $id The name ID
     */
    public function updateName(string $id): Response
    {
        // Retrieve the name record
        $name = $this->getNameID($id);

        // Get the form data and set empty fields to null
        $name["inmate_number"] = $this->request->post["inmate_number"];
        $name["first_name"] = $this->request->post["first_name"];
        $name["last_name"] = $this->request->post["last_name"];

        // Attempt to update the name record
        if ($this->model->updateRecord($id, $name)) {

            // Redirect to the newly created name's page
            return $this->redirect("/mailrooms/one/{$id}");
        } else {

            // Render the form again with error messages if update fails
            $this->response->appendBody($this->viewer->render("shared/header.php", ["title" => "Edit Inmate", "heading" => "Edit Inmate"]));
            $this->response->appendBody($this->viewer->render("Mailrooms/edit_name.php", ["errorMessage" => $this->model->getErrors(), "name" => $name]));
            $this->response->appendBody($this->viewer->render("shared/footer.php", ["creator" => "Mark Tuggle"]));

            return $this->response;
        }
    }

    /**
     * Renders the form to delete a name.
     *
     * @param string $id The name ID
     */
    public function deleteName($id)
    {
        // Get the ID of the record
        $name = $this->getNameID($id);

        // Render the header
        $this->response->appendBody($this->viewer->render("shared/header.php", ["title" => "Delete Inamte", "heading" => "Delete Inmate"]));

        // Render the new name form
        $this->response->appendBody($this->viewer->render("Mailrooms/delete_name.php", ["name" => $name]));

        // Render the footer
        $this->response->appendBody($this->viewer->render("shared/footer.php", ["creator" => "Mark Tuggle"]));

        return $this->response;
    }

    /**
     * Deletes a name.
     *
     * @param string $id The name ID
     */
    public function destroyName(string $id): Response
    {
        $name = $this->getNameID($id);

        $this->model->deleteRecord($id);

        return $this->redirect("/mailrooms/all");
    }

    /********************************************************************************************************************************* */
    // Custom Action Methods

    // View all in a table
    public function reportAll(): Response
    {
        // Get all the tablet records
        $search = $this->request->get['search'] ?? '';

        if ($search) {
            // Perform search query
            $names = $this->model->searchNames($search);
        } else {
            // Retrieve all records if no search query
            $names = $this->model->getAll();
        }

        // Render the header
        $this->response->appendBody($this->viewer->render("shared/header.php", ["title" => "List of all Inmates", "heading" => "List of all Inmates"]));

        // Render the all names view
        $this->response->appendBody($this->viewer->render("Mailrooms/Reports/view_all.php", ["names" => $names]));

        // Render the footer
        $this->response->appendBody($this->viewer->render("shared/footer.php", ["creator" => "Mark Tuggle"]));

        return $this->response;
    }
    
}