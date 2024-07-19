<h1>Showing the section's history here</h1>
<h2>Section: <?php echo htmlspecialchars($section['name']); ?></h2>

    <?php if (!empty($orders)): ?>
        <table>
            <thead>
                <tr>
                    <th>User</th>
                    <th>Supervisor</th>
                    <th>Created At</th>
                    <th>Approved By</th>
                    <th>Approved At</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($orders as $order): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($order['user_last_name']); ?></td>
                        <td><?php echo htmlspecialchars($order['supervisor_last_name']); ?></td>
                        <td><?php echo htmlspecialchars($order['created_at']); ?></td>
                        <td><?php echo ($order['approved_by']); ?></td>
                        <td><?php echo ($order['approved_at']); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No approved orders found for this section.</p>
    <?php endif; ?>