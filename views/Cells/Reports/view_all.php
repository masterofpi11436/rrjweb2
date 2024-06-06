<form method="get" action="/cells/reportall">
    <input type="text" name="search" placeholder="Search by Name, Department, or Extension" class="search-input" value="<?= htmlspecialchars($_GET['search'] ?? '') ?>">
    <button type="submit">Search</button>
</form>

<!-- Display the list of tablets -->
<?php if (!empty($cells)): ?>
    <table border="1" cellpadding="10" cellspacing="0" style="width:100%; margin-top:20px; border-collapse:collapse;">
        <thead>
            <tr>
                <th>Name</th>
                <th>Job Description</th>
                <th>PID</th>
                <th>Phone</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($cells as $cell): ?>
                <tr>
                    <td><?= htmlspecialchars($cell['name'] ?? '') ?></td>
                    <td><?= htmlspecialchars($cell['description'] ?? '') ?></td>
                    <td><?= htmlspecialchars($cell['pid'] ?? '') ?></td>
                    <td><?= htmlspecialchars($cell['phone'] ?? '') ?></td>
                    <td><?= htmlspecialchars($cell['email'] ?? '') ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
    <p>No Extension Found.</p>
<?php endif; ?>
