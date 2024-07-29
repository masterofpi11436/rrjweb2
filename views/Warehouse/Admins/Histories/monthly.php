<div>
    <?php
    // Get the previous URL from the HTTP referer
    $previousUrl = $_SERVER['HTTP_REFERER'] ?? '/login';
    ?>
    <form action="<?= htmlspecialchars($previousUrl) ?>">
        <button>Go Back</button>
    </form>
</div>

<form method="get" action="/warehouse/managers/history/monthly">
    <label for="section">Select Section:</label>
    <select name="section_id" id="section">
        <option value="">All Sections</option>
        <?php foreach ($sections as $section): ?>
            <option value="<?= htmlspecialchars($section['id']) ?>" <?= isset($section_id) && $section_id == $section['id'] ? 'selected' : '' ?>><?= htmlspecialchars($section['name']) ?></option>
        <?php endforeach; ?>
    </select>
    
    <label for="month">Select Month:</label>
    <select name="month" id="month">
        <?php foreach ($months as $month): ?>
            <option value="<?= htmlspecialchars($month) ?>" <?= isset($selected_month) && $selected_month == $month ? 'selected' : '' ?>><?= htmlspecialchars(date('F Y', strtotime($month))) ?></option>
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
    <p>No requests found for <?= htmlspecialchars($selected_section_name) ?> in the month of <?= htmlspecialchars(date('F Y', strtotime($selected_month))) ?>.</p>
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
