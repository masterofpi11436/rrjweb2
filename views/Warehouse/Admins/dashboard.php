<form action="/warehouse/admins/all">
    <button>Warehouse Users</button>
</form>

<form action="/warehouse/items/all">
    <button>Warehouse Items</button>
</form>

<form action="/warehouse/itemtype/all">
    <button>Warehouse Item Types</button>
</form>

<form action="/warehouse/sections/all">
    <button>Warehouse Sections</button>
</form>

<form action="/warehouse/managers/history/dashboard">
    <button>History</button>
</form>

<h1>Current Requests</h1>

<?php if (!empty($orders)): ?>
    <table>
        <thead>
            <tr>
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
                    <td><?= htmlspecialchars($order['supervisor_first_name'] . ' ' . $order['supervisor_last_name']) ?></td>
                    <td><?= htmlspecialchars($order['section_name']) ?></td>
                    <td><?= htmlspecialchars($order['status']) ?></td>
                    <td><?= htmlspecialchars($order['created_at']) ?></td>
                    <td>
                        <a href="/warehouse/managers/request/one/<?= htmlspecialchars($order['id']); ?>">View</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
    <p>All caught up on orders.</p>
<?php endif; ?>