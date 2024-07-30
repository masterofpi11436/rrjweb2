<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Restore scroll position
        if (sessionStorage.scrollTop !== undefined) {
            window.scrollTo(0, sessionStorage.scrollTop);
        }

        // Save scroll position
        window.addEventListener("beforeunload", function() {
            sessionStorage.scrollTop = document.documentElement.scrollTop || document.body.scrollTop;
        });
    });
</script>

<form action="/warehouse/dashboard">
    <button>Back</button>
</form>

<p><strong>Order ID:</strong> <?= htmlspecialchars($order['id']) ?></p>
<p><strong>User:</strong> <?= htmlspecialchars($order['user_first_name'] . ' ' . $order['user_last_name']) ?></p>
<p><strong>Supervisor:</strong> <?= htmlspecialchars($order['supervisor_first_name'] . ' ' . $order['supervisor_last_name']) ?></p>
<p><strong>Section:</strong> <?= htmlspecialchars($order['section_name']) ?></p>
<p><strong>Status:</strong> <?= htmlspecialchars($order['status']) ?></p>
<p><strong>Created At:</strong> <?= htmlspecialchars($order['created_at']) ?></p>

<h2>Select Items to Edit</h2>

<form method="get" action="/warehouse/managers/request/edit/<?= htmlspecialchars($order['id']); ?>">
    <input type="text" name="search" placeholder="Search items" value="<?= htmlspecialchars($_GET['search'] ?? '') ?>">
    <button type="submit">Search</button>
</form>

<form action="/warehouse/managers/request/edit_note/<?= htmlspecialchars($order['id']) ?>" method="post">
    <button>Finalize</button>
</form>

<!-- Add this div to display selected items -->
<div id="cartItems">
    <?php if (!empty($_SESSION['selected_items'])): ?>
        <h3>Edited Items</h3>
        <ul>
            <?php foreach ($_SESSION['selected_items'] as $item): ?>
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
                <form action="/warehouse/managers/request/update/<?= htmlspecialchars($order['id']); ?>" method="post">
                    <input type="hidden" name="item_id" value="<?= htmlspecialchars($item['id']); ?>">
                    <input type="hidden" name="search" value="<?= htmlspecialchars($_GET['search'] ?? '') ?>">
                    <input type="number" name="quantity" min="0" value="<?= htmlspecialchars($order['items'][$item['id']]['quantity'] ?? 0); ?>">
            </td>
            <td>
                <button type="submit">Update Cart</button>
                </form>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
