<div style="display: flex; justify-content: center;">
<table>
    <thead>
        <tr>
            <th style="width: 100px;">Inmate ID</th>
            <th style="width: 100px;">Last Name</th>
            <th style="width: 100px;">First Name</th>
            <th style="width: 100px;">Middle Name</th>            
            <th style="width: 100px;">Date Tablet Found</th>
            <th style="width: 100px;">101 Incident Report</th>
            <th style="width: 100px;">Filed With Inmate Accounts</th>
            <th style="width: 100px;">Charged By Inmate Accounts</th>
            <th style="width: 150px;">Payment Status</th>
            <td style="width: 100px;">Notes</td>
            <td style="width: 100px;">Created</td>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($tablets as $tablet): ?>
        <tr>
            <td><?=  $tablet['inmate_number']; ?></td>
            <td><?=  $tablet['last_name']; ?></td>
            <td><?=  $tablet['first_name']; ?></td>
            <td><?= empty($tablet["middle_name"]) ? 'None' : htmlspecialchars($tablet["middle_name"]) ?></td>
            <td><?= empty($tablet["date_found"]) ? 'No date' : htmlspecialchars($tablet["date_found"]) ?></td>
            <td><?= $tablet["is_reported"] ? 'Reported' : 'Not Reported' ?></td>
            <td><?= $tablet["is_filed"] ? 'Filed' : 'Not Filed' ?></td>
            <td><?= $tablet["is_charged"] ? 'Charged' : 'Not Charged' ?></td>
            <td><?= $tablet["is_paid"] ? 'Account Paid' : 'Owes $300 for Tablet' ?></td>
            <td><?= $tablet['note']; ?></td>
            <td><?= $tablet['created_at']; ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
</div>