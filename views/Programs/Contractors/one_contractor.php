<form action="/programs/contractors/all">
    <button>Home</button>
</form>

<form action="/programs/contractors/edit/<?= htmlspecialchars($contractor['id']) ?>">
    <button>Edit Contractor</button>
</form>

<table>
    <tr>
        <th>Last Name</th>
        <td><?= htmlspecialchars($contractor["last_name"] ?? '') ?></td>
    </tr>
    <tr>
        <th>First Name</th>
        <td><?= htmlspecialchars($contractor["first_name"] ?? '') ?></td>
    </tr>
    <tr>
        <th>Group Name</th>
        <td><?= htmlspecialchars($contractor["group_name"] ?? '') ?></td>
    </tr>
    <tr>
        <th>Street Address</th>
        <td><?= htmlspecialchars($contractor["address"] ?? '') ?></td>
    </tr>
    <tr>
        <th>City</th>
        <td><?= htmlspecialchars($contractor["city"] ?? '') ?></td>
    </tr>
    <tr>
        <th>State</th>
        <td><?= htmlspecialchars($contractor["state"] ?? '') ?></td>
    </tr>
    <tr>
        <th>Zip Code</th>
        <td><?= htmlspecialchars($contractor["zip"] ?? '') ?></td>
    </tr>
    <tr>
        <th>Home Phone Number</th>
        <td><?= htmlspecialchars($contractor["home_phone"] ?? '') ?></td>
    </tr>
    <tr>
        <th>Cell Phone Number</th>
        <td><?= htmlspecialchars($contractor["cell_number"] ?? '') ?></td>
    </tr>
    <tr>
        <th>Birthdate</th>
        <td><?= htmlspecialchars($contractor["birthdate"] ?? '') ?></td>
    </tr>
    <tr>
        <th>Date Hired</th>
        <td><?= htmlspecialchars($contractor["date_hired"] ?? '') ?></td>
    </tr>
    <tr>
        <th>Schedule</th>
        <td><?= htmlspecialchars($contractor["schedule"] ?? '') ?></td>
    </tr>
    <tr>
        <th>Signature</th>
        <td><?= htmlspecialchars($contractor["signature"] ?? '') ?></td>
    </tr>
    <tr>
        <th>Church Locator</th>
        <td><?= htmlspecialchars($contractor["church_locator"] ?? '') ?></td>
    </tr>
    <tr>
        <th>Work Phone</th>
        <td><?= htmlspecialchars($contractor["work_phone"] ?? '') ?></td>
    </tr>
    <tr>
        <th>Training Experience</th>
        <td><?= htmlspecialchars($contractor["experience_training"] ?? '') ?></td>
    </tr>
    <tr>
        <th>Degree Type</th>
        <td><?= htmlspecialchars($contractor["degree_type"] ?? '') ?></td>
    </tr>
    <tr>
        <th>Email</th>
        <td><?= htmlspecialchars($contractor["email"] ?? '') ?></td>
    </tr>
    <tr>
        <th>Race</th>
        <td><?= htmlspecialchars($contractor["race"] ?? '') ?></td>
    </tr>
    <tr>
        <th>Sex</th>
        <td><?= htmlspecialchars($contractor["sex"] ?? '') ?></td>
    </tr>
    <tr>
        <th>SSN</th>
        <td><?= htmlspecialchars($contractor["ssn"] ?? '') ?></td>
    </tr>
    <tr>
        <th>Document Status</th>
        <td><?= htmlspecialchars($contractor["document_status"] ?? '') ?></td>
    </tr>
    <tr>
        <th>Church Address</th>
        <td><?= htmlspecialchars($contractor["church_address"] ?? '') ?></td>
    </tr>
    <tr>
        <th>Church Leader</th>
        <td><?= htmlspecialchars($contractor["church_leader"] ?? '') ?></td>
    </tr>
    <tr>
        <th>Church Phone</th>
        <td><?= htmlspecialchars($contractor["church_phone"] ?? '') ?></td>
    </tr>
    <tr>
        <th>Specific Skill Education</th>
        <td><?= htmlspecialchars($contractor["specific_skill_education"] ?? '') ?></td>
    </tr>
    <tr>
        <th>Category Name</th>
        <td><?= htmlspecialchars($contractor["category_name"] ?? '') ?></td>
    </tr>
    <tr>
        <th>Attended Quarterly Meeting?</th>
        <td><?= htmlspecialchars($contractor["quarter_meeting_attended"] ?? '') ?></td>
    </tr>
    <tr>
        <th>Contractor Dinner RSVP?</th>
        <td><?= htmlspecialchars($contractor["vol_dinner_rsvp"] ?? '') ?></td>
    </tr>
    <tr>
        <th>Bringing a Dinner Guest?</th>
        <td><?= htmlspecialchars($contractor["dinner_guest"] ?? '') ?></td>
    </tr>
    <tr>
        <th>>Attended Quarterly Meeting?</th>
        <td><?= htmlspecialchars($contractor["attended_quarterly_meeting"] ?? '') ?></td>
    </tr>
    <tr>
        <th>Current Status</th>
        <td><?= htmlspecialchars($contractor["active_inactive_terminated"] ?? '') ?></td>
    </tr>
    <tr>
        <th>Activity Status</th>
        <td><?= htmlspecialchars($contractor["activity_status"] ?? '') ?></td>
    </tr>
    <tr>
        <th>Ministry Group</th>
        <td><?= htmlspecialchars($contractor["ministry_group"] ?? '') ?></td>
    </tr>
    <tr>
        <th>Chaplain's Assistant</th>
        <td><?= htmlspecialchars($contractor["chaplain_assistant"] ?? '') ?></td>
    </tr>
    <tr>
        <th>On Call Schedule</th>
        <td><?= htmlspecialchars($contractor["on_call_schedule"] ?? '') ?></td>
    </tr>
    <tr>
        <th>On Call Status</th>
        <td><?= htmlspecialchars($contractor["on_call_status"] ?? '') ?></td>
    </tr>
    <tr>
        <th>Birth Month</th>
        <td><?= htmlspecialchars($contractor["birth_month"] ?? '') ?></td>
    </tr>
    <tr>
        <th>Minisitry Orientation</th>
        <td><?= htmlspecialchars($contractor["minisitry_orientation"] ?? '') ?></td>
    </tr>
    <tr>
        <th>Volume Manual Number</th>
        <td><?= htmlspecialchars($contractor["volume_manual_number"] ?? '') ?></td>
    </tr>
    <tr>
        <th>PREA Training</th>
        <td><?= htmlspecialchars($contractor["prea_training"] ?? '') ?></td>
    </tr>
    <tr>
        <th>Main</th>
        <td><?= htmlspecialchars($contractor["main"] ?? '') ?></td>
    </tr>
    <tr>
        <th>HU-6</th>
        <td><?= htmlspecialchars($contractor["hu6"] ?? '') ?></td>
    </tr>
    <tr>
        <th>Denomination</th>
        <td><?= htmlspecialchars($contractor["denomination"] ?? '') ?></td>
    </tr>
    <tr>
        <th>Devices Approved</th>
        <td><?= htmlspecialchars($contractor["devices_approved"] ?? '') ?></td>
    </tr>
    <tr>
        <th>Termination Date</th>
        <td><?= htmlspecialchars($contractor["termination_date"] ?? '') ?></td>
    </tr>
    <tr>
        <th>Termination Reason</th>
        <td><?= htmlspecialchars($contractor["termination_reason"] ?? '') ?></td>
    </tr>
</table>