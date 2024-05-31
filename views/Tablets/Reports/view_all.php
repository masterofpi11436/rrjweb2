<table>
    <thead>
        <tr>
            <th>Inmate ID</th>
            <th>First Name</th>
            <th>Middle Name</th>
            <th>Last Name</th>
            <th>Date Tablet Found</th>
            <th>101 Reported</th>
            <th>Filed By Inmate Accounts</th>
            <th>Charged By Inmate Accounts</th>
            <th>Account Paid</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($tablets as $tablet): ?>
        <tr>
            <td><?php echo $tablet['id']; ?></td>
            <td><?php echo $tablet['first_name']; ?></td>
            <td><?php echo $tablet['middle_name']; ?></td>
            <td><?php echo $tablet['last_name']; ?></td>
            <td><?php echo $tablet['date_found']; ?></td>
            <td><?php echo $tablet['is_reported']; ?></td>
            <td><?php echo $tablet['is_filed']; ?></td>
            <td><?php echo $tablet['is_charged']; ?></td>
            <td><?php echo $tablet['is_paid']; ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

