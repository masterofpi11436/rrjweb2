<h1>Order Details</h1>

    <p><strong>User:</strong> <?= htmlspecialchars($order['user_first_name'] . ' ' . $order['user_last_name']) ?></p>
    <p><strong>Supervisor:</strong> <?= htmlspecialchars($order['supervisor_first_name'] . ' ' . $order['supervisor_last_name']) ?></p>
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
            <?php foreach ($order['items'] as $item): ?>
                <tr>
                    <td><?= htmlspecialchars($item['name']) ?></td>
                    <td><?= htmlspecialchars($item['quantity']) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <form action="/warehouse/managers/request/approve/<?= htmlspecialchars($order['id']) ?>" method="post">
        <button type="submit">Approve</button>
    </form>

    <form action="/warehouse/managers/request/deny/<?= htmlspecialchars($order['id']) ?>" method="post">
        <button type="submit">Deny</button>
    </form>