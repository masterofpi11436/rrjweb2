<?php if ($supervisor && $section && $items): ?>
    <p>Would you like to submit this request to <?= htmlspecialchars($supervisor['first_name']) . ' ' . htmlspecialchars($supervisor['last_name']) ?> for the <?= htmlspecialchars($section['name']) ?> section?</p>

    <h2>Selected Items</h2>
    <table>
        <tr>
            <th>Item</th>
            <th>Quantity</th>
        </tr>
        <?php foreach ($items as $item): ?>
            <tr>
                <td><?= htmlspecialchars($item['name']) ?></td>
                <td><?= htmlspecialchars($item['quantity']) ?></td>
            </tr>
        <?php endforeach; ?>
    </table>

    <form action="/warehouse/users/items" method="post">
        <button type="submit">Go Back</button>
    </form>

    <form action="/submit_request" method="post">
        <button type="submit">Submit Request</button>
    </form>
<?php else: ?>
    <p>No data available to verify. Please go back and make your selections.</p>
<?php endif; ?>
