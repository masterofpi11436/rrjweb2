<form action="/warehouse/supervisors/items">
    <button>Back</button>
</form>

<?php if ($section && $items): ?>
    <h3>Would you like to submit this request to the warehouse for <?= htmlspecialchars($section['name']) ?>?</h3>

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
                    <form action="/warehouse/supervisors/update" method="post">
                        <input type="number" name="items[<?= $index ?>][quantity]" value="<?= htmlspecialchars($item['quantity']) ?>" min="0">
                        <input type="hidden" name="items[<?= $index ?>][id]" value="<?= htmlspecialchars($item['id']) ?>">
                        <button type="submit" name="action" value="update">Update</button>
                        <button type="submit" name="action" value="remove">Remove</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

    <form action="/warehouse/supervisors/submit" method="post">
        <button type="submit">Submit Request</button>
    </form>
<?php else: ?>
    <p>No items selected. Please go back and make your selections.</p>
<?php endif; ?>
