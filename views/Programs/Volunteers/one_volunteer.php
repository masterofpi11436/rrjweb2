<form action="/volunteers/all">
    <button>Home</button>
</form>

<form action="/volunteers/edit/<?= htmlspecialchars($volunteer['id']) ?>">
    <button>Edit Phone</button>
</form>

<table>
    <tr>
        <th>Last Name</th>
        <td><?= htmlspecialchars($volunteer["last_name"] ?? '') ?></td>
    </tr>
    <tr>
        <th>First Name</th>
        <td><?= htmlspecialchars($volunteer["last_name"] ?? '') ?></td>
    </tr>
</table>