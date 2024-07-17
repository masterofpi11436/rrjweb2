<h1>Showing the section's history here</h1>
<h2>Section: <?php echo htmlspecialchars($section['name']); ?></h2>

    <?php if (!empty($orders)): ?>
        <table>
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>User</th>
                    <th>Supervisor</th>
                    <th>Items</th>
                    <th>Status</th>
                    <th>Created At</th>
                    <th>Approved At</th>
                    <th>Approved By</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($orders as $order): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($order['id']); ?></td>
                        <td><?php echo htmlspecialchars($order['user_last_name']); ?></td>
                        <td><?php echo htmlspecialchars($order['supervisor_last_name']); ?></td>
                        <td><?php echo htmlspecialchars(json_encode($order['items'])); ?></td>
                        <td><?php echo htmlspecialchars($order['status']); ?></td>
                        <td><?php echo htmlspecialchars($order['created_at']); ?></td>
                        <td><?php echo ($order['approved_at']); ?></td>
                        <td><?php echo ($order['approved_by']); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No approved orders found for this section.</p>
    <?php endif; ?>