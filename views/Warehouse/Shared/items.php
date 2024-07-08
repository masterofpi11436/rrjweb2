<form method="get" action="/warehouse/users/items">
    <input type="text" name="search" placeholder="Search by Name or Type" class="search-input" value="<?= htmlspecialchars($_GET['search'] ?? '') ?>">
    
    <select name="item_type">
        <option value="">Select Item Type</option>
        <?php foreach ($itemTypes as $type): ?>
            <option value="<?= htmlspecialchars($type['id']); ?>" <?= (isset($_GET['item_type']) && $_GET['item_type'] == $type['id']) ? 'selected' : ''; ?>>
                <?= htmlspecialchars($type['type']); ?>
            </option>
        <?php endforeach; ?>
    </select>

    <?php foreach ($selectedItems as $item): ?>
        <input type="hidden" name="items[]" value="<?= htmlspecialchars($item['id']); ?>">
        <input type="hidden" name="quantity[<?= htmlspecialchars($item['id']); ?>]" value="<?= htmlspecialchars($item['quantity']); ?>">
    <?php endforeach; ?>

    <button type="submit">Search</button>
</form>

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
                    <input type="checkbox" name="items[]" value="<?= htmlspecialchars($item["id"]); ?>" <?= in_array($item['id'], array_column($selectedItems, 'id')) ? 'checked' : ''; ?>>
                </td>
                <td>
                    <input type="number" name="quantity[<?= htmlspecialchars($item["id"]); ?>]" min="0" value="<?= htmlspecialchars($selectedItems[array_search($item['id'], array_column($selectedItems, 'id'))]['quantity'] ?? '0'); ?>">
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <button type="submit">Submit</button>
</form>
