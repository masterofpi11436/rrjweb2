<form action="/mailrooms/all">
    <button>Home</button>
</form>

<form action="/mailrooms/edit/<?= htmlspecialchars($name['id']) ?>">
    <button>Edit Name</button>
</form>

<table>
    <tr>
        <th>Inmate Number</th>
        <td><?= htmlspecialchars($name["inmate_number"] ?? '') ?></td>
    </tr>
    <tr>
        <th>First Name</th>
        <td><?= htmlspecialchars($name["last_name"] ?? '') ?></td>
    </tr>
    <tr>
        <th>Last Name</th>
        <td><?= htmlspecialchars($name["last_name"] ?? '') ?></td>
    </tr>
</table>