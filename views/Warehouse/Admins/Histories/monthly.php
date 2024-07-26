<form method="get" action="/warehouse/managers/history/monthly">
    <label for="section">Select Section:</label>
    <select name="section_id" id="section">
        <option value="">All Sections</option>
        <?php foreach ($sections as $section): ?>
            <option value="<?= htmlspecialchars($section['id']) ?>" <?= isset($sectionId) && $sectionId == $section['id'] ? 'selected' : '' ?>><?= htmlspecialchars($section['name']) ?></option>
        <?php endforeach; ?>
    </select>
    <button type="submit">Filter</button>
</form>

<?php if (!empty($orders)): ?>
    <table border="1" cellpadding="10" cellspacing="0" style="width:100%; margin-top:20px; border-collapse:collapse;">
        <thead>
            <tr>
                <th>Section</th>
                <th>Item Name</th>
                <th>Total Quantity</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($orders as $order): ?>
                <tr>
                    <td><?= htmlspecialchars($order['section_name'] ?? '') ?></td>
                    <td><?= htmlspecialchars($order['name'] ?? '') ?></td>
                    <td><?= htmlspecialchars($order['total_quantity'] ?? '') ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
    <p>No data found for the monthly report.</p>
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
