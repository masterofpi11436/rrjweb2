<form action="/warehouse/supervisors/section">
    <button>Create New Request</button>
</form>

<h1>Requests Pending Warehouse Approval</h1>

<?php if (!empty($pendings)): ?>
    <table>
        <thead>
            <tr>
                <th>Section</th>
                <th>Created At</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pendings as $pending): ?>
                <tr>
                    <td><?= htmlspecialchars($pending['section_name']) ?></td>
                    <td><?= htmlspecialchars($pending['created_at']) ?></td>
                    <td><?= htmlspecialchars($pending['status']) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
    <p>All caught up on orders.</p>
<?php endif; ?>

<h1>Requests Submitted by Officers</h1>

<?php if (!empty($orders)): ?>
    <table>
        <thead>
            <tr>
                <th>Submitted By</th>
                <th>Created At</th>
                <th>Section</th>
                <th>View</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($orders as $order): ?>
                <tr>
                    <td><?= htmlspecialchars($order['user_first_name']) . ' ' . htmlspecialchars($order['user_last_name']); ?></td>
                    <td><?= htmlspecialchars($order['created_at']) ?></td>
                    <td><?= htmlspecialchars($order['section_name']) ?></td>
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