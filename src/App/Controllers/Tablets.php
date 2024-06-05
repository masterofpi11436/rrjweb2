<?php

// Enforce type checking
declare(strict_types=1);

namespace App\Controllers;

use App\Models\Tablet;
use Framework\Viewer;
use Framework\Exceptions\PageNotFoundException;
use Framework\Controller;
use Framework\Response;

/**
 * Controller for handling tablet-related actions.
 */
class Tablets extends Controller
{
    /**
     * Constructor.
     *
     * @param Tablet $model The tablet model
     */
    public function __construct(private Tablet $model){}

    /**
     * Retrieves the tablet by ID.
     *
     * @param string $id The tablet ID
     * @return array The tablet data
     * @throws PageNotFoundException If the tablet is not found
     */
    private function getTabletID(string $id): array
    {
        // Assign this model's id to the $tablet variable to the 
        $tablet = $this->model->getOne($id);

        // Verify if the tablet was found
        if ($tablet === false) {

            throw new PageNotFoundException("No Tablet Found");
        }

        return $tablet;
    }

    /**
     * Displays all inmates or search results.
     */
    public function viewAll(): Response
    {
        $search = $this->request->get['search'] ?? '';

        if ($search) {
            // Perform search query
            $tablets = $this->model->searchTablets($search);
        } else {
            // Retrieve all records if no search query
            $tablets = $this->model->getAll();
        }

        // Render the header
        $this->response->appendBody($this->viewer->render("shared/header.php", ["title" => "All Tablets", "heading" => "All Tablets"]));

        // Render the all tablets view
        $this->response->appendBody($this->viewer->render("Tablets/all_tablets.php", ["tablets" => $tablets]));

        // Render the footer
        $this->response->appendBody($this->viewer->render("shared/footer.php", ["creator" => "Mark Tuggle"]));

        return $this->response;
    }

    /**
     * Displays a single tablet by ID.
     *
     * @param string $id The tablet ID
     */
    public function viewOne(string $id)
    {
        $tablet = $this->getTabletID($id);

        // Render the header
        $this->response->appendBody($this->viewer->render("shared/header.php", ["title" => "Showing One Tablet", "heading" => "Showing One Tablet"]));

        // Render the one tablet view
        $this->response->appendBody($this->viewer->render("Tablets/one_tablet.php", ["tablet" => $tablet]));

        // Render the footer
        $this->response->appendBody($this->viewer->render("shared/footer.php", ["creator" => "Mark Tuggle"]));

        return $this->response;
    }

    /**
     * Renders the form to add a new tablet.
     */
    public function addNewTablet()
    {
        // Render the header
        $this->response->appendBody($this->viewer->render("shared/header.php", ["title" => "Add Tablet", "heading" => "Add Tablet"]));

        // Render the form for adding a new tablet
        $this->response->appendBody($this->viewer->render("Tablets/add_tablet.php"));

        // Render the footer
        $this->response->appendBody($this->viewer->render("shared/footer.php", ["creator" => "Mark Tuggle"]));

        return $this->response;
    }

    /**
     * Creates a new tablet.
     */
    public function create()
    {
        // Get the form data
        $data = [
            "inmate_number" => $this->request->post["inmate_number"],
            "first_name" => empty($this->request->post["first_name"]) ? null : $this->request->post["first_name"],
            "middle_name" => empty($this->request->post["middle_name"]) ? null : $this->request->post["middle_name"],
            "last_name" => $this->request->post["last_name"],
            "date_found" => empty($this->request->post["date_found"]) ? null : $this->request->post["date_found"],
            "is_reported" => isset($this->request->post["is_reported"]) ? 1 : 0,
            "is_filed" => isset($this->request->post["is_filed"]) ? 1 : 0,
            "is_charged" => isset($this->request->post["is_charged"]) ? 1 : 0,
            "is_paid" => isset($this->request->post["is_paid"]) ? 1 : 0,
            "note" => $this->request->post["note"]
        ];

        // Attempt to insert the new tablet record
        if ($this->model->insertRecord($data)) {
            // Redirect to the newly created tablet's page
            return $this->redirect("/tablets/one/{$this->model->getInsertID()}");
        } else {
            // Render the form again with error messages
            $this->response->appendBody($this->viewer->render("shared/header.php", ["title" => "Add Tablet", "heading" => "Add Tablet"]));
            $this->response->appendBody($this->viewer->render("Tablets/tablet_form.php", ["errorMessage" => $this->model->getErrors(), "tablet" => $data]));
            $this->response->appendBody($this->viewer->render("shared/footer.php", ["creator" => "Mark Tuggle"]));

            return $this->response;
        }
    }


    /**
     * Renders the form to edit an existing tablet.
     *
     * @param string $id The tablet ID
     */
    public function editTablet(string $id)
    {
        $tablet = $this->getTabletID($id);

        // Render the header
        $this->response->appendBody($this->viewer->render("shared/header.php", ["title" => "Edit Tablet", "heading" => "Edit Tablet"]));

        // Render the edit tablet view
        $this->response->appendBody($this->viewer->render("Tablets/edit_tablet.php", ["tablet" => $tablet]));

        // Render the footer
        $this->response->appendBody($this->viewer->render("shared/footer.php", ["creator" => "Mark Tuggle"]));

        return $this->response;
    }

    /**
     * Updates an existing tablet.
     *
     * @param string $id The tablet ID
     */
    public function updateTablet(string $id)
    {
        $tablet = $this->getTabletID($id);

        // Get the form data
        $tablet["inmate_number"] = $this->request->post["inmate_number"];
        $tablet["first_name"] = $this->request->post["first_name"];
        $tablet["middle_name"] = empty($this->request->post["middle_name"]) ? null : $this->request->post["middle_name"];
        $tablet["last_name"] = $this->request->post["last_name"];
        $tablet["date_found"] = empty($this->request->post["date_found"]) ? null : $this->request->post["date_found"];
        $tablet["is_reported"] = isset($this->request->post["is_reported"]) ? 1 : 0;
        $tablet["is_filed"] = isset($this->request->post["is_filed"]) ? 1 : 0;
        $tablet["is_charged"] = isset($this->request->post["is_charged"]) ? 1 : 0;
        $tablet["is_paid"] = isset($this->request->post["is_paid"]) ? 1 : 0;
        $tablet["note"] = $this->request->post["note"];

        // Attempt to insert the new tablet record
        if ($this->model->updateRecord($id, $tablet)) {

            // Redirect to the newly created tablet's page
            return $this->redirect("/tablets/one/{$id}");

        } else {

            // Render the form again with error messages
            $this->response->appendBody($this->viewer->render("shared/header.php", ["title" => "Edit Tablet", "heading" => "Edit Tablet"]));

            $this->response->appendBody($this->viewer->render("Tablets/edit_tablet.php", ["errorMessage" => $this->model->getErrors(), "tablet" => $tablet]));
    
            $this->response->appendBody($this->viewer->render("shared/footer.php", ["creator" => "Mark Tuggle"]));

            return $this->response;
        }
    }

    /**
     * Renders the form to delete a tablet.
     *
     * @param string $id The tablet ID
     */
    public function deleteTablet($id)
    {
        // Get the ID of the record
        $tablet = $this->getTabletID($id);

        // Render the header
        $this->response->appendBody($this->viewer->render("shared/header.php", ["title" => "Delete Tablet", "heading" => "Delete a Add Tablet"]));

        // Render the new tablet form
        $this->response->appendBody($this->viewer->render("Tablets/delete_tablet.php", ["tablet" => $tablet]));

        // Render the footer
        $this->response->appendBody($this->viewer->render("shared/footer.php", ["creator" => "Mark Tuggle"]));

        return $this->response;
    }

    /**
     * Deletes a tablet.
     *
     * @param string $id The tablet ID
     */
    public function destroyTablet(string $id): Response
    {
        $tablet = $this->getTabletID($id);

        $this->model->deleteRecord($id);

        return $this->redirect("/tablets/all");
    }

    /********************************************************************************************************************************* */
    // Custom Action Methods

    // View all in a table
    public function reportAll(): Response
    {
        // Get all the tablet records
        $tablets = $this->model->getAll();

        // Render the header
        $this->response->appendBody($this->viewer->render("shared/header.php", ["title" => "Tablet Status", "heading" => "Current Tablet Status"]));
    
        // Render the one tablet view
        $this->response->appendBody($this->viewer->render("Tablets/Reports/view_all.php", ["tablets" => $tablets]));
    
        // Render the footer
        $this->response->appendBody($this->viewer->render("shared/footer.php", ["creator" => "Mark Tuggle"]));
    
        return $this->response;
    }
    
}