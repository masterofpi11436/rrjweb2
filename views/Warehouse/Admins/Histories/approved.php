<form action="/warehouse/managers/history/dashboard">
    <button>Back</button>
</form>

<form action="/warehouse/managers/history/approved" method="GET">
    <label for="week">Week:</label>
    <select name="week" id="week">
        <option value="">All Weeks</option>
        <?php 
        $currentWeek = (int)date('W'); // Get the current calendar week number
        $currentYear = (int)date('Y'); // Get the current year

        // Generate options for the current week and the previous 12 weeks
        for ($i = 0; $i < 12; $i++) {
            $weekTimestamp = strtotime("-$i week");
            $week = (int)date('W', $weekTimestamp); // Week number
            $year = (int)date('Y', $weekTimestamp); // Corresponding year

            $displayText = "Week $week of $year";
            ?>
            <option value="<?= $week ?>-<?= $year ?>" <?= isset($_GET['week']) && $_GET['week'] == "$week-$year" ? 'selected' : '' ?>>
                <?= $displayText ?>
            </option>
        <?php } ?>
    </select>

    <label for="section">Section:</label>
    <select name="section" id="section">
        <option value="">All Sections</option>
        <?php foreach ($sections as $section): ?>
            <option value="<?= $section['id'] ?>" <?= isset($_GET['section']) && $_GET['section'] == $section['id'] ? 'selected' : '' ?>>
                <?= htmlspecialchars($section['name']) ?>
            </option>
        <?php endforeach; ?>
    </select>

    <button>Filter</button>
</form>

<table>
    <thead>
        <tr>
            <th>User Name</th>
            <th>Supervisor Name</th>
            <th>Section</th>
            <th>Status</th>
            <th>Created At</th>
            <th>View</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($orders as $order): ?>
            <tr>
                <td><?= htmlspecialchars($order['user_first_name'] . ' ' . $order['user_last_name']) ?></td>
                <td><?= htmlspecialchars($order['supervisor_first_name'] . ' ' . $order['supervisor_last_name']) ?></td>
                <td><?= htmlspecialchars($order['section_name']) ?></td>
                <td><?= htmlspecialchars($order['status']) ?></td>
                <td><?= htmlspecialchars($order['approved_denied_at']) ?></td>
                <td>
                    <a href="/warehouse/managers/history/approved/<?= htmlspecialchars($order['id']); ?>">View</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
