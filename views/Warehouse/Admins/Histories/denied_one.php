<p><strong>User:</strong> <?= htmlspecialchars($order['user_first_name'] . ' ' . $order['user_last_name']) ?></p>
<p><strong>Supervisor:</strong> <?= htmlspecialchars($order['supervisor_first_name'] . ' ' . $order['supervisor_last_name']) ?></p>
<p><strong>Section:</strong> <?= htmlspecialchars($order['section_name']) ?></p>
<p><strong>Status:</strong> <?= htmlspecialchars($order['status']) ?></p>
<p><strong>Created At:</strong> <?= htmlspecialchars($order['created_at']) ?></p>
<p><strong>Denied By:</strong> <?= htmlspecialchars($order['warehouse_first_name'] . ' ' . $order['warehouse_last_name']) ?></p>
<p><strong>Date Denied:</strong> <?= htmlspecialchars($order['approved_denied_at']) ?></p>

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