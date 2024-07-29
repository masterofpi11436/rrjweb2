<form action="/warehouse/managers/history/dashboard">
    <button>Go Back</button>
</form>

<?php if (!empty($orders)): ?>
    <table>
        <thead>
            <tr>
                <th>User Name</th>
                <th>Supervisor Name</th>
                <th>Section</th>
                <th>Status</th>
                <th>Created At</th>
                <th>View</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($orders as $order): ?>
                <tr>
                    <td><?= htmlspecialchars($order['user_first_name'] . ' ' . $order['user_last_name']) ?></td>
                    <td><?= htmlspecialchars($order['supervisor_first_name'] . ' ' . $order['supervisor_last_name']) ?></td>
                    <td><?= htmlspecialchars($order['section_name']) ?></td>
                    <td><?= htmlspecialchars($order['status']) ?></td>
                    <td><?= htmlspecialchars($order['created_at']) ?></td>
                    <td>
                        <a href="/warehouse/managers/history/denied/<?= htmlspecialchars($order['id']); ?>">View</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
    <p>No Denied Requests.</p>
<?php endif; ?>