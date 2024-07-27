<form action="/warehouse/supervisors/section">
    <button>Create New Request</button>
</form>

<h1>Requests Pending Warehouse</h1>

<?php if (!empty($orders)): ?>
    <table>
        <thead>
            <tr>
                <th>User Submitted</th>
                <th>Status</th>
                <th>Created At</th>
                <th>View</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($orders as $order): ?>
                <tr>
                    <td><?= htmlspecialchars($order['user_first_name']) . ' ' . htmlspecialchars($order['user_last_name']); ?></td>
                    <td><?= htmlspecialchars($order['status']) ?></td>
                    <td><?= htmlspecialchars($order['created_at']) ?></td>
                    <td>
                        <a href="/warehouse/supervisors/request/one/<?= htmlspecialchars($order['id']); ?>">View</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
    <p>No Orders Submitted to Warehouse.</p>
<?php endif; ?>

<h1>Requests Submitted by Users</h1>

<?php if (!empty($orders)): ?>
    <table>
        <thead>
            <tr>
                <th>User Submitted</th>
                <th>Status</th>
                <th>Created At</th>
                <th>View</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($orders as $order): ?>
                <tr>
                    <td><?= htmlspecialchars($order['user_first_name']) . ' ' . htmlspecialchars($order['user_last_name']); ?></td>
                    <td><?= htmlspecialchars($order['status']) ?></td>
                    <td><?= htmlspecialchars($order['created_at']) ?></td>
                    <td>
                        <a href="/warehouse/supervisors/request/one/<?= htmlspecialchars($order['id']); ?>">View</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
    <p>No orders submitted by officers.</p>
<?php endif; ?>