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

    <p><strong>Order ID:</strong> <?= htmlspecialchars($order['id']) ?></p>
    <p><strong>User:</strong> <?= htmlspecialchars($order['user_first_name'] . ' ' . $order['user_last_name']) ?></p>
    <p><strong>Supervisor:</strong> <?= htmlspecialchars($order['supervisor_first_name'] . ' ' . $order['supervisor_last_name']) ?></p>
    <p><strong>Section:</strong> <?= htmlspecialchars($order['section_name']) ?></p>
    <p><strong>Status:</strong> <?= htmlspecialchars($order['status']) ?></p>
    <p><strong>Created At:</strong> <?= htmlspecialchars($order['created_at']) ?></p>

    <h2>Select Items to Edit</h2>

    <form action="/warehouse/managers/request/one/<?= htmlspecialchars($order['id']); ?>" method="post">
        <button>Checkout</button>
    </form>
    
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
                        <input type="hidden" name="item_type" value="<?= htmlspecialchars($_GET['item_type'] ?? '') ?>">
                        <input type="number" name="quantity" min="0" value="<?= htmlspecialchars($order['items'][$item['id']]['quantity'] ?? 0); ?>">
                </td>
                <td>
                    <button type="submit">Add/Update Cart</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>