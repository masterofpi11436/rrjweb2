<table>
    <thead>
        <tr>
            <th>Inmate ID</th>
            <th>Last Name</th>
            <th>First Name</th>
            <th>Middle Name</th>            
            <th>Date Tablet Found</th>
            <th>101 Incident Report</th>
            <th>Filed With Inmate Accounts</th>
            <th>Charged By Inmate Accounts</th>
            <th>Payment Status</th>
            <td>Notes</td>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($tablets as $tablet): ?>
        <tr>
            <td><?php echo $tablet['inmate_number']; ?></td>
            <td><?php echo $tablet['last_name']; ?></td>
            <td><?php echo $tablet['first_name']; ?></td>
            <td><?= empty($tablet["middle_name"]) ? 'None' : htmlspecialchars($tablet["middle_name"]) ?></td>            
            <td><?= empty($tablet["date_found"]) ? 'No date' : htmlspecialchars($tablet["date_found"]) ?></td>
            <td><?= $tablet["is_reported"] ? 'Reported' : 'Not Reported' ?></td>
            <td><?= $tablet["is_filed"] ? 'Filed' : 'Not Filed' ?></td>
            <td><?= $tablet["is_charged"] ? 'Charged' : 'Not Charged' ?></td>
            <td><?= $tablet["is_paid"] ? 'Account Paid' : 'Owes $300 for Tablet' ?></td>
            <td><?php echo $tablet['note']; ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

