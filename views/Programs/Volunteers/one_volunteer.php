<form action="/programs/volunteers/all">
    <button>Home</button>
</form>

<form action="/programs/volunteers/edit/<?= htmlspecialchars($volunteer['id']) ?>">
    <button>Edit Volunteer</button>
</form>

<table>
    <tr>
        <th>Last Name</th>
        <td><?= htmlspecialchars($volunteer["last_name"] ?? '') ?></td>
    </tr>
    <tr>
        <th>First Name</th>
        <td><?= htmlspecialchars($volunteer["first_name"] ?? '') ?></td>
    </tr>
    <tr>
        <th>Group Name</th>
        <td><?= htmlspecialchars($volunteer["group_name"] ?? '') ?></td>
    </tr>
    <tr>
        <th>Street Address</th>
        <td><?= htmlspecialchars($volunteer["address"] ?? '') ?></td>
    </tr>
    <tr>
        <th>City</th>
        <td><?= htmlspecialchars($volunteer["city"] ?? '') ?></td>
    </tr>
    <tr>
        <th>State</th>
        <td><?= htmlspecialchars($volunteer["state"] ?? '') ?></td>
    </tr>
    <tr>
        <th>Zip Code</th>
        <td><?= htmlspecialchars($volunteer["zip"] ?? '') ?></td>
    </tr>
    <tr>
        <th>Home Phone Number</th>
        <td><?= htmlspecialchars($volunteer["home_phone"] ?? '') ?></td>
    </tr>
    <tr>
        <th>Cell Phone Number</th>
        <td><?= htmlspecialchars($volunteer["cell_number"] ?? '') ?></td>
    </tr>
    <tr>
        <th>Birthdate</th>
        <td><?= htmlspecialchars($volunteer["birthdate"] ?? '') ?></td>
    </tr>
    <tr>
        <th>Date Hired</th>
        <td><?= htmlspecialchars($volunteer["date_hired"] ?? '') ?></td>
    </tr>
    <tr>
        <th>Schedule</th>
        <td><?= htmlspecialchars($volunteer["schedule"] ?? '') ?></td>
    </tr>
    <tr>
        <th>Signature</th>
        <td><?= htmlspecialchars($volunteer["signature"] ?? '') ?></td>
    </tr>
    <tr>
        <th>Church Locator</th>
        <td><?= htmlspecialchars($volunteer["church_locator"] ?? '') ?></td>
    </tr>
    <tr>
        <th>Work Phone</th>
        <td><?= htmlspecialchars($volunteer["work_phone"] ?? '') ?></td>
    </tr>
    <tr>
        <th>Training Experience</th>
        <td><?= htmlspecialchars($volunteer["experience_training"] ?? '') ?></td>
    </tr>
    <tr>
        <th>Degree Type</th>
        <td><?= htmlspecialchars($volunteer["degree_type"] ?? '') ?></td>
    </tr>
    <tr>
        <th>Email</th>
        <td><?= htmlspecialchars($volunteer["email"] ?? '') ?></td>
    </tr>
    <tr>
        <th>Race</th>
        <td><?= htmlspecialchars($volunteer["race"] ?? '') ?></td>
    </tr>
    <tr>
        <th>Sex</th>
        <td><?= htmlspecialchars($volunteer["sex"] ?? '') ?></td>
    </tr>
    <tr>
        <th>SSN</th>
        <td><?= htmlspecialchars($volunteer["ssn"] ?? '') ?></td>
    </tr>
    <tr>
        <th>Document Status</th>
        <td><?= htmlspecialchars($volunteer["document_status"] ?? '') ?></td>
    </tr>
    <tr>
        <th>Church Address</th>
        <td><?= htmlspecialchars($volunteer["church_address"] ?? '') ?></td>
    </tr>
    <tr>
        <th>Church Leader</th>
        <td><?= htmlspecialchars($volunteer["church_leader"] ?? '') ?></td>
    </tr>
    <tr>
        <th>Church Phone</th>
        <td><?= htmlspecialchars($volunteer["church_phone"] ?? '') ?></td>
    </tr>
    <tr>
        <th>Specific Skill Education</th>
        <td><?= htmlspecialchars($volunteer["specific_skill_education"] ?? '') ?></td>
    </tr>
    <tr>
        <th>Category Name</th>
        <td><?= htmlspecialchars($volunteer["category_name"] ?? '') ?></td>
    </tr>
    <tr>
        <th>Attended Quarterly Meeting?</th>
        <td><?= htmlspecialchars($volunteer["quarter_meeting_attended"] ?? '') ?></td>
    </tr>
    <tr>
        <th>Volunteer Dinner RSVP?</th>
        <td><?= htmlspecialchars($volunteer["vol_dinner_rsvp"] ?? '') ?></td>
    </tr>
    <tr>
        <th>Bringing a Dinner Guest?</th>
        <td><?= htmlspecialchars($volunteer["dinner_guest"] ?? '') ?></td>
    </tr>
    <tr>
        <th>>Attended Quarterly Meeting?</th>
        <td><?= htmlspecialchars($volunteer["attended_quarterly_meeting"] ?? '') ?></td>
    </tr>
    <tr>
        <th>Current Status</th>
        <td><?= htmlspecialchars($volunteer["active_inactive_terminated"] ?? '') ?></td>
    </tr>
    <tr>
        <th>Activity Status</th>
        <td><?= htmlspecialchars($volunteer["activity_status"] ?? '') ?></td>
    </tr>
    <tr>
        <th>Ministry Group</th>
        <td><?= htmlspecialchars($volunteer["ministry_group"] ?? '') ?></td>
    </tr>
    <tr>
        <th>Chaplain's Assistant</th>
        <td><?= htmlspecialchars($volunteer["chaplain_assistant"] ?? '') ?></td>
    </tr>
    <tr>
        <th>On Call Schedule</th>
        <td><?= htmlspecialchars($volunteer["on_call_schedule"] ?? '') ?></td>
    </tr>
    <tr>
        <th>On Call Status</th>
        <td><?= htmlspecialchars($volunteer["on_call_status"] ?? '') ?></td>
    </tr>
    <tr>
        <th>Birth Month</th>
        <td><?= htmlspecialchars($volunteer["birth_month"] ?? '') ?></td>
    </tr>
    <tr>
        <th>Minisitry Orientation</th>
        <td><?= htmlspecialchars($volunteer["minisitry_orientation"] ?? '') ?></td>
    </tr>
    <tr>
        <th>Volume Manual Number</th>
        <td><?= htmlspecialchars($volunteer["volume_manual_number"] ?? '') ?></td>
    </tr>
    <tr>
        <th>PREA Training</th>
        <td><?= htmlspecialchars($volunteer["prea_training"] ?? '') ?></td>
    </tr>
    <tr>
        <th>Main</th>
        <td><?= htmlspecialchars($volunteer["main"] ?? '') ?></td>
    </tr>
    <tr>
        <th>HU-6</th>
        <td><?= htmlspecialchars($volunteer["hu6"] ?? '') ?></td>
    </tr>
    <tr>
        <th>Denomination</th>
        <td><?= htmlspecialchars($volunteer["denomination"] ?? '') ?></td>
    </tr>
    <tr>
        <th>Devices Approved</th>
        <td><?= htmlspecialchars($volunteer["devices_approved"] ?? '') ?></td>
    </tr>
</table>