<?php

// Enforce type checking
declare(strict_types=1);

namespace App\Controllers\Programs;

use App\Models\Programs\Contractor;
use Framework\Viewer;
use Framework\Exceptions\PageNotFoundException;
use Framework\Controller;
use Framework\Response;

/**
 * Controller for handling contractor-related actions.
 */
class Contractors extends Controller
{
    /**
     * Constructor.
     *
     * @param Contractor $model The contractor model
     */
    public function __construct(private Contractor $model){}

    /**
     * Retrieves the contractor by ID.
     *
     * @param string $id The contractor ID
     * @return array The contractor data
     * @throws PageNotFoundException If the contractor is not found
     */
    private function getContractorID(string $id): array
    {
        // Assign this model's id to the $contractor variable to the 
        $contractor = $this->model->getOne($id);

        // Verify if the contractor was found
        if ($contractor === false) {

            throw new PageNotFoundException("No Information Found");
        }

        return $contractor;
    }

    /**
     * Displays all inmates or search results.
     */
    public function viewAll(): Response
    {
        $search = $this->request->get['search'] ?? '';

        if ($search) {
            // Perform search query
            $contractors = $this->model->searchContractors($search);
        } else {
            // Retrieve all records if no search query
            $contractors = $this->model->getAll();
        }

        // Render the header
        $this->response->appendBody($this->viewer->render("shared/header.php", ["title" => "All Contractors Extensions", "heading" => "All Contractors"]));

        // Render the all contractors view
        $this->response->appendBody($this->viewer->render("Programs/Contractors/all_contractors.php", ["contractors" => $contractors]));

        // Render the footer
        $this->response->appendBody($this->viewer->render("shared/footer.php", ["creator" => "Mark Tuggle"]));

        return $this->response;
    }


    /**
     * Displays a single contractor by ID.
     *
     * @param string $id The contractor ID
     */
    public function viewOne(string $id)
    {
        $contractor = $this->getContractorID($id);

        // Render the header
        $this->response->appendBody($this->viewer->render("shared/header.php", ["title" => "Showing One Listing", "heading" => "Showing One Listing"]));

        // Render the one contractor view
        $this->response->appendBody($this->viewer->render("Programs/Contractors/one_contractor.php", ["contractor" => $contractor]));

        // Render the footer
        $this->response->appendBody($this->viewer->render("shared/footer.php", ["creator" => "Mark Tuggle"]));

        return $this->response;
    }

    /**
     * Renders the form to add a new contractor.
     */
    public function addNewContractor()
    {
        // Render the header
        $this->response->appendBody($this->viewer->render("shared/header.php", ["title" => "Add Contractor", "heading" => "Add Contractor"]));

        // Render the form for adding a new contractor
        $this->response->appendBody($this->viewer->render("Programs/Contractors/add_contractor.php"));

        // Render the footer
        $this->response->appendBody($this->viewer->render("shared/footer.php", ["creator" => "Mark Tuggle"]));

        return $this->response;
    }

    /**
     * Creates a new contractor.
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

        // Attempt to insert the new contractor record
        if ($this->model->insertRecord($data)) {
            // Redirect to the newly created contractor's page
            return $this->redirect("/contractors/one/{$this->model->getInsertID()}");
        } else {
            // Render the form again with error messages
            $this->response->appendBody($this->viewer->render("shared/header.php", ["title" => "Add Contractor Listing", "heading" => "Add Contractor Listing"]));
            $this->response->appendBody($this->viewer->render("Programs/Contractors/add_contractor.php", ["errorMessage" => $this->model->getErrors(), "contractor" => $data]));
            $this->response->appendBody($this->viewer->render("shared/footer.php", ["creator" => "Mark Tuggle"]));

            return $this->response;
        }
    }


    /**
     * Renders the form to edit an existing contractor.
     *
     * @param string $id The contractor ID
     */
    public function editContractor(string $id)
    {
        $contractor = $this->getContractorID($id);

        // Render the header
        $this->response->appendBody($this->viewer->render("shared/header.php", ["title" => "Edit Number", "heading" => "Edit Number"]));

        // Render the edit contractor view
        $this->response->appendBody($this->viewer->render("Programs/Contractors/edit_contractor.php", ["contractor" => $contractor]));

        // Render the footer
        $this->response->appendBody($this->viewer->render("shared/footer.php", ["creator" => "Mark Tuggle"]));

        return $this->response;
    }

    /**
     * Updates an existing contractor.
     * 
     * @param string $id The contractor ID
     */
    public function updateContractor(string $id): Response
    {
        // Retrieve the contractor record
        $contractor = $this->getContractorID($id);

        // Get the form data and set empty fields to null
        $contractor["name"] = $this->request->post["name"];
        $contractor["title"] = $this->request->post["title"];
        $contractor["section"] = $this->request->post["section"];
        $contractor["extension"] = $this->request->post["extension"];

        // Attempt to update the contractor record
        if ($this->model->updateRecord($id, $contractor)) {

            // Redirect to the newly created tablet's page
            return $this->redirect("/contractors/one/{$id}");
        } else {

            // Render the form again with error messages if update fails
            $this->response->appendBody($this->viewer->render("shared/header.php", ["title" => "Edit Contractor", "heading" => "Edit Contractor"]));
            $this->response->appendBody($this->viewer->render("Programs/Contractors/edit_contractor.php", ["errorMessage" => $this->model->getErrors(), "contractor" => $contractor]));
            $this->response->appendBody($this->viewer->render("shared/footer.php", ["creator" => "Mark Tuggle"]));

            return $this->response;
        }
    }

    /**
     * Renders the form to delete a contractor.
     *
     * @param string $id The contractor ID
     */
    public function deleteContractor($id)
    {
        // Get the ID of the record
        $contractor = $this->getContractorID($id);

        // Render the header
        $this->response->appendBody($this->viewer->render("shared/header.php", ["title" => "Delete Listing", "heading" => "Delete Listing"]));

        // Render the new contractor form
        $this->response->appendBody($this->viewer->render("Programs/Contractors/delete_contractor.php", ["contractor" => $contractor]));

        // Render the footer
        $this->response->appendBody($this->viewer->render("shared/footer.php", ["creator" => "Mark Tuggle"]));

        return $this->response;
    }

    /**
     * Deletes a contractor.
     *
     * @param string $id The contractor ID
     */
    public function destroyContractor(string $id): Response
    {
        $contractor = $this->getContractorID($id);

        $this->model->deleteRecord($id);

        return $this->redirect("/contractors/all");
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
            $contractors = $this->model->searchContractors($search);
        } else {
            // Retrieve all records if no search query
            $contractors = $this->model->getAll();
        }

        // Render the header
        $this->response->appendBody($this->viewer->render("shared/header.php", ["title" => "All Contractors", "heading" => "All Contractors"]));

        // Render the all contractors view
        $this->response->appendBody($this->viewer->render("Programs/Contractors/Reports/view_all.php", ["contractors" => $contractors]));

        // Render the footer
        $this->response->appendBody($this->viewer->render("shared/footer.php", ["creator" => "Mark Tuggle"]));

        return $this->response;
    }
    
}