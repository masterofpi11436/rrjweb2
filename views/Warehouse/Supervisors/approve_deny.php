<h1>Order Details</h1>

<p><strong>User:</strong> <?= htmlspecialchars($order['user_first_name'] . ' ' . $order['user_last_name']) ?></p>
<p><strong>Section:</strong> <?= htmlspecialchars($order['section_name']) ?></p>
<p><strong>Status:</strong> <?= htmlspecialchars($order['status']) ?></p>
<p><strong>Created At:</strong> <?= htmlspecialchars($order['created_at']) ?></p>

<h2>Items</h2>
<table>
    <thead>
        <tr>
            <th>Item Name</th>
            <th>Quantity</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($items as $item): ?>
            <tr>
                <td><?= htmlspecialchars($item['name']) ?></td>
                <td><?= htmlspecialchars($item['quantity']) ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<form action="/warehouse/supervisors/approve" method="post">
    <input type="hidden" name="order_id" value="<?= htmlspecialchars($order['id']) ?>">
    <button type="submit">Approve</button>
</form>

<form action="/warehouse/supervisors/edit" method="get">
    <input type="hidden" name="order_id" value="<?= htmlspecialchars($order['id']) ?>">
    <button type="submit">Edit</button>
</form>

<form action="/warehouse/supervisors/deny" method="post">
    <input type="hidden" name="order_id" value="<?= htmlspecialchars($order['id']) ?>">
    <button type="submit">Deny</button>
</form>
