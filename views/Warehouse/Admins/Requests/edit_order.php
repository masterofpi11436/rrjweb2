<h1>Edit Order</h1>

    <p><strong>Order ID:</strong> <?= htmlspecialchars($order['id']) ?></p>
    <p><strong>User:</strong> <?= htmlspecialchars($order['user_first_name'] . ' ' . $order['user_last_name']) ?></p>
    <p><strong>Supervisor:</strong> <?= htmlspecialchars($order['supervisor_first_name'] . ' ' . $order['supervisor_last_name']) ?></p>
    <p><strong>Section:</strong> <?= htmlspecialchars($order['section_name']) ?></p>
    <p><strong>Status:</strong> <?= htmlspecialchars($order['status']) ?></p>
    <p><strong>Created At:</strong> <?= htmlspecialchars($order['created_at']) ?></p>

    <form method="get" action="">
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
                    <form action="/warehouse/managers/request/update/<?= htmlspecialchars($order['id']); ?>" method="post">
                        <input type="hidden" name="item_id" value="<?= htmlspecialchars($item['id']); ?>">
                        <input type="number" name="quantity" min="0" value="<?= htmlspecialchars($order['items'][$item['id']]['quantity'] ?? 0); ?>">
                </td>
                <td>
                    <button type="submit">Add/Update Cart</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

    <form action="/warehouse/managers/request/one/<?= htmlspecialchars($order['id']); ?>" method="post">
        <button>Checkout</button>
    </form>