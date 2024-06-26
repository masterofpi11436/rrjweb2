<form action="/warehouse/dashboard">
    <button>Back to Dashboard</button>
</form>

<form action="/warehouse/sections/add">
    <button>Add New Section</button>
</form>

<form method="get" action="/warehouse/sections/all">
    <input type="text" name="search" placeholder="Search by Name or Type" class="search-input" value="<?= htmlspecialchars($_GET['search'] ?? '') ?>">
    <button type="submit">Search</button>
</form>

<!-- Display the list of extensions -->
<?php if (!empty($sections)): ?>
    <table border="1" cellpadding="10" cellspacing="0" style="width:100%; margin-top:20px; border-collapse:collapse;">
        <thead>
            <tr>
                <?php
                    $search = htmlspecialchars($_GET['search'] ?? '');
                    $currentOrder = $_GET['order'] ?? 'asc';
                    $newOrder = ($currentOrder === 'asc') ? 'desc' : 'asc';
                ?>
                <th>
                    <a href="?search=<?= $search ?>&sort=name&order=<?= $newOrder ?>">Name</a>
                </th>
                <th>Edit</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($sections as $section): ?>
                <tr>
                    <td><?= htmlspecialchars($section['name'] ?? '') ?></td>
                    <td>
                        <a href="/warehouse/sections/one/<?= htmlspecialchars($section['id']) ?>">View</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
    <p>No Section Found.</p>
<?php endif; ?>