<form action="/warehouse/users/section">
    <button>Back</button>
</form>

<div class="container">
    <form method="get" action="/warehouse/users/items" id="searchForm">
        <label for="search">Search</label>
        <input type="text" id="search" name="search" placeholder="Search by Name or Type" class="search-input" value="<?= htmlspecialchars($search ?? '') ?>">
        
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
</div>

<h2>Select Items to add to Request</h2>

<!-- Add this div to display selected items -->
<div id="cartItems">
    <?php if (!empty($selectedItems)): ?>
        <h3>Selected Items</h3>
        <table>
            <thead>
                <tr>
                    <th>Item Name</th>
                    <th>Quantity</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($selectedItems as $item): ?>
                    <tr>
                        <td><?= htmlspecialchars($item['name']); ?></td>
                        <td><?= htmlspecialchars($item['quantity']); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

    <?php else: ?>
        <h3>Your Cart is Empty</h3>
    <?php endif; ?>

    <form class="checkout-btn" action="/warehouse/users/verify" id="checkoutForm">
        <button>Checkout</button>
    </form>
</div>

<div class="items-container">
    <?php foreach ($items as $item): ?>
        <div class="item-card">
            <img src="<?= $item['image']; ?>" alt="No Image Available" onerror="this.onerror=null; this.src='/public/images/no-image.jpg';" class="item-image">
            <div class="item-details">
                <div class="item-name"><?= htmlspecialchars($item['name']); ?></div>
                <form action="/warehouse/users/items" method="post" class="cartForm">
                    <input type="hidden" name="item_id" value="<?= htmlspecialchars($item['id']); ?>">
                    <input type="hidden" name="search" id="searchHidden" value="<?= htmlspecialchars($search ?? '') ?>">
                    <input type="hidden" name="item_type" id="itemTypeHidden" value="<?= htmlspecialchars($itemType ?? '') ?>">
                    <input type="hidden" name="sort" id="sortHidden" value="<?= htmlspecialchars($sort ?? 'name') ?>">
                    <input type="hidden" name="order" id="orderHidden" value="<?= htmlspecialchars($order ?? 'asc') ?>">
                    <div class="quantity-input">
                        <button type="button" onclick="changeQuantity(this, -1)">-</button>
                        <input type="number" name="quantity" min="0" value="<?= htmlspecialchars($selectedItems[$item['id']]['quantity'] ?? 0); ?>" readonly>
                        <button type="button" onclick="changeQuantity(this, 1)">+</button>
                    </div>
                    <button type="submit">Add</button>
                </form>
            </div>
        </div>
    <?php endforeach; ?>
</div>

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

function changeQuantity(button, delta) {
    const input = button.parentElement.querySelector('input[name="quantity"]');
    let quantity = parseInt(input.value) || 0;
    quantity += delta;
    if (quantity < 0) quantity = 0;
    input.value = quantity;
}
</script>
