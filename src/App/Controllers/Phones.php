<?php

// Enforce type checking
declare(strict_types=1);

namespace App\Controllers;

use App\Models\Phone;
use Framework\Viewer;
use Framework\Exceptions\PageNotFoundException;
use Framework\Controller;
use Framework\Response;

/**
 * Controller for handling phone-related actions.
 */
class Phones extends Controller
{
    /**
     * Constructor.
     *
     * @param Phone $model The phone model
     */
    public function __construct(private Phone $model){}

    /**
     * Retrieves the phone by ID.
     *
     * @param string $id The phone ID
     * @return array The phone data
     * @throws PageNotFoundException If the phone is not found
     */
    private function getPhoneID(string $id): array
    {
        // Assign this model's id to the $phone variable to the 
        $phone = $this->model->getOne($id);

        // Verify if the phone was found
        if ($phone === false) {

            throw new PageNotFoundException("No Information Found");
        }

        return $phone;
    }

    /**
     * Displays all inmates or search results.
     */
    public function viewAll(): Response
    {
        $search = $this->request->get['search'] ?? '';

        if ($search) {
            // Perform search query
            $phones = $this->model->searchPhones($search);
        } else {
            // Retrieve all records if no search query
            $phones = $this->model->getAll();
        }

        // Render the header
        $this->response->appendBody($this->viewer->render("shared/header.php", ["title" => "All Phones Extensions", "heading" => "All RRJ Numbers"]));

        // Render the all phones view
        $this->response->appendBody($this->viewer->render("Phones/all_phones.php", ["phones" => $phones]));

        // Render the footer
        $this->response->appendBody($this->viewer->render("shared/footer.php", ["creator" => "Mark Tuggle"]));

        return $this->response;
    }


    /**
     * Displays a single phone by ID.
     *
     * @param string $id The phone ID
     */
    public function viewOne(string $id)
    {
        $phone = $this->getPhoneID($id);

        // Render the header
        $this->response->appendBody($this->viewer->render("shared/header.php", ["title" => "Showing One Listing", "heading" => "Showing One Listing"]));

        // Render the one phone view
        $this->response->appendBody($this->viewer->render("Phones/one_phone.php", ["phone" => $phone]));

        // Render the footer
        $this->response->appendBody($this->viewer->render("shared/footer.php", ["creator" => "Mark Tuggle"]));

        return $this->response;
    }

    /**
     * Renders the form to add a new phone.
     */
    public function addNewPhone()
    {
        // Render the header
        $this->response->appendBody($this->viewer->render("shared/header.php", ["title" => "Add Phone Listing", "heading" => "Add Phone Listing"]));

        // Render the form for adding a new phone
        $this->response->appendBody($this->viewer->render("Phones/add_phone.php"));

        // Render the footer
        $this->response->appendBody($this->viewer->render("shared/footer.php", ["creator" => "Mark Tuggle"]));

        return $this->response;
    }

    /**
     * Creates a new phone.
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

        // Attempt to insert the new phone record
        if ($this->model->insertRecord($data)) {
            // Redirect to the newly created phone's page
            return $this->redirect("/phones/one/{$this->model->getInsertID()}");
        } else {
            // Render the form again with error messages
            $this->response->appendBody($this->viewer->render("shared/header.php", ["title" => "Add Phone Listing", "heading" => "Add Phone Listing"]));
            $this->response->appendBody($this->viewer->render("Phones/form.php", ["errorMessage" => $this->model->getErrors(), "phone" => $data]));
            $this->response->appendBody($this->viewer->render("shared/footer.php", ["creator" => "Mark Tuggle"]));

            return $this->response;
        }
    }


    /**
     * Renders the form to edit an existing phone.
     *
     * @param string $id The phone ID
     */
    public function editPhone(string $id)
    {
        $phone = $this->getPhoneID($id);

        // Render the header
        $this->response->appendBody($this->viewer->render("shared/header.php", ["title" => "Edit Number", "heading" => "Edit Number"]));

        // Render the edit phone view
        $this->response->appendBody($this->viewer->render("Phones/edit_phone.php", ["phone" => $phone]));

        // Render the footer
        $this->response->appendBody($this->viewer->render("shared/footer.php", ["creator" => "Mark Tuggle"]));

        return $this->response;
    }

    /**
     * Updates an existing phone.
     *phone
     * @param string $id The phone ID
     */
    public function updatePhone(string $id): Response
    {
        // Retrieve the phone record
        $phone = $this->getPhoneID($id);

        // Get the form data and set empty fields to null
        $phone["name"] = $this->request->post["name"];
        $phone["title"] = $this->request->post["title"];
        $phone["section"] = $this->request->post["section"];
        $phone["extension"] = $this->request->post["extension"];

        error_log(print_r($phone, true)); // Log the phone data to be updated

        // Attempt to update the phone record
        if ($this->model->updateRecord($id, $phone)) {

            // Redirect to the newly created tablet's page
            return $this->redirect("/phones/one/{$id}");
        } else {

            // Render the form again with error messages if update fails
            $this->response->appendBody($this->viewer->render("shared/header.php", ["title" => "Edit Phone", "heading" => "Edit Phone"]));
            $this->response->appendBody($this->viewer->render("Phones/edit_phone.php", ["errorMessage" => $this->model->getErrors(), "phone" => $phone]));
            $this->response->appendBody($this->viewer->render("shared/footer.php", ["creator" => "Mark Tuggle"]));

            return $this->response;
        }
    }

    /**
     * Renders the form to delete a phone.
     *
     * @param string $id The phone ID
     */
    public function deletePhone($id)
    {
        // Get the ID of the record
        $phone = $this->getPhoneID($id);

        // Render the header
        $this->response->appendBody($this->viewer->render("shared/header.php", ["title" => "Delete Listing", "heading" => "Delete Listing"]));

        // Render the new phone form
        $this->response->appendBody($this->viewer->render("Phones/delete_phone.php", ["phone" => $phone]));

        // Render the footer
        $this->response->appendBody($this->viewer->render("shared/footer.php", ["creator" => "Mark Tuggle"]));

        return $this->response;
    }

    /**
     * Deletes a phone.
     *
     * @param string $id The phone ID
     */
    public function destroyPhone(string $id): Response
    {
        $phone = $this->getPhoneID($id);

        $this->model->deleteRecord($id);

        return $this->redirect("/phones/all");
    }
    
}