<form action="/warehouse/admins/all">
    <button>Home</button>
</form>

<form action="/warehouse/admins/edit/<?= htmlspecialchars($admin['id']) ?>">
    <button>Edit User</button>
</form>

<table>
    <tr>
        <th>Last Name</th>
        <td><?= htmlspecialchars($admin["last_name"] ?? '') ?></td>
    </tr>
    <tr>
        <th>First Name</th>
        <td><?= htmlspecialchars($admin["first_name"] ?? '') ?></td>
    </tr>
</table>