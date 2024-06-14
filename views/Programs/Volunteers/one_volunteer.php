<form action="/programs/volunteers/all">
    <button>Home</button>
</form>

<form action="/programs/volunteers/edit/<?= htmlspecialchars($volunteer['id']) ?>">
    <button>Edit Volunteer</button>
</form>

<table>
    <tr>
        <th>Last Name</th>
        <td><?= htmlspecialchars($volunteer["last_name"] ?? '') ?></td>
    </tr>
    <tr>
        <th>First Name</th>
        <td><?= htmlspecialchars($volunteer["first_name"] ?? '') ?></td>
    </tr>
</table>