<?php

// Enforce type checking
declare(strict_types=1);

namespace App\Controllers;

use App\Models\Phone;
use App\Models\User;
use Framework\Viewer;
use Framework\Exceptions\PageNotFoundException;
use Framework\Controller;
use Framework\Response;
use App\Models\Mail;

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
    public function __construct(private Phone $model, private User $userModel, private Mail $mailer){}

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
        $userId = $_SESSION['user_id'];
        $user = $this->userModel->getOne((string)$userId);

        // Get the search and sort parameters
        $search = $this->request->get['search'] ?? '';
        $sort = $this->request->get['sort'] ?? 'name';
        $order = $this->request->get['order'] ?? 'asc';

        if ($search) {
            // Perform search query
            $phones = $this->model->searchPhones($search, $sort, $order);
        } else {
            // Retrieve all records if no search query
            $phones = $this->model->getAll($sort, $order);
        }

        // Render the header
        $this->response->appendBody($this->viewer->render("shared/header.php", ["title" => "All Phones Extensions", "heading" => "All RRJ Numbers"]));

        // Render the all phones view
        $this->response->appendBody($this->viewer->render("Phones/all_phones.php", ["phones" => $phones, "user" => $user]));

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
            $this->response->appendBody($this->viewer->render("Phones/add_phone.php", ["errorMessage" => $this->model->getErrors(), "phone" => $data]));
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

    /********************************************************************************************************************************* */
    // Custom Action Methods

    // View all in a table
    public function reportAll(): Response
    {
        // Get the search and sort parameters
        $search = $this->request->get['search'] ?? '';
        $sort = $this->request->get['sort'] ?? 'name';
        $order = $this->request->get['order'] ?? 'asc';

        if ($search) {
            // Perform search query
            $phones = $this->model->searchPhones($search, $sort, $order);
        } else {
            // Retrieve all records if no search query
            $phones = $this->model->getAll($sort, $order);
        }

        // Render the header
        $this->response->appendBody($this->viewer->render("shared/header.php", ["title" => "All Phones Extensions", "heading" => "All RRJ Numbers"]));

        // Render the all phones view
        $this->response->appendBody($this->viewer->render("Phones/Reports/view_all.php", ["phones" => $phones]));

        // Render the footer
        $this->response->appendBody($this->viewer->render("shared/footer.php", ["creator" => "Mark Tuggle"]));

        return $this->response;
    }

    // public function updatePhones(): Response
    // {
    //     $sender = '';
    //     $oldNum = '';
    //     $newNum = '';
    //     $oldName = '';
    //     $newName = '';
    //     $oldSection = '';
    //     $newSection = '';
    //     $oldRankTitle = '';
    //     $newRankTitle = '';
    //     $note = '';

    //     // Render the header
    //     $this->response->appendBody($this->viewer->render("shared/header.php", ["title" => "Email Update", "heading" => ""]));

    //     // Render the all phones view
    //     $this->response->appendBody($this->viewer->render("Phones/Reports/email_form.php", ["sender" => $sender,
    //                                                                                         "oldNum" => $oldNum,
    //                                                                                         "newNum" => $newNum,
    //                                                                                         "oldName" => $oldName,
    //                                                                                         "newNum" => $newNum,
    //                                                                                         "newName" => $newName,
    //                                                                                         "oldSection" => $oldSection,
    //                                                                                         "newSection" => $newSection,
    //                                                                                         "oldRankTitle" => $oldRankTitle,
    //                                                                                         "newRankTitle" => $newRankTitle, 
    //                                                                                         "note" => $note]));

    //     // Render the footer
    //     $this->response->appendBody($this->viewer->render("shared/footer.php", ["creator" => "Mark Tuggle"]));

    //     return $this->response;
    // }

    // public function emailSuccess(): Response
    // {
    //     if(!empty($this->request->post)) {

    //         // Add to Email the information and Send
    //         $success = $this->mailer->sendPhoneUpdate($this->request->post['sender'],
    //         $this->request->post['old_extension'],
    //         $this->request->post['new_extension'],
    //         $this->request->post['old_name'],
    //         $this->request->post['new_name'],
    //         $this->request->post['old_section'],
    //         $this->request->post['new_section'],
    //         $this->request->post['old_ranktitle'],
    //         $this->request->post['new_ranktitle'],
    //         $this->request->post['note'],);

    //         if ($success) {
    //             // Render the header
    //             $this->response->appendBody($this->viewer->render("shared/header.php", ["title" => "Success", "heading" => "Success, an email notification has been sent!"]));

    //             // Render the all phones view
    //             $this->response->appendBody($this->viewer->render("Phones/Reports/email_success.php"));

    //             // Render the footer
    //             $this->response->appendBody($this->viewer->render("shared/footer.php", ["creator" => "Mark Tuggle"]));

    //             return $this->response;
    //         }
            
    //     } else {


    //     }
    // }
    
}