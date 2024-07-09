<form method="get" action="/warehouse/supervisors/items">
    <input type="text" name="search" placeholder="Search by Name or Type" class="search-input" value="<?= htmlspecialchars($_GET['search'] ?? '') ?>">
    
    <select name="item_type">
        <option value="">Select Item Type</option>
        <?php foreach ($itemTypes as $type): ?>
            <option value="<?= htmlspecialchars($type['id']); ?>" <?= (isset($_GET['item_type']) && $_GET['item_type'] == $type['id']) ? 'selected' : ''; ?>>
                <?= htmlspecialchars($type['type']); ?>
            </option>
        <?php endforeach; ?>
    </select>

    <button type="submit">Search</button>
</form>

<h2>Select Items to add to Request</h2>
<table>
    <tr>
        <th>Item</th>
        <th>Item Type</th>
        <th>Quantity</th>
        <th>Action</th>
    </tr>
    <?php foreach ($items as $item): ?>
        <tr>
            <td><?= htmlspecialchars($item['name']); ?></td>
            <td><?= htmlspecialchars($item['item_type']); ?></td>
            <td>
                <form action="/warehouse/supervisors/items" method="post">
                    <input type="hidden" name="item_id" value="<?= htmlspecialchars($item['id']); ?>">
                    <input type="number" name="quantity" min="0" value="<?= htmlspecialchars($selectedItems[$item['id']]['quantity'] ?? 0); ?>">
            </td>
            <td>
                <button type="submit">Add/Update Cart</button>
                </form>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<form action="/warehouse/supervisors/verify">
    <button>Checkout</button>
</form>
