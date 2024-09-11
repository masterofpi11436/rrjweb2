<form action="/warehouse/managers/inhouse/create">
    <button>Back</button>
</form>

<h2>Would you like to submit this request to your supervisor 
<?= htmlspecialchars($supervisor['first_name']) . ' ' . htmlspecialchars($supervisor['last_name']) ?> for the <?= htmlspecialchars($section['name']) ?>?</h2>

<?php if ($section && $items): ?>

    <h2>Selected Items</h2>
    <form method="POST" action="/warehouse/managers/inhouse/update">
    <table>
        <tr>
            <th>Item</th>
            <th>Quantity</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($_SESSION['selected_items'] as $item_id => $item): ?>
        <tr>
            <td><?= htmlspecialchars($item['name']) ?></td>
            <td>
                <input type="number" name="items[<?= $item_id ?>][quantity]" value="<?= htmlspecialchars($item['quantity']) ?>" min="0">
                <input type="hidden" name="items[<?= $item_id ?>][id]" value="<?= htmlspecialchars($item['id']) ?>">
            </td>
            <td>
                <button type="submit" name="action" value="update">Update</button>
                <button type="submit" name="action" value="remove">Remove</button>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</form>


<form action="/warehouse/managers/inhouse/submit" method="post">
    <button type="submit">Submit Request</button>
</form>
<?php else: ?>
    <p>No items selected. Please go back and make your selections.</p>
<?php endif; ?>
