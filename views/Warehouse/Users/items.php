<form action="/warehouse/users/verify" method="post">
    <h2>Select Items to add to Request</h2>
    <table>
        <tr>
            <th>Item</th>
            <th>Item Type</th>
            <th>Select</th>
            <th>Quantity</th>
        </tr>
        <?php foreach ($items as $item): ?>
            <tr>
                <td><?= htmlspecialchars($item['name']); ?></td>
                <td><?= htmlspecialchars($item['item_type']); ?></td>
                <td>
                    <input type="checkbox" name="items[]" value="<?= htmlspecialchars($item["id"]) ?>">
                </td>
                <td>
                    <input type="number" name="quantity[<?= htmlspecialchars($item["id"]) ?>]" min="0" value="0">
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <button type="submit">Submit</button>
</form>
