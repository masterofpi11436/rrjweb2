<?php if (!empty($orders)): ?>
    <table border="1" cellpadding="10" cellspacing="0" style="width:100%; margin-top:20px; border-collapse:collapse;">
        <thead>
            <tr>
                <th>Item Name</th>
                <th>Total Quantity</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($orders as $order): ?>
                <tr>
                    <td><?= htmlspecialchars($order['name'] ?? '') ?></td>
                    <td><?= htmlspecialchars($order['total_quantity'] ?? '') ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
    <p>No data found for the yearly report.</p>
<?php endif; ?>

<div>
    <?php
        // Get the previous URL from the HTTP referer
        $previousUrl = $_SERVER['HTTP_REFERER'] ?? '/login';
    ?>
    <form action="<?= htmlspecialchars($previousUrl) ?>">
        <button>Go Back</button>
    </form>
</div>