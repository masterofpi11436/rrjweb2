<form action="/warehouse/managers/history/dashboard">
    <button>Go Back</button>
</form>

<form action="/warehouse/managers/history/monthly-list">
    <button>Recipient List</button>
</form>

<?php if (!empty($_SESSION['success_message'])): ?>
    <div class="alert alert-success">
        <?php echo $_SESSION['success_message']; ?>
        <?php unset($_SESSION['success_message']); ?>
    </div>
<?php elseif (!empty($_SESSION['error_message'])): ?>
    <div class="alert alert-danger">
        <p>Email Failed to send!</p>
        <?php unset($_SESSION['error_message']); ?>
    </div>
<?php endif; ?>

<form action="/warehouse/managers/history/monthly-report2">
    <button>Send Monthly Report</button>
</form>

<form action="/warehouse/managers/history/monthly-report-print">
    <button>Download Monthly Report</button>
</form>

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

<?php if (!empty($itemNames) && !empty($sectionNames)): ?>
<table border="1" cellpadding="10" cellspacing="0" style="width:100%; border-collapse:collapse;">
    <thead>
        <tr>
            <th style="width: 150px; text-align: center; height: auto;">Item Name</th>
            <?php foreach ($sectionNames as $sectionId => $sectionName): ?>
                <th style="width: 120px; text-align: center; height: auto;"><?= htmlspecialchars($sectionName) ?></th>
            <?php endforeach; ?>
            <th style="width: 100px; text-align: center; height: auto;">Total</th> <!-- Add the Total column header with fixed width -->
        </tr>
    </thead>
    <tbody>
        <?php foreach ($itemNames as $itemId => $itemName): ?>
            <tr style="height: 40px;"> <!-- Define row height -->
                <td style="width: 200px; text-align: center; height: auto;"><?= htmlspecialchars($itemName) ?></td>
                <?php foreach ($sectionNames as $sectionId => $sectionName): ?>
                    <td style="width: 150px; text-align: center; height: auto;"><?= isset($tableData[$itemId][$sectionId]) ? htmlspecialchars($tableData[$itemId][$sectionId]) : '' ?></td>
                <?php endforeach; ?>
                <td style="width: 150px; text-align: center; height: auto;"><?= htmlspecialchars($itemTotals[$itemId] ?? '') ?></td> <!-- Item total -->
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php else: ?>
    <p>No requests found for <?= htmlspecialchars($selected_section_name) ?> in the month of <?= htmlspecialchars(date('F Y', strtotime($selected_month))) ?>.</p>
<?php endif; ?>