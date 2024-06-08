<div class="form-container">

    <div>
        <label for="last_name">Last Name:</label>
        <input type="text" id="last_name" name="last_name" value="<?= isset($volunteer) ? htmlspecialchars($volunteer['last_name'] ?? '') : '' ?>">
    </div>

    <div>
        <label for="first_name">First Name:</label>
        <input type="text" id="first_name" name="first_name" value="<?= isset($volunteer) ? htmlspecialchars($volunteer['first_name'] ?? '') : '' ?>">
    </div>

    <div>
        <label for="group_name">Group Name:</label>
        <input type="text" id="group_name" name="group_name" value="<?= isset($volunteer) ? htmlspecialchars($volunteer['group_name'] ?? '') : '' ?>">
    </div>

    <div>
        <label for="address">Address:</label>
        <input type="text" id="address" name="address" value="<?= isset($volunteer) ? htmlspecialchars($volunteer['address'] ?? '') : '' ?>">
    </div>

    <div>
        <label for="city">City:</label>
        <input type="text" id="city" name="city" value="<?= isset($volunteer) ? htmlspecialchars($volunteer['city'] ?? '') : '' ?>">
    </div>

    <div>
        <label for="state">State:</label>
        <input type="text" id="state" name="state" value="<?= isset($volunteer) ? htmlspecialchars($volunteer['state'] ?? '') : '' ?>">
    </div>

    <div>
        <label for="zip">Zip:</label>
        <input type="text" id="zip" name="zip" value="<?= isset($volunteer) ? htmlspecialchars($volunteer['zip'] ?? '') : '' ?>">
    </div>

    <div>
        <label for="home_phone">Home Phone:</label>
        <input type="text" id="home_phone" name="home_phone" value="<?= isset($volunteer) ? htmlspecialchars($volunteer['home_phone'] ?? '') : '' ?>">
    </div>

    <div>
        <label for="cell_phone">Cell Phone:</label>
        <input type="text" id="cell_phone" name="cell_phone" value="<?= isset($volunteer) ? htmlspecialchars($volunteer['cell_phone'] ?? '') : '' ?>">
    </div>

    <div>
        <label for="birthdate">Birthdate:</label>
        <input type="text" id="birthdate" name="birthdate" value="<?= isset($volunteer) ? htmlspecialchars($volunteer['birthdate'] ?? '') : '' ?>">
    </div>

    <div>
        <label for="date_hired">Date Hired:</label>
        <input type="text" id="date_hired" name="date_hired" value="<?= isset($volunteer) ? htmlspecialchars($volunteer['date_hired'] ?? '') : '' ?>">
    </div>

    <div>
        <label for="schedule">Schedule:</label>
        <input type="text" id="schedule" name="schedule" value="<?= isset($volunteer) ? htmlspecialchars($volunteer['schedule'] ?? '') : '' ?>">
    </div>

    <div>
        <label for="signature">Signature:</label>
        <input type="text" id="signature" name="signature" value="<?= isset($volunteer) ? htmlspecialchars($volunteer['signature'] ?? '') : '' ?>">
    </div>

    <div>
        <label for="church_locator">Church Locator:</label>
        <input type="text" id="church_locator" name="church_locator" value="<?= isset($volunteer) ? htmlspecialchars($volunteer['church_locator'] ?? '') : '' ?>">
    </div>

    <div>
        <label for="work_phone">Work Phone:</label>
        <input type="text" id="work_phone" name="work_phone" value="<?= isset($volunteer) ? htmlspecialchars($volunteer['work_phone'] ?? '') : '' ?>">
    </div>

    <div>
        <label for="experience_training">Experience Training:</label>
        <input type="text" id="experience_training" name="experience_training" value="<?= isset($volunteer) ? htmlspecialchars($volunteer['experience_training'] ?? '') : '' ?>">
    </div>

    <div>
        <label for="degree_type">Degree Type:</label>
        <input type="text" id="degree_type" name="degree_type" value="<?= isset($volunteer) ? htmlspecialchars($volunteer['degree_type'] ?? '') : '' ?>">
    </div>

    <div>
        <label for="email">Email:</label>
        <input type="text" id="email" name="email" value="<?= isset($volunteer) ? htmlspecialchars($volunteer['email'] ?? '') : '' ?>">
    </div>

    <div>
        <label for="race">Race:</label>
        <input type="text" id="race" name="race" value="<?= isset($volunteer) ? htmlspecialchars($volunteer['race'] ?? '') : '' ?>">
    </div>

    <div>
        <label for="sex">Sex:</label>
        <input type="text" id="sex" name="sex" value="<?= isset($volunteer) ? htmlspecialchars($volunteer['sex'] ?? '') : '' ?>">
    </div>

    <div>
        <label for="ssn">SSN:</label>
        <input type="text" id="ssn" name="ssn" value="<?= isset($volunteer) ? htmlspecialchars($volunteer['ssn'] ?? '') : '' ?>">
    </div>

    <div>
        <label for="document_status">Document Status:</label>
        <input type="text" id="document_status" name="document_status" value="<?= isset($volunteer) ? htmlspecialchars($volunteer['document_status'] ?? '') : '' ?>">
    </div>

    <div>
        <label for="church_address">Church Address:</label>
        <input type="text" id="church_address" name="church_address" value="<?= isset($volunteer) ? htmlspecialchars($volunteer['church_address'] ?? '') : '' ?>">
    </div>

    <div>
        <label for="church_leader">Church Leader:</label>
        <input type="text" id="church_leader" name="church_leader" value="<?= isset($volunteer) ? htmlspecialchars($volunteer['church_leader'] ?? '') : '' ?>">
    </div>

    <div>
        <label for="church_phone">Church Phone:</label>
        <input type="text" id="church_phone" name="church_phone" value="<?= isset($volunteer) ? htmlspecialchars($volunteer['church_phone'] ?? '') : '' ?>">
    </div>

    <div>
        <label for="specific_skills_education">Specific Skills Education:</label>
        <input type="text" id="specific_skills_education" name="specific_skills_education" value="<?= isset($volunteer) ? htmlspecialchars($volunteer['specific_skills_education'] ?? '') : '' ?>">
    </div>

    <div>
        <label for="category_name">Category Name:</label>
        <input type="text" id="category_name" name="category_name" value="<?= isset($volunteer) ? htmlspecialchars($volunteer['category_name'] ?? '') : '' ?>">
    </div>

    <div>
        <label for="quarterly_meeting_attended">Quarterly Meeting Attended:</label>
        <input type="text" id="quarterly_meeting_attended" name="quarterly_meeting_attended" value="<?= isset($volunteer) ? htmlspecialchars($volunteer['quarterly_meeting_attended'] ?? '') : '' ?>">
    </div>

    <div>
        <label for="volunteer_dinner_rsvp">Volunteer Dinner RSVP:</label>
        <input type="text" id="volunteer_dinner_rsvp" name="volunteer_dinner_rsvp" value="<?= isset($volunteer) ? htmlspecialchars($volunteer['volunteer_dinner_rsvp'] ?? '') : '' ?>">
    </div>

    <div>
        <label for="dinner_guest">Dinner Guest:</label>
        <input type="text" id="dinner_guest" name="dinner_guest" value="<?= isset($volunteer) ? htmlspecialchars($volunteer['dinner_guest'] ?? '') : '' ?>">
    </div>

    <div>
        <label for="attended_quarterly_meeting">Attended Quarterly Meeting:</label>
        <input type="text" id="attended_quarterly_meeting" name="attended_quarterly_meeting" value="<?= isset($volunteer) ? htmlspecialchars($volunteer['attended_quarterly_meeting'] ?? '') : '' ?>">
    </div>

    <div>
        <label for="active_inactive">Active Inactive:</label>
        <input type="text" id="active_inactive" name="active_inactive" value="<?= isset($volunteer) ? htmlspecialchars($volunteer['active_inactive'] ?? '') : '' ?>">
    </div>

    <div>
        <label for="activity_status">Activity Status:</label>
        <input type="text" id="activity_status" name="activity_status" value="<?= isset($volunteer) ? htmlspecialchars($volunteer['activity_status'] ?? '') : '' ?>">
    </div>

    <div>
        <label for="ministry_group">Ministry Group:</label>
        <input type="text" id="ministry_group" name="ministry_group" value="<?= isset($volunteer) ? htmlspecialchars($volunteer['ministry_group'] ?? '') : '' ?>">
    </div>

    <div>
        <label for="chaplains_assistant">Chaplains Assistant:</label>
        <input type="text" id="chaplains_assistant" name="chaplains_assistant" value="<?= isset($volunteer) ? htmlspecialchars($volunteer['chaplains_assistant'] ?? '') : '' ?>">
    </div>

    <div>
        <label for="on_call_schedule">On Call Schedule:</label>
        <input type="text" id="on_call_schedule" name="on_call_schedule" value="<?= isset($volunteer) ? htmlspecialchars($volunteer['on_call_schedule'] ?? '') : '' ?>">
    </div>

    <div>
        <label for="on_call_status">On Call Status:</label>
        <input type="text" id="on_call_status" name="on_call_status" value="<?= isset($volunteer) ? htmlspecialchars($volunteer['on_call_status'] ?? '') : '' ?>">
    </div>

    <div>
        <label for="birth_month">Birth Month:</label>
        <input type="text" id="birth_month" name="birth_month" value="<?= isset($volunteer) ? htmlspecialchars($volunteer['birth_month'] ?? '') : '' ?>">
    </div>

    <div>
        <label for="ministry_orientation">Ministry Orientation:</label>
        <input type="text" id="ministry_orientation" name="ministry_orientation" value="<?= isset($volunteer) ? htmlspecialchars($volunteer['ministry_orientation'] ?? '') : '' ?>">
    </div>

    <div>
        <label for="vol_manual_number">Vol Manual Number:</label>
        <input type="text" id="vol_manual_number" name="vol_manual_number" value="<?= isset($volunteer) ? htmlspecialchars($volunteer['vol_manual_number'] ?? '') : '' ?>">
    </div>

    <div>
        <label for="prea_training">PREA Training:</label>
        <input type="text" id="prea_training" name="prea_training" value="<?= isset($volunteer) ? htmlspecialchars($volunteer['prea_training'] ?? '') : '' ?>">
    </div>

    <div>
        <label for="main">Main:</label>
        <input type="text" id="main" name="main" value="<?= isset($volunteer) ? htmlspecialchars($volunteer['main'] ?? '') : '' ?>">
    </div>

    <div>
        <label for="hu6">HU6:</label>
        <input type="text" id="hu6" name="hu6" value="<?= isset($volunteer) ? htmlspecialchars($volunteer['hu6'] ?? '') : '' ?>">
    </div>

    <div>
        <label for="denomination">Denomination:</label>
        <input type="text" id="denomination" name="denomination" value="<?= isset($volunteer) ? htmlspecialchars($volunteer['denomination'] ?? '') : '' ?>">
    </div>

    <div>
        <label for="devices_approved">Devices Approved:</label>
        <input type="text" id="devices_approved" name="devices_approved" value="<?= isset($volunteer) ? htmlspecialchars($volunteer['devices_approved'] ?? '') : '' ?>">
    </div>

    <div>
        <button>Save</button>
    </div>
</div>
