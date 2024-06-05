<?php

// Enforce type checking
declare(strict_types=1);

namespace App\Controllers;

use App\Models\Cell;
use Framework\Viewer;
use Framework\Exceptions\PageNotFoundException;
use Framework\Controller;
use Framework\Response;

/**
 * Controller for handling cell-related actions.
 */
class Cells extends Controller
{
    /**
     * Constructor.
     *
     * @param Cell $model The cell model
     */
    public function __construct(private Cell $model){}

    /**
     * Retrieves the cell by ID.
     *
     * @param string $id The cell ID
     * @return array The cell data
     * @throws PageNotFoundException If the cell is not found
     */
    private function getCellID(string $id): array
    {
        // Assign this model's id to the $cell variable to the 
        $cell = $this->model->getOne($id);

        // Verify if the cell was found
        if ($cell === false) {

            throw new PageNotFoundException("No Information Found");
        }

        return $cell;
    }

    /**
     * Displays all inmates or search results.
     */
    public function viewAll(): Response
    {
        $search = $this->request->get['search'] ?? '';

        if ($search) {
            // Perform search query
            $cells = $this->model->searchCells($search);
        } else {
            // Retrieve all records if no search query
            $cells = $this->model->getAll();
        }

        // Render the header
        $this->response->appendBody($this->viewer->render("shared/header.php", ["title" => "Employee Contacts", "heading" => "RRJ Employee Contact List"]));

        // Render the all cells view
        $this->response->appendBody($this->viewer->render("Cells/all_cells.php", ["cells" => $cells]));

        // Render the footer
        $this->response->appendBody($this->viewer->render("shared/footer.php", ["creator" => "Mark Tuggle"]));

        return $this->response;
    }


    /**
     * Displays a single cell by ID.
     *
     * @param string $id The cell ID
     */
    public function viewOne(string $id)
    {
        $cell = $this->getCellID($id);

        // Render the header
        $this->response->appendBody($this->viewer->render("shared/header.php", ["title" => "Showing One Listing", "heading" => "Showing One Listing"]));

        // Render the one cell view
        $this->response->appendBody($this->viewer->render("Cells/one_cell.php", ["cell" => $cell]));

        // Render the footer
        $this->response->appendBody($this->viewer->render("shared/footer.php", ["creator" => "Mark Tuggle"]));

        return $this->response;
    }

    /**
     * Renders the form to add a new cell.
     */
    public function addNewCell()
    {
        // Render the header
        $this->response->appendBody($this->viewer->render("shared/header.php", ["title" => "Add Cell Listing", "heading" => "Add Cell Listing"]));

        // Render the form for adding a new cell
        $this->response->appendBody($this->viewer->render("Cells/add_cell.php"));

        // Render the footer
        $this->response->appendBody($this->viewer->render("shared/footer.php", ["creator" => "Mark Tuggle"]));

        return $this->response;
    }

    /**
     * Creates a new cell.
     */
    public function create()
    {
        // Get the form data
        $data = [
            "name" => $this->request->post["name"],
            "description" => $this->request->post["description"],
            "pid" => $this->request->post["pid"],
            "phone" => $this->request->post["phone"],
            "email" => $this->request->post["email"]
        ];

        // Attempt to insert the new email record
        if ($this->model->insertRecord($data)) {
            // Redirect to the newly created cell's page
            return $this->redirect("/cells/one/{$this->model->getInsertID()}");
        } else {
            // Render the form again with error messages
            $this->response->appendBody($this->viewer->render("shared/header.php", ["title" => "Add Cell Listing", "heading" => "Add Cell Listing"]));
            $this->response->appendBody($this->viewer->render("Cells/add_cell.php", ["errorMessage" => $this->model->getErrors(), "cell" => $data]));
            $this->response->appendBody($this->viewer->render("shared/footer.php", ["creator" => "Mark Tuggle"]));

            return $this->response;
        }
    }


    /**
     * Renders the form to edit an existing cell.
     *
     * @param string $id The cell ID
     */
    public function editCell(string $id)
    {
        $cell = $this->getCellID($id);

        // Render the header
        $this->response->appendBody($this->viewer->render("shared/header.php", ["title" => "Edit Number", "heading" => "Edit Number"]));

        // Render the edit cell view
        $this->response->appendBody($this->viewer->render("Cells/edit_cell.php", ["cell" => $cell]));

        // Render the footer
        $this->response->appendBody($this->viewer->render("shared/footer.php", ["creator" => "Mark Tuggle"]));

        return $this->response;
    }

    /**
     * Updates an existing cell.
     * 
     * @param string $id The cell ID
     */
    public function updateCell(string $id): Response
    {
        // Retrieve the cell record
        $cell = $this->getCellID($id);

        // Get the form data and set empty fields to null
        $cell["name"] = $this->request->post["name"];
        $cell["description"] = $this->request->post["description"];
        $cell["pid"] = $this->request->post["pid"];
        $cell["phone"] = $this->request->post["phone"];
        $cell["email"] = $this->request->post["email"];

        // Attempt to update the cell record
        if ($this->model->updateRecord($id, $cell)) {

            // Redirect to the newly created tablet's page
            return $this->redirect("/cells/one/{$id}");
        } else {

            // Render the form again with error messages if update fails
            $this->response->appendBody($this->viewer->render("shared/header.php", ["title" => "Edit Contact", "heading" => "Edit Contact"]));
            $this->response->appendBody($this->viewer->render("Cells/edit_cell.php", ["errorMessage" => $this->model->getErrors(), "cell" => $cell]));
            $this->response->appendBody($this->viewer->render("shared/footer.php", ["creator" => "Mark Tuggle"]));

            return $this->response;
        }
    }

    /**
     * Renders the form to delete a cell.
     *
     * @param string $id The cell ID
     */
    public function deleteCell($id)
    {
        // Get the ID of the record
        $cell = $this->getCellID($id);

        // Render the header
        $this->response->appendBody($this->viewer->render("shared/header.php", ["title" => "Delete Listing", "heading" => "Delete Listing"]));

        // Render the new cell form
        $this->response->appendBody($this->viewer->render("Cells/delete_cell.php", ["cell" => $cell]));

        // Render the footer
        $this->response->appendBody($this->viewer->render("shared/footer.php", ["creator" => "Mark Tuggle"]));

        return $this->response;
    }

    /**
     * Deletes a cell.
     *
     * @param string $id The cell ID
     */
    public function destroyCell(string $id): Response
    {
        $cell = $this->getCellID($id);

        $this->model->deleteRecord($id);

        return $this->redirect("/cells/all");
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
            $cells = $this->model->searchCells($search);
        } else {
            // Retrieve all records if no search query
            $cells = $this->model->getAll();
        }

        // Render the header
        $this->response->appendBody($this->viewer->render("shared/header.php", ["title" => "All Contacts", "heading" => "All Contacts"]));

        // Render the all cells view
        $this->response->appendBody($this->viewer->render("Cells/Reports/view_all.php", ["cells" => $cells]));

        // Render the footer
        $this->response->appendBody($this->viewer->render("shared/footer.php", ["creator" => "Mark Tuggle"]));

        return $this->response;
    }
    
}