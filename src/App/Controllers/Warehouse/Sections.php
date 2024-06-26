<?php

// Enforce type checking
declare(strict_types=1);

namespace App\Controllers\Warehouse;

use App\Models\Warehouse\Section;
use Framework\Viewer;
use Framework\Exceptions\PageNotFoundException;
use Framework\Controller;
use Framework\Response;

/**
 * Controller for handling section-related actions.
 */
class Sections extends Controller
{
    /**
     * Constructor.
     *
     * @param Section $model The section model
     */
    public function __construct(private Section $model){}

    /**
     * Retrieves the section by ID.
     *
     * @param string $id The section ID
     * @return array The section data
     * @throws PageNotFoundException If the section is not found
     */
    private function getSectionID(string $id): array
    {
        // Assign this model's id to the $section variable to the 
        $section = $this->model->getOne($id);

        // Verify if the section was found
        if ($section === false) {

            throw new PageNotFoundException("No Information Found");
        }

        return $section;
    }

    /**
     * Displays all inmates or search results.
     */
    public function viewAll(): Response
    {
        $search = $this->request->get['search'] ?? '';
        $sort = $this->request->get['sort'] ?? 'name';
        $order = $this->request->get['order'] ?? 'asc';

        if ($search) {
            // Perform search query
            $sections = $this->model->searchSections($search, $sort, $order);
        } else {
            // Retrieve all records if no search query
            $sections = $this->model->getAll($sort, $order);
        }

        // Render the header
        $this->response->appendBody($this->viewer->render("shared/header.php", ["title" => "All Sections", "heading" => "All Sections"]));

        // Render the all sections view
        $this->response->appendBody($this->viewer->render("Warehouse/Sections/all_sections.php", ["sections" => $sections]));

        // Render the footer
        $this->response->appendBody($this->viewer->render("shared/footer.php", ["creator" => "Mark Tuggle"]));

        return $this->response;
    }


    /**
     * Displays a single section by ID.
     *
     * @param string $id The section ID
     */
    public function viewOne(string $id)
    {
        $section = $this->getSectionID($id);

        // Render the header
        $this->response->appendBody($this->viewer->render("shared/header.php", ["title" => "Showing One", "heading" => "Section Details"]));

        // Render the one section view
        $this->response->appendBody($this->viewer->render("Warehouse/Sections/one_section.php", ["section" => $section]));

        // Render the footer
        $this->response->appendBody($this->viewer->render("shared/footer.php", ["creator" => "Mark Tuggle"]));

        return $this->response;
    }

    /**
     * Renders the form to add a new section.
     */
    public function addNewSection()
    {
        $this->response->appendBody($this->viewer->render("shared/header.php", ["title" => "Add Section", "heading" => "Add Section"]));
        $this->response->appendBody($this->viewer->render("Warehouse/Sections/add_section.php"));
        $this->response->appendBody($this->viewer->render("shared/footer.php", ["creator" => "Mark Tuggle"]));

        return $this->response;
    }

    /**
     * Creates a new section.
     */
    public function create()
    {
        $data = [
            "name" => $this->request->post["name"],
        ];

        if ($this->model->insertRecord($data)) {
            return $this->redirect("/warehouse/sections/one/{$this->model->getInsertID()}");
        } else {

            $this->response->appendBody($this->viewer->render("shared/header.php", ["title" => "Add Section", "heading" => "Add Section"]));
            $this->response->appendBody($this->viewer->render("Warehouse/Sections/add_section.php", ["errorMessage" => $this->model->getErrors(), "section" => $data]));
            $this->response->appendBody($this->viewer->render("shared/footer.php", ["creator" => "Mark Tuggle"]));

            return $this->response;
        }
    }


    /**
     * Renders the form to edit an existing section.
     *
     * @param string $id The section ID
     */
    public function editSection(string $id)
    {
        $section = $this->getSectionID($id);

        $this->response->appendBody($this->viewer->render("shared/header.php", ["title" => "Edit Number", "heading" => "Edit Number"]));
        $this->response->appendBody($this->viewer->render("Warehouse/Sections/edit_section.php", ["section" => $section]));
        $this->response->appendBody($this->viewer->render("shared/footer.php", ["creator" => "Mark Tuggle"]));

        return $this->response;
    }

    /**
     * Updates an existing section.
     * 
     * @param string $id The section ID
     */
    public function updateSection(string $id): Response
    {
        $section = $this->getSectionID($id);

        // Get the form data and set empty fields to null
        $section["name"] = $this->request->post["name"];

        if ($this->model->updateRecord($id, $section)) {
            return $this->redirect("/warehouse/sections/one/{$id}");
        } else {

            $this->response->appendBody($this->viewer->render("shared/header.php", ["title" => "Edit Section", "heading" => "Edit Section"]));
            $this->response->appendBody($this->viewer->render("Warehouse/Sections/edit_section.php", ["errorMessage" => $this->model->getErrors(), "section" => $section]));
            $this->response->appendBody($this->viewer->render("shared/footer.php", ["creator" => "Mark Tuggle"]));

            return $this->response;
        }
    }

    /**
     * Renders the form to delete a section.
     *
     * @param string $id The section ID
     */
    public function deleteSection($id)
    {
        // Get the ID of the record
        $section = $this->getSectionID($id);

        // Render the header
        $this->response->appendBody($this->viewer->render("shared/header.php", ["title" => "Delete Listing", "heading" => "Delete Listing"]));

        // Render the new section form
        $this->response->appendBody($this->viewer->render("Warehouse/Sections/delete_section.php", ["section" => $section]));

        // Render the footer
        $this->response->appendBody($this->viewer->render("shared/footer.php", ["creator" => "Mark Tuggle"]));

        return $this->response;
    }

    /**
     * Deletes a section.
     *
     * @param string $id The section ID
     */
    public function destroySection(string $id): Response
    {
        $section = $this->getSectionID($id);

        $this->model->deleteRecord($id);

        return $this->redirect("/warehouse/sections/all");
    }

    /********************************************************************************************************************************* */
    // Custom Action Methods
    
}