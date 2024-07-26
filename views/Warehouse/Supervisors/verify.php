<?php if ($section && $items): ?>
    <h3>Would you like to submit this request to the warehouse for <?= htmlspecialchars($section['name']) ?>?</h3>

    <form action="/warehouse/supervisors/items" method="post">
        <button type="submit">Go Back</button>
    </form>

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

    <form action="/warehouse/supervisors/submit" method="post">
        <button type="submit">Submit Request</button>
    </form>
<?php else: ?>
    <p>No data available to verify. Please go back and make your selections.</p>
<?php endif; ?>
