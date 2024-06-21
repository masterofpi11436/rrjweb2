<script>
    document.addEventListener("DOMContentLoaded", function() {
        var coll = document.getElementsByClassName("collapsible");
        for (var i = 0; i < coll.length; i++) {
            coll[i].addEventListener("click", function() {
                this.classList.toggle("active");
                var content = this.nextElementSibling;
                if (content.style.display === "block") {
                    content.style.display = "none";
                } else {
                    content.style.display = "block";
                }
            });
        }
    });
</script>

<div class="form-container">
    <!-- PERSONAL INFORMATION ******************************************************************************************************************** -->
    <div class="form-container">
        <button type="button" class="collapsible">Personal Information</button>

        <div class="content form-section">
            <div>
                <label for="last_name">Last Name:</label>
                <input type="text" id="last_name" name="last_name" value="<?= isset($volunteer) ? htmlspecialchars($volunteer['last_name'] ?? '') : '' ?>">
            </div>
            <div>
                <label for="first_name">First Name:</label>
                <input type="text" id="first_name" name="first_name" value="<?= isset($volunteer) ? htmlspecialchars($volunteer['first_name'] ?? '') : '' ?>">
            </div>
            <div>
                <label for="address">Street Address:</label>
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
                <label for="zip">Zip Code:</label>
                <input type="number" id="zip" name="zip" value="<?= isset($volunteer) ? htmlspecialchars($volunteer['zip'] ?? '') : '' ?>">
            </div>
            <div>
                <label for="home_phone">Home Phone Number:</label>
                <input type="text" id="home_phone" name="home_phone" value="<?= isset($volunteer) ? htmlspecialchars($volunteer['home_phone'] ?? '') : '' ?>">
            </div>
            <div>
                <label for="cell_number">Cell Phone Number:</label>
                <input type="text" id="cell_number" name="cell_number" value="<?= isset($volunteer) ? htmlspecialchars($volunteer['cell_number'] ?? '') : '' ?>">
            </div>
            <div>
                <label for="birthdate">Birthdate:</label>
                <input type="date" id="birthdate" name="birthdate" value="<?= isset($volunteer) ? htmlspecialchars($volunteer['birthdate'] ?? '') : '' ?>">
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
                <input type="number" id="ssn" name="ssn" value="<?= isset($volunteer) ? htmlspecialchars($volunteer['ssn'] ?? '') : '' ?>">
            </div>
            <div>
                <label for="birth_month">Birth Month:</label>
                <input type="text" id="birth_month" name="birth_month" value="<?= isset($volunteer) ? htmlspecialchars($volunteer['birth_month'] ?? '') : '' ?>">
            </div>
        </div>
    </div>

    <!-- WORK STATUS ******************************************************************************************************************** -->

    <div class="form-container">

        <button type="button" class="collapsible">Work Status</button>
        <div class="content form-section">
            <div>
                <label for="active_inactive_terminated">Current Status:</label>
                <select id="active_inactive_terminated" name="active_inactive_terminated">
                    <option value="inactive" <?= isset($volunteer) && $volunteer['active_inactive_terminated'] == 'inactive' ? 'selected' : '' ?>>Inactive</option>
                    <option value="active" <?= isset($volunteer) && $volunteer['active_inactive_terminated'] == 'active' ? 'selected' : '' ?>>Active</option>
                    <option value="terminated" <?= isset($volunteer) && $volunteer['active_inactive_terminated'] == 'terminated' ? 'selected' : '' ?>>Terminated</option>
                    <option value="inactive_covid" <?= isset($volunteer) && $volunteer['active_inactive_terminated'] == 'inactive_covid' ? 'selected' : '' ?>>Inactive due to COVID</option>
                </select>
            </div>
            <div>
                <label for="activity_status">Activity Status:</label>
                <input type="text" id="activity_status" name="activity_status" value="<?= isset($volunteer) ? htmlspecialchars($volunteer['activity_status'] ?? '') : '' ?>">
            </div>
            <div>
                <label for="termination_date">Termination Date:</label>
                <input type="date" id="termination_date" name="termination_date" value="<?= isset($volunteer) ? htmlspecialchars($volunteer['termination_date'] ?? '') : '' ?>">
            </div>
            <div>
                <label for="termination_reason">Termination Reason:</label>
                <input type="text" id="termination_reason" name="termination_reason" value="<?= isset($volunteer) ? htmlspecialchars($volunteer['termination_reason'] ?? '') : '' ?>">
            </div>
        </div>
    </div>

    <!-- WORK INFORMATION ******************************************************************************************************************** -->
    <div class="form-container">

        <button type="button" class="collapsible">Work Information</button>
        <div class="content form-section">
            <div>
                <label for="date_hired">Date Hired:</label>
                <input type="date" id="date_hired" name="date_hired" value="<?= isset($volunteer) ? htmlspecialchars($volunteer['date_hired'] ?? '') : '' ?>">
            </div>
            <div>
                <label for="schedule">Schedule:</label>
                <input type="text" id="schedule" name="schedule" value="<?= isset($volunteer) ? htmlspecialchars($volunteer['schedule'] ?? '') : '' ?>">
            </div>
            <div>
                <label for="on_call_schedule">On Call Schedule:</label>
                <input type="text" id="on_call_schedule" name="on_call_schedule" value="<?= isset($volunteer) ? htmlspecialchars($volunteer['on_call_schedule'] ?? '') : '' ?>">
            </div>
            <div>
                <label for="on_call_status">On Call Status:</label>
                <select id="on_call_status" name="on_call_status">
                    <option value="1" <?= isset($volunteer) && $volunteer['on_call_status'] == 1 ? 'selected' : '' ?>>Available (On Call)</option>
                    <option value="0" <?= isset($volunteer) && $volunteer['on_call_status'] == 0 ? 'selected' : '' ?>>NOT Available (NOT On Call)</option>
                </select>
            </div>
            <div>
                <label for="devices_approved">Devices Approved:</label>
                <input type="text" id="devices_approved" name="devices_approved" value="<?= isset($volunteer) ? htmlspecialchars($volunteer['devices_approved'] ?? '') : '' ?>">
            </div>
            <div>
                <label for="main">Main:</label>
                <input type="text" id="main" name="main" value="<?= isset($volunteer) ? htmlspecialchars($volunteer['main'] ?? '') : '' ?>">
            </div>
            <div>
                <label for="hu6">HU-6:</label>
                <input type="text" id="hu6" name="hu6" value="<?= isset($volunteer) ? htmlspecialchars($volunteer['hu6'] ?? '') : '' ?>">
            </div>
            <div>
                <label for="vol_dinner_rsvp">volunteer Dinner RSVP?</label>
                <select id="vol_dinner_rsvp" name="vol_dinner_rsvp">
                    <option value="1" <?= isset($volunteer) && $volunteer['vol_dinner_rsvp'] == 1 ? 'selected' : '' ?>>Yes</option>
                    <option value="0" <?= isset($volunteer) && $volunteer['vol_dinner_rsvp'] == 0 ? 'selected' : '' ?>>No</option>
                </select>
            </div>
            <div>
                <label for="dinner_guest">Bringing a Dinner Guest?</label>
                <select id="dinner_guest" name="dinner_guest">
                    <option value="1" <?= isset($volunteer) && $volunteer['dinner_guest'] == 1 ? 'selected' : '' ?>>Yes</option>
                    <option value="0" <?= isset($volunteer) && $volunteer['dinner_guest'] == 0 ? 'selected' : '' ?>>No</option>
                </select>
            </div>
            <div>
                <label for="attended_quarterly_meeting">Attended Quarterly Meeting?</label>
                <select id="attended_quarterly_meeting" name="attended_quarterly_meeting">
                    <option value="1" <?= isset($volunteer) && $volunteer['attended_quarterly_meeting'] == 1 ? 'selected' : '' ?>>Yes</option>
                    <option value="0" <?= isset($volunteer) && $volunteer['attended_quarterly_meeting'] == 0 ? 'selected' : '' ?>>No</option>
                </select>
            </div>
            <div>
                <label for="quarter_meeting_attended">Date Attended Quarterly Meeting?:</label>
                <input type="date" id="quarter_meeting_attended" name="quarter_meeting_attended" value="<?= isset($volunteer) ? htmlspecialchars($volunteer['quarter_meeting_attended'] ?? '') : '' ?>">
            </div>
            <div>
                <label for="signature">Signature:</label>
                <input type="text" id="signature" name="signature" value="<?= isset($volunteer) ? htmlspecialchars($volunteer['signature'] ?? '') : '' ?>">
            </div>
            <div>
                <label for="document_status">Document Status:</label>
                <input type="text" id="document_status" name="document_status" value="<?= isset($volunteer) ? htmlspecialchars($volunteer['document_status'] ?? '') : '' ?>">
            </div>
            <div>
                <label for="work_phone">Work Phone:</label>
                <input type="text" id="work_phone" name="work_phone" value="<?= isset($volunteer) ? htmlspecialchars($volunteer['work_phone'] ?? '') : '' ?>">
            </div>
        </div>
    </div>

    <!-- TRAINING AND EDUCATION ******************************************************************************************************************** -->
    <div class="form-container">
        
        <button type="button" class="collapsible">Training and Education</button>
        <div class="content form-section">
            <div>
                <label for="prea_training">PREA Training:</label>
                <input type="date" id="prea_training" name="prea_training" value="<?= isset($volunteer) ? htmlspecialchars($volunteer['prea_training'] ?? '') : '' ?>">
            </div>
            <div>
                <label for="experience_training">Training Experience:</label>
                <input type="text" id="experience_training" name="experience_training" value="<?= isset($volunteer) ? htmlspecialchars($volunteer['experience_training'] ?? '') : '' ?>">
            </div>
            <div>
                <label for="specific_skill_education">Specific Skill Education:</label>
                <input type="text" id="specific_skill_education" name="specific_skill_education" value="<?= isset($volunteer) ? htmlspecialchars($volunteer['specific_skill_education'] ?? '') : '' ?>">
            </div>
            <div>
                <label for="degree_type">Degree Type:</label>
                <input type="text" id="degree_type" name="degree_type" value="<?= isset($volunteer) ? htmlspecialchars($volunteer['degree_type'] ?? '') : '' ?>">
            </div>
        </div>
    </div>

    <!-- CHURCH INFORMATION ******************************************************************************************************************** -->
    <div class="form-container">
        
    
        <button type="button" class="collapsible">Church Information</button>
        <div class="content form-section">
            <div>
                <label for="group_name">Group Name:</label>
                <input type="text" id="group_name" name="group_name" value="<?= isset($volunteer) ? htmlspecialchars($volunteer['group_name'] ?? '') : '' ?>">
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
                <label for="ministry_group">Ministry Group:</label>
                <input type="text" id="ministry_group" name="ministry_group" value="<?= isset($volunteer) ? htmlspecialchars($volunteer['ministry_group'] ?? '') : '' ?>">
            </div>
            <div>
                <label for="chaplain_assistant">Chaplain's Assistant:</label>
                <input type="text" id="chaplain_assistant" name="chaplain_assistant" value="<?= isset($volunteer) ? htmlspecialchars($volunteer['chaplain_assistant'] ?? '') : '' ?>">
            </div>
            <div>
                <label for="minisitry_orientation">Minisitry Orientation:</label>
                <input type="date" id="minisitry_orientation" name="minisitry_orientation" value="<?= isset($volunteer) ? htmlspecialchars($volunteer['minisitry_orientation'] ?? '') : '' ?>">
            </div>
            <div>
                <label for="denomination">Denomination:</label>
                <input type="text" id="denomination" name="denomination" value="<?= isset($volunteer) ? htmlspecialchars($volunteer['denomination'] ?? '') : '' ?>">
            </div>
            <div>
                <label for="category_name">Category Name:</label>
                <input type="text" id="category_name" name="category_name" value="<?= isset($volunteer) ? htmlspecialchars($volunteer['category_name'] ?? '') : '' ?>">
            </div>
            <div>
                <label for="volume_manual_number">Volume Manual Number:</label>
                <input type="number" id="volume_manual_number" name="volume_manual_number" value="<?= isset($volunteer) ? htmlspecialchars($volunteer['volume_manual_number'] ?? '') : '' ?>">
            </div>
            <div>
                <label for="church_locator">Church Locator:</label>
                <input type="text" id="church_locator" name="church_locator" value="<?= isset($volunteer) ? htmlspecialchars($volunteer['church_locator'] ?? '') : '' ?>">
            </div>
        </div>
    </div>

    <div>
        <button>Save</button>
    </div>
</div>
