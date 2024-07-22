<h2>Order Details</h2>

    <table>
        <thead>
            <tr>
                <th>Item</th>
                <th>Quantity</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($order['items'] as $item): ?>
                <tr>
                    <td><?php echo htmlspecialchars($item['name']); ?></td>
                    <td><?php echo htmlspecialchars($item['quantity']); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <a href="/warehouse/admins/history/section/<?php echo htmlspecialchars($order['section_id']); ?>">Back to Section History</a>