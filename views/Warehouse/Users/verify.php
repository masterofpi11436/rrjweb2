<?php if ($supervisor && $section && $items): ?>
    <h2>Would you like to submit this request to your supervisor 
        <?= htmlspecialchars($supervisor['first_name']) . ' ' . htmlspecialchars($supervisor['last_name']) ?> for the <?= htmlspecialchars($section['name']) ?>?</h2>

    <h2>Selected Items</h2>
    <table>
        <tr>
            <th>Item</th>
            <th>Quantity</th>
        </tr>
        <?php foreach ($items as $index => $item): ?>
            <tr>
                <td><?= htmlspecialchars($item['name']) ?></td>
                <td>
                    <form action="/warehouse/users/update" method="post">
                        <input type="number" name="items[<?= $index ?>][quantity]" value="<?= htmlspecialchars($item['quantity']) ?>" min="0">
                        <input type="hidden" name="items[<?= $index ?>][id]" value="<?= htmlspecialchars($item['id']) ?>">
                        <button type="submit" name="action" value="update">Update</button>
                        <button type="submit" name="action" value="remove">Remove</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

    <form action="/warehouse/users/items" method="post">
        <button type="submit">Go Back</button>
    </form>

    <form action="/warehouse/users/submit" method="post">
        <button type="submit">Submit Request</button>
    </form>
<?php else: ?>
    <p>No items selected. Please go back and make your selections.</p>
<?php endif; ?>
