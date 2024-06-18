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
            "termination_date" => null,
            "termination_reason" => null,
            "is_volunteer" => true
        ];

        // Attempt to insert the new volunteer record
        if ($this->model->insertRecord($data)) {
            // Redirect to the newly created volunteer's page
            return $this->redirect("/programs/volunteers/one/{$this->model->getInsertID()}");
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
        $this->response->appendBody($this->viewer->render("shared/header.php", ["title" => "Edit Number", "heading" => "Edit Volunteer"]));

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
        $volunteer["last_name"] = $this->request->post["last_name"];
        $volunteer["first_name"] = $this->request->post["first_name"];
        $volunteer["group_name"] = $this->request->post["group_name"];
        $volunteer["address"] = $this->request->post["address"];
        $volunteer["city"] = $this->request->post["city"];
        $volunteer["state"] = $this->request->post["state"];
        $volunteer["zip"] = $this->request->post["zip"];
        $volunteer["home_phone"] = $this->request->post["home_phone"];
        $volunteer["cell_number"] = $this->request->post["cell_number"];
        $volunteer["birthdate"] = $this->request->post["birthdate"];
        $volunteer["date_hired"] = $this->request->post["date_hired"];
        $volunteer["schedule"] = $this->request->post["schedule"];
        $volunteer["signature"] = $this->request->post["signature"];
        $volunteer["church_locator"] = $this->request->post["church_locator"];
        $volunteer["work_phone"] = $this->request->post["work_phone"];
        $volunteer["experience_training"] = $this->request->post["experience_training"];
        $volunteer["degree_type"] = $this->request->post["degree_type"];
        $volunteer["email"] = $this->request->post["email"];
        $volunteer["race"] = $this->request->post["race"];
        $volunteer["sex"] = $this->request->post["sex"];
        $volunteer["ssn"] = $this->request->post["ssn"];
        $volunteer["document_status"] = $this->request->post["document_status"];
        $volunteer["church_address"] = $this->request->post["church_address"];
        $volunteer["church_leader"] = $this->request->post["church_leader"];
        $volunteer["church_phone"] = $this->request->post["church_phone"];
        $volunteer["specific_skill_education"] = $this->request->post["specific_skill_education"];
        $volunteer["category_name"] = $this->request->post["category_name"];
        $volunteer["quarter_meeting_attended"] = $this->request->post["quarter_meeting_attended"];
        $volunteer["vol_dinner_rsvp"] = $this->request->post["vol_dinner_rsvp"];
        $volunteer["dinner_guest"] = $this->request->post["dinner_guest"];
        $volunteer["attended_quarterly_meeting"] = $this->request->post["attended_quarterly_meeting"];
        $volunteer["active_inactive_terminated"] = $this->request->post["active_inactive_terminated"];
        $volunteer["activity_status"] = $this->request->post["activity_status"];
        $volunteer["ministry_group"] = $this->request->post["ministry_group"];
        $volunteer["chaplain_assistant"] = $this->request->post["chaplain_assistant"];
        $volunteer["on_call_schedule"] = $this->request->post["on_call_schedule"];
        $volunteer["on_call_status"] = $this->request->post["on_call_status"];
        $volunteer["birth_month"] = $this->request->post["birth_month"];
        $volunteer["minisitry_orientation"] = $this->request->post["minisitry_orientation"];
        $volunteer["volume_manual_number"] = $this->request->post["volume_manual_number"];
        $volunteer["prea_training"] = $this->request->post["prea_training"];
        $volunteer["main"] = $this->request->post["main"];
        $volunteer["hu6"] = $this->request->post["hu6"];
        $volunteer["denomination"] = $this->request->post["denomination"];
        $volunteer["devices_approved"] = $this->request->post["devices_approved"];

        // Attempt to update the phone record
        if ($this->model->updateRecord($id, $volunteer)) {

            // Redirect to the newly created tablet's page
            return $this->redirect("/programs/volunteers/one/{$id}");
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
        $this->response->appendBody($this->viewer->render("shared/header.php", ["title" => "Delete Volunteer", "heading" => "Delete Volunteer"]));

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

        return $this->redirect("/programs/volunteers/all");
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