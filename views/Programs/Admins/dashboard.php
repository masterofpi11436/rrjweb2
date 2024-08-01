<h2>Manage Users</h2>
<form action="/programs/admins/all">
    <button>Manage Users</button>
</form>

<h2>Manage Individual Applications</h2>

<form action="/programs/contractors/all">
    <button>Contractors</button>
</form>

<form action="/programs/volunteers/all">
    <button>Volunteers</button>
</form>

<?php if (!is_null($user['warehouse_role'])): ?>
    <h2>Warehouse Supply Request</h2>
    <form action="/admins/switchRole" method="post">
        <button type="submit" name="warehouse_role" value="<?php echo $user['warehouse_role']; ?>">Warehouse Supply Request</button>
    </form>
<?php endif; ?>