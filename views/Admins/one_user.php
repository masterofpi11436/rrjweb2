<form action="/admins/all">
    <button>Home</button>
</form>

<form action="/admins/edit/<?= htmlspecialchars($user['id']) ?>">
    <button>Edit User</button>
</form>

<table>
    <tr>
        <th>Last Name</th>
        <td><?= htmlspecialchars($user["last_name"] ?? '') ?></td>
    </tr>
    <tr>
        <th>First Name</th>
        <td><?= htmlspecialchars($user["first_name"] ?? '') ?></td>
    </tr>
    <tr>
        <th>Email</th>
        <td><?= htmlspecialchars($user["email"] ?? '') ?></td>
    </tr>
</table>