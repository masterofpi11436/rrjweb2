<form action="/programs/admins/all">
    <button>Home</button>
</form>

<form action="/programs/admins/edit/<?= htmlspecialchars($contractor['id']) ?>">
    <button>Edit Contractor</button>
</form>

<table>
    <tr>
        <th>Last Name</th>
        <td><?= htmlspecialchars($contractor["last_name"] ?? '') ?></td>
    </tr>
    <tr>
        <th>First Name</th>
        <td><?= htmlspecialchars($contractor["first_name"] ?? '') ?></td>
    </tr>
</table>