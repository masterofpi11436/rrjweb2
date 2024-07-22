<!DOCTYPE html>
<html>
<head>
    <title>Section History</title>
</head>
<body>
    <h2>Section <?php echo htmlspecialchars($section['name']); ?>'s Past Requests</h2>

    <form method="post" action="">
        <label for="month">Select Month:</label>
        <select id="month" name="month">
            <option value="">All Months</option>
            <?php for ($m = 1; $m <= 12; $m++): ?>
                <option value="<?= $m ?>" <?= isset($_POST['month']) && $_POST['month'] == $m ? 'selected' : '' ?>><?= date('F', mktime(0, 0, 0, $m, 1)) ?></option>
            <?php endfor; ?>
        </select>
        <button type="submit">Filter</button>
    </form>

    <?php if (!empty($orders)): ?>
        <table>
            <thead>
                <tr>
                    <th>User</th>
                    <th>Supervisor</th>
                    <th>Section</th>
                    <th>Created At</th>
                    <th>Approved By</th>
                    <th>Approved At</th>
                    <th>View</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($orders as $order): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($order['user_last_name']); ?></td>
                        <td><?php echo htmlspecialchars($order['supervisor_last_name']); ?></td>
                        <td><?php echo htmlspecialchars($order['section_name']); ?></td>
                        <td><?php echo htmlspecialchars($order['created_at']); ?></td>
                        <td><?php echo htmlspecialchars($order['warehouse_last_name']); ?></td>
                        <td><?php echo htmlspecialchars($order['approved_denied_at']); ?></td>
                        <td>
                            <a href="/warehouse/admins/history/one/<?php echo $order['id']; ?>">View</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No approved orders found for this section.</p>
    <?php endif; ?>
</body>
</html>
