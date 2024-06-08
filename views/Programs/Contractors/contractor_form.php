<div class="form-container">

    <div>
        <label for="last_name">Last Name:</label>
        <input type="text" id="last_name" name="last_name" value="<?= isset($contractor) ? htmlspecialchars($contractor['last_name'] ?? '') : '' ?>">
    </div>

    <div>
        <label for="first_name">First Name:</label>
        <input type="text" id="first_name" name="first_name" value="<?= isset($contractor) ? htmlspecialchars($contractor['first_name'] ?? '') : '' ?>">
    </div>

    <div>
        <label for="group_name">group_name Name:</label>
        <input type="text" id="group_name" name="group_name" value="<?= isset($contractor) ? htmlspecialchars($contractor['group_name'] ?? '') : '' ?>">
    </div>

    <div>
        <label for="address">address:</label>
        <input type="text" id="address" name="address" value="<?= isset($contractor) ? htmlspecialchars($contractor['address'] ?? '') : '' ?>">
    </div>

    <div>
        <label for="city">city:</label>
        <input type="text" id="city" name="city" value="<?= isset($contractor) ? htmlspecialchars($contractor['city'] ?? '') : '' ?>">
    </div>

    <div>
        <label for="state">state:</label>
        <input type="text" id="state" name="state" value="<?= isset($contractor) ? htmlspecialchars($contractor['state'] ?? '') : '' ?>">
    </div>

    <div>
        <label for="zip">zip:</label>
        <input type="text" id="zip" name="zip" value="<?= isset($contractor) ? htmlspecialchars($contractor['zip'] ?? '') : '' ?>">
    </div>

    <div>
        <label for="home_phone">home_phone:</label>
        <input type="home_phone" id="home_phone" name="home_phone" value="<?= isset($contractor) ? htmlspecialchars($contractor['home_phone'] ?? '') : '' ?>">
    </div>

    <div>
        <label for="cell_phone">cell_phone:</label>
        <input type="text" id="cell_phone" name="cell_phone" value="<?= isset($contractor) ? htmlspecialchars($contractor['cell_phone'] ?? '') : '' ?>">
    </div>

    <div>
        <label for="birthdate">birthdate:</label>
        <input type="text" id="birthdate" name="birthdate" value="<?= isset($contractor) ? htmlspecialchars($contractor['birthdate'] ?? '') : '' ?>">
    </div>

    <div>
        <label for="date_hired">date_hired:</label>
        <input type="text" id="date_hired" name="date_hired" value="<?= isset($contractor) ? htmlspecialchars($contractor['date_hired'] ?? '') : '' ?>">
    </div>

    <div>
        <label for="schedule">schedule:</label>
        <input type="text" id="schedule" name="schedule" value="<?= isset($contractor) ? htmlspecialchars($contractor['schedule'] ?? '') : '' ?>">
    </div>

    <div>
        <label for="signature">signature:</label>
        <input type="text" id="signature" name="signature" value="<?= isset($contractor) ? htmlspecialchars($contractor['signature'] ?? '') : '' ?>">
    </div>

    <div>
        <label for="church_locator">church_locator:</label>
        <input type="text" id="church_locator" name="church_locator" value="<?= isset($contractor) ? htmlspecialchars($contractor['church_locator'] ?? '') : '' ?>">
    </div>

    <div>
        <label for="work_phone">work_phone:</label>
        <input type="text" id="work_phone" name="work_phone" value="<?= isset($contractor) ? htmlspecialchars($contractor['work_phone'] ?? '') : '' ?>">
    </div>

    <div>
        <label for="experience_training">experience_training:</label>
        <input type="text" id="experience_training" name="experience_training" value="<?= isset($contractor) ? htmlspecialchars($contractor['experience_training'] ?? '') : '' ?>">
    </div>

    <div>
        <label for="degree_type">degree_type:</label>
        <input type="text" id="degree_type" name="degree_type" value="<?= isset($contractor) ? htmlspecialchars($contractor['degree_type'] ?? '') : '' ?>">
    </div>

    <div>
        <label for="email">email:</label>
        <input type="text" id="email" name="email" value="<?= isset($contractor) ? htmlspecialchars($contractor['email'] ?? '') : '' ?>">
    </div>

    <div>
        <label for="race">race:</label>
        <input type="text" id="race" name="race" value="<?= isset($contractor) ? htmlspecialchars($contractor['race'] ?? '') : '' ?>">
    </div>

    <div>
        <label for="sex">sex:</label>
        <input type="text" id="sex" name="sex" value="<?= isset($contractor) ? htmlspecialchars($contractor['sex'] ?? '') : '' ?>">
    </div>

    <div>
        <label for="ssn">ssn:</label>
        <input type="text" id="ssn" name="ssn" value="<?= isset($contractor) ? htmlspecialchars($contractor['ssn'] ?? '') : '' ?>">
    </div>

    <div>
        <label for="document_status">document_status:</label>
        <input type="text" id="document_status" name="document_status" value="<?= isset($contractor) ? htmlspecialchars($contractor['document_status'] ?? '') : '' ?>">
    </div>

    <div>
        <label for="church_address">church_address:</label>
        <input type="text" id="church_address" name="church_address" value="<?= isset($contractor) ? htmlspecialchars($contractor['church_address'] ?? '') : '' ?>">
    </div>

    <div>
        <label for="church_leader">church_leader:</label>
        <input type="text" id="church_leader" name="church_leader" value="<?= isset($contractor) ? htmlspecialchars($contractor['church_leader'] ?? '') : '' ?>">
    </div>

    <div>
        <label for="church_phone">church_phone:</label>
        <input type="text" id="church_phone" name="church_phone" value="<?= isset($contractor) ? htmlspecialchars($contractor['church_phone'] ?? '') : '' ?>">
    </div>

    <div>
        <label for="specific_skills_education">specific_skills_education:</label>
        <input type="text" id="specific_skills_education" name="specific_skills_education" value="<?= isset($contractor) ? htmlspecialchars($contractor['specific_skills_education'] ?? '') : '' ?>">
    </div>

    <div>
        <label for="category_name">category_name:</label>
        <input type="text" id="category_name" name="category_name" value="<?= isset($contractor) ? htmlspecialchars($contractor['category_name'] ?? '') : '' ?>">
    </div>

    <div>
        <label for="quarterly_meeting_attended">quarterly_meeting_attended:</label>
        <input type="text" id="quarterly_meeting_attended" name="quarterly_meeting_attended" value="<?= isset($contractor) ? htmlspecialchars($contractor['quarterly_meeting_attended'] ?? '') : '' ?>">
    </div>

    <div>
        <label for="volunteer_dinner_rsvp">volunteer_dinner_rsvp:</label>
        <input type="text" id="volunteer_dinner_rsvp" name="volunteer_dinner_rsvp" value="<?= isset($contractor) ? htmlspecialchars($contractor['volunteer_dinner_rsvp'] ?? '') : '' ?>">
    </div>

    <div>
        <label for="dinner_guest">dinner_guest:</label>
        <input type="text" id="dinner_guest" name="dinner_guest" value="<?= isset($contractor) ? htmlspecialchars($contractor['dinner_guest'] ?? '') : '' ?>">
    </div>

    <div>
        <label for="attended_quarterly_meeting">attended_quarterly_meeting:</label>
        <input type="text" id="attended_quarterly_meeting" name="attended_quarterly_meeting" value="<?= isset($contractor) ? htmlspecialchars($contractor['attended_quarterly_meeting'] ?? '') : '' ?>">
    </div>

    <div>
        <label for="active_inactive_terminated">active_inactive_terminated:</label>
        <input type="text" id="active_inactive_terminated" name="active_inactive_terminated" value="<?= isset($contractor) ? htmlspecialchars($contractor['active_inactive_terminated'] ?? '') : '' ?>">
    </div>

    <div>
        <label for="activity_status">activity_status:</label>
        <input type="text" id="activity_status" name="activity_status" value="<?= isset($contractor) ? htmlspecialchars($contractor['activity_status'] ?? '') : '' ?>">
    </div>

    <div>
        <label for="ministry_group">ministry_group:</label>
        <input type="text" id="ministry_group" name="ministry_group" value="<?= isset($contractor) ? htmlspecialchars($contractor['ministry_group'] ?? '') : '' ?>">
    </div>

    <div>
        <label for="chaplains_assistant">chaplains_assistant:</label>
        <input type="text" id="chaplains_assistant" name="chaplains_assistant" value="<?= isset($contractor) ? htmlspecialchars($contractor['chaplains_assistant'] ?? '') : '' ?>">
    </div>

    <div>
        <label for="on_call_status">on_call_status:</label>
        <input type="text" id="on_call_status" name="on_call_status" value="<?= isset($contractor) ? htmlspecialchars($contractor['on_call_status'] ?? '') : '' ?>">
    </div>

    <div>
        <label for="birth_month">birth_month:</label>
        <input type="text" id="birth_month" name="birth_month" value="<?= isset($contractor) ? htmlspecialchars($contractor['birth_month'] ?? '') : '' ?>">
    </div>

    <div>
        <label for="ministry_orientation">ministry_orientation:</label>
        <input type="text" id="ministry_orientation" name="ministry_orientation" value="<?= isset($contractor) ? htmlspecialchars($contractor['ministry_orientation'] ?? '') : '' ?>">
    </div>

    <div>
        <label for="vol_manual_number">vol_manual_number:</label>
        <input type="text" id="vol_manual_number" name="vol_manual_number" value="<?= isset($contractor) ? htmlspecialchars($contractor['vol_manual_number'] ?? '') : '' ?>">
    </div>

    <div>
        <label for="prea_training">prea_training:</label>
        <input type="text" id="prea_training" name="prea_training" value="<?= isset($contractor) ? htmlspecialchars($contractor['prea_training'] ?? '') : '' ?>">
    </div>

    <div>
        <label for="main">main:</label>
        <input type="text" id="main" name="main" value="<?= isset($contractor) ? htmlspecialchars($contractor['main'] ?? '') : '' ?>">
    </div>

    <div>
        <label for="main">main:</label>
        <input type="text" id="main" name="main" value="<?= isset($contractor) ? htmlspecialchars($contractor['main'] ?? '') : '' ?>">
    </div>

    <div>
        <label for="hu6">hu6:</label>
        <input type="text" id="hu6" name="hu6" value="<?= isset($contractor) ? htmlspecialchars($contractor['hu6'] ?? '') : '' ?>">
    </div>

    <div>
        <label for="denomination">denomination:</label>
        <input type="text" id="denomination" name="denomination" value="<?= isset($contractor) ? htmlspecialchars($contractor['denomination'] ?? '') : '' ?>">
    </div>

    <div>
        <label for="devices_approved">devices_approved:</label>
        <input type="text" id="devices_approved" name="devices_approved" value="<?= isset($contractor) ? htmlspecialchars($contractor['devices_approved'] ?? '') : '' ?>">
    </div>

    <div>
        <label for="termination_date">termination_date:</label>
        <input type="text" id="termination_date" name="termination_date" value="<?= isset($contractor) ? htmlspecialchars($contractor['termination_date'] ?? '') : '' ?>">
    </div>

    <div>
        <label for="termination_reason">termination_reason:</label>
        <input type="text" id="termination_reason" name="termination_reason" value="<?= isset($contractor) ? htmlspecialchars($contractor['termination_reason'] ?? '') : '' ?>">
    </div>

    <div>
        <button>Save</button>
    </div>
</div>