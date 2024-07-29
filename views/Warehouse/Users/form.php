<form action="/warehouse/users/section">
    <button>Home</button>
</form>

<form method="get" action="/warehouse/users/items" id="searchForm">
    <input type="text" name="search" placeholder="Search by Name or Type" class="search-input" value="<?= htmlspecialchars($search ?? '') ?>">
    
    <select name="item_type">
        <option value="">Select Item Type</option>
        <?php foreach ($itemTypes as $type): ?>
            <option value="<?= htmlspecialchars($type['id']); ?>" <?= (isset($itemType) && $itemType == $type['id']) ? 'selected' : ''; ?>>
                <?= htmlspecialchars($type['type']); ?>
            </option>
        <?php endforeach; ?>
    </select>

    <button type="submit">Search</button>
</form>

<h2>Select Items to add to Request</h2>

<form action="/warehouse/users/verify" id="checkoutForm">
    <button>Checkout</button>
</form>

<!-- Add this div to display selected items -->
<div id="cartItems">
    <?php if (!empty($selectedItems)): ?>
        <h3>Selected Items</h3>
        <ul>
            <?php foreach ($selectedItems as $item): ?>
                <li><?= htmlspecialchars($item['name']) . ': ' . htmlspecialchars($item['quantity']); ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
</div>

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
                <form action="/warehouse/users/items" method="post" class="cartForm">
                    <input type="hidden" name="item_id" value="<?= htmlspecialchars($item['id']); ?>">
                    <input type="hidden" name="search" id="searchHidden" value="<?= htmlspecialchars($search ?? '') ?>">
                    <input type="hidden" name="item_type" id="itemTypeHidden" value="<?= htmlspecialchars($itemType ?? '') ?>">
                    <input type="hidden" name="sort" id="sortHidden" value="<?= htmlspecialchars($sort ?? 'name') ?>">
                    <input type="hidden" name="order" id="orderHidden" value="<?= htmlspecialchars($order ?? 'asc') ?>">
                    <input type="number" name="quantity" min="0" value="<?= htmlspecialchars($selectedItems[$item['id']]['quantity'] ?? ''); ?>">
            </td>
            <td>
                <button type="submit">Update Cart</button>
                </form>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<script>
document.addEventListener("DOMContentLoaded", function() {
    // Restore scroll position
    if (sessionStorage.getItem('scrollPos')) {
        window.scrollTo(0, sessionStorage.getItem('scrollPos'));
    }

    // Save scroll position before form submission
    document.querySelectorAll("form").forEach(form => {
        form.addEventListener("submit", function() {
            sessionStorage.setItem('scrollPos', window.scrollY);

            // Populate hidden fields for the cart form with current search parameters
            if (form.classList.contains('cartForm')) {
                const searchForm = document.getElementById('searchForm');
                form.querySelector('#searchHidden').value = searchForm.querySelector('input[name="search"]').value;
                form.querySelector('#itemTypeHidden').value = searchForm.querySelector('select[name="item_type"]').value;
                form.querySelector('#sortHidden').value = searchForm.querySelector('input[name="sort"]').value;
                form.querySelector('#orderHidden').value = searchForm.querySelector('input[name="order"]').value;
            }
        });
    });
});
</script>
