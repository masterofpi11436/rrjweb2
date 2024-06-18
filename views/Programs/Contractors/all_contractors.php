<?php if (isset($_SESSION['role_id']) && $_SESSION['role_id'] == 5 && $_SERVER["REQUEST_URI"] !== "/programs/dashboard?" && $_SERVER["REQUEST_URI"] !== "/programs/dashboard"): // Check if the user is an administrator and not on the dashboard ?>
    <div class="admin-back-button-container">
        <form action="/programs/dashboard">
            <button>Back to Dashboard</button>
        </form>
    </div>
<?php endif; ?>

<form action="/programs/contractors/add">
    <button>Add New Contractor</button>
</form>

<form method="get" action="/programs/contractors/all">
    <input type="text" name="search" placeholder="Search Contractor" class="search-input" value="<?= htmlspecialchars($_GET['search'] ?? '') ?>">
    <button type="submit">Search</button>
</form>

<!-- Display the list of tablets -->
<?php if (!empty($contractors)): ?>
    <table border="1" cellpadding="10" cellspacing="0" style="width:100%; margin-top:20px; border-collapse:collapse;">
        <thead>
            <tr>
                <th>Last Name</th>
                <th>First Name</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($contractors as $contractor): ?>
                <tr>
                    <td><?= htmlspecialchars($contractor['last_name'] ?? '') ?></td>
                    <td><?= htmlspecialchars($contractor['first_name'] ?? '') ?></td>
                    <td>
                        <a href="/programs/contractors/one/<?= htmlspecialchars($contractor['id']) ?>">View</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
    <p>No Contractor Found.</p>
<?php endif; ?>