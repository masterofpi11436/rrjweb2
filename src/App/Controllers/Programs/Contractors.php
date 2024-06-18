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
            $contractors = $this->model->getAllContractors();
        }

        // Render the header
        $this->response->appendBody($this->viewer->render("shared/header.php", ["title" => "All Contractors", "heading" => "All Contractors"]));

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
        $this->response->appendBody($this->viewer->render("shared/header.php", ["title" => "Showing One", "heading" => "Contractor Details"]));

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
            "last_name" => $this->request->post["last_name"],
            "first_name" => $this->request->post["first_name"],
            "group_name" => $this->request->post["group_name"],
            "address" => $this->request->post["address"],
            "city" => $this->request->post["city"],
            "state" => $this->request->post["state"],
            "zip" => $this->request->post["zip"],
            "home_phone" => $this->request->post["home_phone"],
            "cell_number" => $this->request->post["cell_number"],
            "birthdate" => $this->request->post["birthdate"],
            "date_hired" => $this->request->post["date_hired"],
            "schedule" => $this->request->post["schedule"],
            "signature" => $this->request->post["signature"],
            "church_locator" => $this->request->post["church_locator"],
            "work_phone" => $this->request->post["work_phone"],
            "experience_training" => $this->request->post["experience_training"],
            "degree_type" => $this->request->post["degree_type"],
            "email" => $this->request->post["email"],
            "race" => $this->request->post["race"],
            "sex" => $this->request->post["sex"],
            "ssn" => $this->request->post["ssn"],
            "document_status" => $this->request->post["document_status"],
            "church_address" => $this->request->post["church_address"],
            "church_leader" => $this->request->post["church_leader"],
            "church_phone" => $this->request->post["church_phone"],
            "specific_skill_education" => $this->request->post["specific_skill_education"],
            "category_name" => $this->request->post["category_name"],
            "quarter_meeting_attended" => $this->request->post["quarter_meeting_attended"],
            "vol_dinner_rsvp" => $this->request->post["vol_dinner_rsvp"],
            "dinner_guest" => $this->request->post["dinner_guest"],
            "attended_quarterly_meeting" => $this->request->post["attended_quarterly_meeting"],
            "active_inactive_terminated" => $this->request->post["active_inactive_terminated"],
            "activity_status" => $this->request->post["activity_status"],
            "ministry_group" => $this->request->post["ministry_group"],
            "chaplain_assistant" => $this->request->post["chaplain_assistant"],
            "on_call_schedule" => $this->request->post["on_call_schedule"],
            "on_call_status" => $this->request->post["on_call_status"],
            "birth_month" => $this->request->post["birth_month"],
            "minisitry_orientation" => $this->request->post["minisitry_orientation"],
            "volume_manual_number" => $this->request->post["volume_manual_number"],
            "prea_training" => $this->request->post["prea_training"],
            "main" => $this->request->post["main"],
            "hu6" => $this->request->post["hu6"],
            "denomination" => $this->request->post["denomination"],
            "devices_approved" => $this->request->post["devices_approved"],
            "termination_date" => $this->request->post["termination_date"],
            "termination_reason" => $this->request->post["termination_reason"],
            "is_volunteer" => false
        ];

        // Attempt to insert the new contractor record
        if ($this->model->insertRecord($data)) {
            // Redirect to the newly created contractor's page
            return $this->redirect("/programs/contractors/one/{$this->model->getInsertID()}");
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
        $contractor["last_name"] = $this->request->post["last_name"];
        $contractor["first_name"] = $this->request->post["first_name"];
        $contractor["group_name"] = $this->request->post["group_name"];
        $contractor["address"] = $this->request->post["address"];
        $contractor["city"] = $this->request->post["city"];
        $contractor["state"] = $this->request->post["state"];
        $contractor["zip"] = $this->request->post["zip"];
        $contractor["home_phone"] = $this->request->post["home_phone"];
        $contractor["cell_number"] = $this->request->post["cell_number"];
        $contractor["birthdate"] = $this->request->post["birthdate"];
        $contractor["date_hired"] = $this->request->post["date_hired"];
        $contractor["schedule"] = $this->request->post["schedule"];
        $contractor["signature"] = $this->request->post["signature"];
        $contractor["church_locator"] = $this->request->post["church_locator"];
        $contractor["work_phone"] = $this->request->post["work_phone"];
        $contractor["experience_training"] = $this->request->post["experience_training"];
        $contractor["degree_type"] = $this->request->post["degree_type"];
        $contractor["email"] = $this->request->post["email"];
        $contractor["race"] = $this->request->post["race"];
        $contractor["sex"] = $this->request->post["sex"];
        $contractor["ssn"] = $this->request->post["ssn"];
        $contractor["document_status"] = $this->request->post["document_status"];
        $contractor["church_address"] = $this->request->post["church_address"];
        $contractor["church_leader"] = $this->request->post["church_leader"];
        $contractor["church_phone"] = $this->request->post["church_phone"];
        $contractor["specific_skill_education"] = $this->request->post["specific_skill_education"];
        $contractor["category_name"] = $this->request->post["category_name"];
        $contractor["quarter_meeting_attended"] = $this->request->post["quarter_meeting_attended"];
        $contractor["vol_dinner_rsvp"] = $this->request->post["vol_dinner_rsvp"];
        $contractor["dinner_guest"] = $this->request->post["dinner_guest"];
        $contractor["attended_quarterly_meeting"] = $this->request->post["attended_quarterly_meeting"];
        $contractor["active_inactive_terminated"] = $this->request->post["active_inactive_terminated"];
        $contractor["activity_status"] = $this->request->post["activity_status"];
        $contractor["ministry_group"] = $this->request->post["ministry_group"];
        $contractor["chaplain_assistant"] = $this->request->post["chaplain_assistant"];
        $contractor["on_call_schedule"] = $this->request->post["on_call_schedule"];
        $contractor["on_call_status"] = $this->request->post["on_call_status"];
        $contractor["birth_month"] = $this->request->post["birth_month"];
        $contractor["minisitry_orientation"] = $this->request->post["minisitry_orientation"];
        $contractor["volume_manual_number"] = $this->request->post["volume_manual_number"];
        $contractor["prea_training"] = $this->request->post["prea_training"];
        $contractor["main"] = $this->request->post["main"];
        $contractor["hu6"] = $this->request->post["hu6"];
        $contractor["denomination"] = $this->request->post["denomination"];
        $contractor["devices_approved"] = $this->request->post["devices_approved"];
        $contractor["termination_date"] = $this->request->post["termination_date"];
        $contractor["termination_reason"] = $this->request->post["termination_reason"];

        // Attempt to update the contractor record
        if ($this->model->updateRecord($id, $contractor)) {

            // Redirect to the newly created tablet's page
            return $this->redirect("/programs/contractors/one/{$id}");
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

        return $this->redirect("/programs/contractors/all");
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