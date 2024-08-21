<form action="/warehouse/properties/dashboard">
    <button>Back</button>
</form>

<h2>Items</h2>

<?php if (!empty($order)): ?>
    <h2>Order Details</h2>
    <table>
        <tr>
            <th>Order ID</th>
            <td><?= htmlspecialchars($order['id']) ?></td>
        </tr>
        <tr>
            <th>User</th>
            <td><?= htmlspecialchars($order['user_first_name']) . ' ' . htmlspecialchars($order['user_last_name']); ?></td>
        </tr>
        <tr>
            <th>Section</th>
            <td><?= htmlspecialchars($order['section_name']) ?></td>
        </tr>
        <tr>
            <th>Status</th>
            <td><?= htmlspecialchars($order['status']) ?></td>
        </tr>
        <tr>
            <th>Created At</th>
            <td><?= htmlspecialchars($order['created_at']) ?></td>
        </tr>
    </table>

    <h3>Items</h3>
    <table>
        <thead>
            <tr>
                <th>Item Name</th>
                <th>Quantity</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($order['items'] as $item): ?>
                <tr>
                    <td><?= htmlspecialchars($item['name']) ?></td>
                    <td><?= htmlspecialchars($item['quantity']) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
    <p>No order details found.</p>
<?php endif; ?>

<form action="/warehouse/properties/request/approve/<?= htmlspecialchars($order['id']) ?>">
    <button>Approve</button>
</form>

<form action="/warehouse/properties/request/deny/<?= htmlspecialchars($order['id']) ?>">
    <button>Deny</button>
</form>