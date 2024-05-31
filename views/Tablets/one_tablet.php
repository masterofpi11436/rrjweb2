<a href="/tablets/all">Home</a>
<a href="/tablets/edit/<?= htmlspecialchars($tablet['id']) ?>">Edit Tablet</a>

<table>
    <tr>
        <th>Inmate Number</th>
        <td><?= htmlspecialchars($tablet["inmate_number"]) ?></td>
    </tr>
    <tr>
        <th>First Name</th>
        <td><?= htmlspecialchars($tablet["first_name"]) ?></td>
    </tr>
    <tr>
        <th>Middle Name</th>
        <td><?= empty($tablet["middle_name"]) ? 'None' : htmlspecialchars($tablet["middle_name"]) ?></td>
    </tr>
    <tr>
        <th>Last Name</th>
        <td><?= htmlspecialchars($tablet["last_name"]) ?></td>
    </tr>
    <tr>
        <th>Date Found</th>
        <td><?= empty($tablet["date_found"]) ? 'No date' : htmlspecialchars($tablet["date_found"]) ?></td>
    </tr>
    <tr>
        <th>101 Incident Report</th>
        <td><?= $tablet["is_reported"] ? 'Reported' : 'Not Filed' ?></td>
    </tr>
    <tr>
        <th>Filed With Inmate Accounts</th>
        <td><?= $tablet["is_filed"] ? 'Filed' : 'Not Filed' ?></td>
    </tr>
    <tr>
        <th>Charged By Inmate Accounts</th>
        <td><?= $tablet["is_charged"] ? 'Charged' : 'Not Charged' ?></td>
    </tr>
    <tr>
        <th>Payment Status</th>
        <td><?= $tablet["is_paid"] ? 'Account Paid' : 'Owes $300 for Tablet' ?></td>
    </tr>
</table>