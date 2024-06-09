<?php

// Enforce type checking
declare(strict_types=1);

namespace App\Controllers\Programs;

use App\Models\Programs\Volunteer;
use Framework\Viewer;
use Framework\Exceptions\PageNotFoundException;
use Framework\Controller;
use Framework\Response;

/**
 * Controller for handling Volunteer-related actions.
 */
class Volunteers extends Controller
{
    /**
     * Constructor.
     *
     * @param Volunteer $model The phone model
     */
    public function __construct(private Volunteer $model){}

    /**
     * Retrieves the volunteer by ID.
     *
     * @param string $id The volunteer ID
     * @return array The volunteer data
     * @throws PageNotFoundException If the volunteer is not found
     */
    private function getVolunteerID(string $id): array
    {
        // Assign this model's id to the $volunteer variable to the 
        $volunteer = $this->model->getOne($id);

        // Verify if the phone was found
        if ($volunteer === false) {

            throw new PageNotFoundException("No Information Found");
        }

        return $volunteer;
    }

    /**
     * Displays all inmates or search results.
     */
    public function viewAll(): Response
    {
        $search = $this->request->get['search'] ?? '';

        if ($search) {
            // Perform search query
            $volunteers = $this->model->searchVolunteers($search);
        } else {
            // Retrieve all records if no search query
            $volunteers = $this->model->getAll();
        }

        // Render the header
        $this->response->appendBody($this->viewer->render("shared/header.php", ["title" => "All Volunteers", "heading" => "All Volunteers"]));

        // Render the all volunteers view
        $this->response->appendBody($this->viewer->render("Programs/Volunteers/all_volunteers.php", ["volunteers" => $volunteers]));

        // Render the footer
        $this->response->appendBody($this->viewer->render("shared/footer.php", ["creator" => "Mark Tuggle"]));

        return $this->response;
    }


    /**
     * Displays a single volunteer by ID.
     *
     * @param string $id The volunteer ID
     */
    public function viewOne(string $id)
    {
        $volunteer = $this->getVolunteerID($id);

        // Render the header
        $this->response->appendBody($this->viewer->render("shared/header.php", ["title" => "Showing One Listing", "heading" => "Showing One Listing"]));

        // Render the one volunteer view
        $this->response->appendBody($this->viewer->render("Programs/Volunteers/one_volunteer.php", ["volunteer" => $volunteer]));

        // Render the footer
        $this->response->appendBody($this->viewer->render("shared/footer.php", ["creator" => "Mark Tuggle"]));

        return $this->response;
    }

    /**
     * Renders the form to add a new volunteer.
     */
    public function addNewVolunteer()
    {
        // Render the header
        $this->response->appendBody($this->viewer->render("shared/header.php", ["title" => "Add Volunteer", "heading" => "Add Volunteer"]));

        // Render the form for adding a new volunteer
        $this->response->appendBody($this->viewer->render("Programs/Volunteers/add_volunteer.php"));

        // Render the footer
        $this->response->appendBody($this->viewer->render("shared/footer.php", ["creator" => "Mark Tuggle"]));

        return $this->response;
    }

    /**
     * Creates a new volunteer.
     */
    public function create()
    {
        // Get the form data
        $data = [
            "name" => $this->request->post["name"],
            "title" => empty($this->request->post["title"]) ? null : $this->request->post["title"],
            "section" => empty($this->request->post["section"]) ? null : $this->request->post["section"],
            "extension" => $this->request->post["extension"]
        ];

        // Attempt to insert the new volunteer record
        if ($this->model->insertRecord($data)) {
            // Redirect to the newly created volunteer's page
            return $this->redirect("/volunteers/one/{$this->model->getInsertID()}");
        } else {
            // Render the form again with error messages
            $this->response->appendBody($this->viewer->render("shared/header.php", ["title" => "Add Volunteer", "heading" => "Add Volunteer"]));
            $this->response->appendBody($this->viewer->render("Programs/Volunteers/add_volunteer.php", ["errorMessage" => $this->model->getErrors(), "volunteer" => $data]));
            $this->response->appendBody($this->viewer->render("shared/footer.php", ["creator" => "Mark Tuggle"]));

            return $this->response;
        }
    }


    /**
     * Renders the form to edit an existing volunteer.
     *
     * @param string $id The volunteer ID
     */
    public function editVolunteer(string $id)
    {
        $volunteer = $this->getVolunteerID($id);

        // Render the header
        $this->response->appendBody($this->viewer->render("shared/header.php", ["title" => "Edit Number", "heading" => "Edit Number"]));

        // Render the edit volunteer view
        $this->response->appendBody($this->viewer->render("Programs/Volunteers/edit_volunteer.php", ["volunteer" => $volunteer]));

        // Render the footer
        $this->response->appendBody($this->viewer->render("shared/footer.php", ["creator" => "Mark Tuggle"]));

        return $this->response;
    }

    /**
     * Updates an existing volunteer.
     * 
     * @param string $id The volunteer ID
     */
    public function updateVolunteer(string $id): Response
    {
        // Retrieve the volunteer record
        $volunteer = $this->getVolunteerID($id);

        // Get the form data and set empty fields to null
        $volunteer["name"] = $this->request->post["name"];
        $volunteer["title"] = $this->request->post["title"];
        $volunteer["section"] = $this->request->post["section"];
        $volunteer["extension"] = $this->request->post["extension"];

        // Attempt to update the phone record
        if ($this->model->updateRecord($id, $volunteer)) {

            // Redirect to the newly created tablet's page
            return $this->redirect("/volunteers/one/{$id}");
        } else {

            // Render the form again with error messages if update fails
            $this->response->appendBody($this->viewer->render("shared/header.php", ["title" => "Edit Volunteer", "heading" => "Edit Volunteer"]));
            $this->response->appendBody($this->viewer->render("Programs/Volunteers/edit_volunteer.php", ["errorMessage" => $this->model->getErrors(), "volunteer" => $volunteer]));
            $this->response->appendBody($this->viewer->render("shared/footer.php", ["creator" => "Mark Tuggle"]));

            return $this->response;
        }
    }

    /**
     * Renders the form to delete a volunteer.
     *
     * @param string $id The volunteer ID
     */
    public function deleteVolunteer($id)
    {
        // Get the ID of the record
        $volunteer = $this->getVolunteerID($id);

        // Render the header
        $this->response->appendBody($this->viewer->render("shared/header.php", ["title" => "Delete Listing", "heading" => "Delete Listing"]));

        // Render the new volunteer form
        $this->response->appendBody($this->viewer->render("Programs/Volunteers/delete_volunteer.php", ["volunteer" => $volunteer]));

        // Render the footer
        $this->response->appendBody($this->viewer->render("shared/footer.php", ["creator" => "Mark Tuggle"]));

        return $this->response;
    }

    /**
     * Deletes a volunteer.
     *
     * @param string $id The volunteer ID
     */
    public function destroyVolunteer(string $id): Response
    {
        $volunteer = $this->getVolunteerID($id);

        $this->model->deleteRecord($id);

        return $this->redirect("/volunteers/all");
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
            $volunteers = $this->model->searchVolunteers($search);
        } else {
            // Retrieve all records if no search query
            $volunteers = $this->model->getAll();
        }

        // Render the header
        $this->response->appendBody($this->viewer->render("shared/header.php", ["title" => "All Volunteers", "heading" => "All Volunteers"]));

        // Render the all volunteers view
        $this->response->appendBody($this->viewer->render("Programs/Volunteers/Reports/view_all.php", ["volunteers" => $volunteers]));

        // Render the footer
        $this->response->appendBody($this->viewer->render("shared/footer.php", ["creator" => "Mark Tuggle"]));

        return $this->response;
    }
    
}