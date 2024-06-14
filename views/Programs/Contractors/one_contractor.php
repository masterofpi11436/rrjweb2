<form action="/programs/contractors/all">
    <button>Home</button>
</form>

<form action="/programs/contractors/edit/<?= htmlspecialchars($contractor['id']) ?>">
    <button>Edit Contractor</button>
</form>

<table>
    <tr>
        <th>last_name</th>
        <td><?= htmlspecialchars($contractor["last_name"] ?? '') ?></td>
    </tr>
    <tr>
        <th>first_name</th>
        <td><?= htmlspecialchars($contractor["first_name"] ?? '') ?></td>
    </tr>
</table>