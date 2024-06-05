<form method="get" action="/phones/reportall">
    <input type="text" name="search" placeholder="Search by Name, Department, or Extension" value="<?= htmlspecialchars($_GET['search'] ?? '') ?>">
    <button type="submit">Search</button>
</form>

<!-- Display the list of tablets -->
<?php if (!empty($phones)): ?>
    <table border="1" cellpadding="10" cellspacing="0" style="width:100%; margin-top:20px; border-collapse:collapse;">
        <thead>
            <tr>
                <th>Name</th>
                <th>Title</th>
                <th>Section</th>
                <th>Extendion</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($phones as $phone): ?>
                <tr>
                    <td><?= htmlspecialchars($phone['name'] ?? '') ?></td>
                    <td><?= htmlspecialchars($phone['title'] ?? '') ?></td>
                    <td><?= htmlspecialchars($phone['section'] ?? '') ?></td>
                    <td><?= htmlspecialchars($phone['extension'] ?? '') ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
    <p>No Extension Found.</p>
<?php endif; ?>
