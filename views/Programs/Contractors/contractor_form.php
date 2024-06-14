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
        <label for="group_name">Group Name:</label>
        <input type="text" id="group_name" name="group_name" value="<?= isset($contractor) ? htmlspecialchars($contractor['group_name'] ?? '') : '' ?>">
    </div>

    <div>
        <label for="address">Street Address:</label>
        <input type="text" id="address" name="address" value="<?= isset($contractor) ? htmlspecialchars($contractor['address'] ?? '') : '' ?>">
    </div>

    <div>
        <label for="city">City:</label>
        <input type="text" id="city" name="city" value="<?= isset($contractor) ? htmlspecialchars($contractor['city'] ?? '') : '' ?>">
    </div>

    <div>
        <label for="state">State:</label>
        <input type="text" id="state" name="state" value="<?= isset($contractor) ? htmlspecialchars($contractor['state'] ?? '') : '' ?>">
    </div>

    <div>
        <label for="zip">Zip Code:</label>
        <input type="number" id="zip" name="zip" value="<?= isset($contractor) ? htmlspecialchars($contractor['zip'] ?? '') : '' ?>">
    </div>

    <div>
        <label for="home_phone">Home Phone Number:</label>
        <input type="home_phone" id="home_phone" name="home_phone" value="<?= isset($contractor) ? htmlspecialchars($contractor['home_phone'] ?? '') : '' ?>">
    </div>

    <div>
        <label for="cell_number">Cell Phone Number:</label>
        <input type="text" id="cell_number" name="cell_number" value="<?= isset($contractor) ? htmlspecialchars($contractor['cell_number'] ?? '') : '' ?>">
    </div>

    <div>
        <label for="birthdate">Birthdate:</label>
        <input type="date" id="birthdate" name="birthdate" value="<?= isset($contractor) ? htmlspecialchars($contractor['birthdate'] ?? '') : '' ?>">
    </div>

    <div>
        <label for="date_hired">Date Hired:</label>
        <input type="date" id="date_hired" name="date_hired" value="<?= isset($contractor) ? htmlspecialchars($contractor['date_hired'] ?? '') : '' ?>">
    </div>

    <div>
        <label for="schedule">Schedule:</label>
        <input type="text" id="schedule" name="schedule" value="<?= isset($contractor) ? htmlspecialchars($contractor['schedule'] ?? '') : '' ?>">
    </div>

    <div>
        <label for="signature">Signature:</label>
        <input type="text" id="signature" name="signature" value="<?= isset($contractor) ? htmlspecialchars($contractor['signature'] ?? '') : '' ?>">
    </div>

    <div>
        <label for="church_locator">Church Locator:</label>
        <input type="text" id="church_locator" name="church_locator" value="<?= isset($contractor) ? htmlspecialchars($contractor['church_locator'] ?? '') : '' ?>">
    </div>

    <div>
        <label for="work_phone">Work Phone:</label>
        <input type="text" id="work_phone" name="work_phone" value="<?= isset($contractor) ? htmlspecialchars($contractor['work_phone'] ?? '') : '' ?>">
    </div>

    <div>
        <label for="experience_training">Training Experience:</label>
        <input type="text" id="experience_training" name="experience_training" value="<?= isset($contractor) ? htmlspecialchars($contractor['experience_training'] ?? '') : '' ?>">
    </div>

    <div>
        <label for="degree_type">Degree Type:</label>
        <input type="text" id="degree_type" name="degree_type" value="<?= isset($contractor) ? htmlspecialchars($contractor['degree_type'] ?? '') : '' ?>">
    </div>

    <div>
        <label for="email">Email:</label>
        <input type="text" id="email" name="email" value="<?= isset($contractor) ? htmlspecialchars($contractor['email'] ?? '') : '' ?>">
    </div>

    <div>
        <label for="race">Race:</label>
        <input type="text" id="race" name="race" value="<?= isset($contractor) ? htmlspecialchars($contractor['race'] ?? '') : '' ?>">
    </div>

    <div>
        <label for="sex">Sex:</label>
        <input type="text" id="sex" name="sex" value="<?= isset($contractor) ? htmlspecialchars($contractor['sex'] ?? '') : '' ?>">
    </div>

    <div>
        <label for="ssn">SSN:</label>
        <input type="text" id="ssn" name="ssn" value="<?= isset($contractor) ? htmlspecialchars($contractor['ssn'] ?? '') : '' ?>">
    </div>

    <div>
        <label for="document_status">Document Status:</label>
        <input type="text" id="document_status" name="document_status" value="<?= isset($contractor) ? htmlspecialchars($contractor['document_status'] ?? '') : '' ?>">
    </div>

    <div>
        <label for="church_address">Church Address:</label>
        <input type="text" id="church_address" name="church_address" value="<?= isset($contractor) ? htmlspecialchars($contractor['church_address'] ?? '') : '' ?>">
    </div>

    <div>
        <label for="church_leader">Church Leader:</label>
        <input type="text" id="church_leader" name="church_leader" value="<?= isset($contractor) ? htmlspecialchars($contractor['church_leader'] ?? '') : '' ?>">
    </div>

    <div>
        <label for="church_phone">Church Phone:</label>
        <input type="text" id="church_phone" name="church_phone" value="<?= isset($contractor) ? htmlspecialchars($contractor['church_phone'] ?? '') : '' ?>">
    </div>

    <div>
        <label for="specific_skill_education">Specific Skill Education:</label>
        <input type="text" id="specific_skill_education" name="specific_skill_education" value="<?= isset($contractor) ? htmlspecialchars($contractor['specific_skill_education'] ?? '') : '' ?>">
    </div>

    <div>
        <label for="category_name">Category Name:</label>
        <input type="text" id="category_name" name="category_name" value="<?= isset($contractor) ? htmlspecialchars($contractor['category_name'] ?? '') : '' ?>">
    </div>

    <div>
        <label for="quarter_meeting_attended">Attended Quarterly Meeting?:</label>
        <input type="date" id="quarter_meeting_attended" name="quarter_meeting_attended" value="<?= isset($contractor) ? htmlspecialchars($contractor['quarter_meeting_attended'] ?? '') : '' ?>">
    </div>

    <div>
        <label for="vol_dinner_rsvp">contractor Dinner RSVP?</label>
        <select id="vol_dinner_rsvp" name="vol_dinner_rsvp">
            <option value="1" <?= isset($contractor) && $contractor['vol_dinner_rsvp'] == 1 ? 'selected' : '' ?>>Yes</option>
            <option value="0" <?= isset($contractor) && $contractor['vol_dinner_rsvp'] == 0 ? 'selected' : '' ?> selected>No</option>
        </select>
    </div>

    <div>
        <label for="dinner_guest">Bringing a Dinner Guest?</label>
        <select id="dinner_guest" name="dinner_guest">
            <option value="1" <?= isset($contractor) && $contractor['dinner_guest'] == 1 ? 'selected' : '' ?>>Yes</option>
            <option value="0" <?= isset($contractor) && $contractor['dinner_guest'] == 0 ? 'selected' : '' ?> selected>No</option>
        </select>
    </div>

    <div>
        <label for="attended_quarterly_meeting">Attended Quarterly Meeting?</label>
        <select id="attended_quarterly_meeting" name="attended_quarterly_meeting">
            <option value="1" <?= isset($contractor) && $contractor['attended_quarterly_meeting'] == 1 ? 'selected' : '' ?>>Yes</option>
            <option value="0" <?= isset($contractor) && $contractor['attended_quarterly_meeting'] == 0 ? 'selected' : '' ?> selected>No</option>
        </select>
    </div>

    <div>
        <label for="active_inactive_terminated">Current Status:</label>
        <select id="active_inactive_terminated" name="active_inactive_terminated">
            <option value="inactive" <?= isset($contractor) && $contractor['active_inactive_terminated'] == 'inactive' ? 'selected' : '' ?>>Inactive</option>
            <option value="active" <?= isset($contractor) && $contractor['active_inactive_terminated'] == 'active' ? 'selected' : '' ?>>Active</option>
            <option value="terminated" <?= isset($contractor) && $contractor['active_inactive_terminated'] == 'terminated' ? 'selected' : '' ?>>Terminated</option>
            <option value="inactive_covid" <?= isset($contractor) && $contractor['active_inactive_terminated'] == 'inactive_covid' ? 'selected' : '' ?>>Inactive due to COVID</option>
        </select>
    </div>

    <div>
        <label for="activity_status">Activity Status:</label>
        <input type="text" id="activity_status" name="activity_status" value="<?= isset($contractor) ? htmlspecialchars($contractor['activity_status'] ?? '') : '' ?>">
    </div>

    <div>
        <label for="ministry_group">Ministry Group:</label>
        <input type="text" id="ministry_group" name="ministry_group" value="<?= isset($contractor) ? htmlspecialchars($contractor['ministry_group'] ?? '') : '' ?>">
    </div>

    <div>
        <label for="chaplain_assistant">Chaplain's Assistant:</label>
        <input type="text" id="chaplain_assistant" name="chaplain_assistant" value="<?= isset($contractor) ? htmlspecialchars($contractor['chaplain_assistant'] ?? '') : '' ?>">
    </div>

    <div>
        <label for="on_call_schedule">On Call Schedule:</label>
        <input type="text" id="on_call_schedule" name="on_call_schedule" value="<?= isset($contractor) ? htmlspecialchars($contractor['on_call_schedule'] ?? '') : '' ?>">
    </div>

    <div>
        <label for="on_call_status">On Call Status:</label>
        <select id="on_call_status" name="on_call_status">
            <option value="1" <?= isset($contractor) && $contractor['on_call_status'] == 1 ? 'selected' : '' ?>>Available (On Call)</option>
            <option value="0" <?= isset($contractor) && $contractor['on_call_status'] == 0 ? 'selected' : '' ?> selected>NOT Available (NOT On Call)</option>
        </select>
    </div>

    <div>
        <label for="birth_month">Birth Month:</label>
        <input type="date" id="birth_month" name="birth_month" value="<?= isset($contractor) ? htmlspecialchars($contractor['birth_month'] ?? '') : '' ?>">
    </div>

    <div>
        <label for="minisitry_orientation">Minisitry Orientation:</label>
        <input type="date" id="minisitry_orientation" name="minisitry_orientation" value="<?= isset($contractor) ? htmlspecialchars($contractor['minisitry_orientation'] ?? '') : '' ?>">
    </div>

    <div>
        <label for="volume_manual_number">Volume Manual Number:</label>
        <input type="number" id="volume_manual_number" name="volume_manual_number" value="<?= isset($contractor) ? htmlspecialchars($contractor['volume_manual_number'] ?? '') : '' ?>">
    </div>

    <div>
        <label for="prea_training">PREA Training:</label>
        <input type="date" id="prea_training" name="prea_training" value="<?= isset($contractor) ? htmlspecialchars($contractor['prea_training'] ?? '') : '' ?>">
    </div>

    <div>
        <label for="main">Main:</label>
        <input type="text" id="main" name="main" value="<?= isset($contractor) ? htmlspecialchars($contractor['main'] ?? '') : '' ?>">
    </div>

    <div>
        <label for="hu6">HU-6:</label>
        <input type="text" id="hu6" name="hu6" value="<?= isset($contractor) ? htmlspecialchars($contractor['hu6'] ?? '') : '' ?>">
    </div>

    <div>
        <label for="denomination">Denomination:</label>
        <input type="text" id="denomination" name="denomination" value="<?= isset($contractor) ? htmlspecialchars($contractor['denomination'] ?? '') : '' ?>">
    </div>

    <div>
        <label for="devices_approved">Devices Approved:</label>
        <input type="text" id="devices_approved" name="devices_approved" value="<?= isset($contractor) ? htmlspecialchars($contractor['devices_approved'] ?? '') : '' ?>">
    </div>

    <div>
        <label for="termination_date">Termination Date:</label>
        <input type="date" id="termination_date" name="termination_date" value="<?= isset($contractor) ? htmlspecialchars($contractor['termination_date'] ?? '') : '' ?>">
    </div>

    <div>
        <label for="termination_reason">Termination Reason:</label>
        <input type="text" id="termination_reason" name="termination_reason" value="<?= isset($contractor) ? htmlspecialchars($contractor['termination_reason'] ?? '') : '' ?>">
    </div>

    <div>
        <button>Save</button>
    </div>
</div>