<form action="/contractors/all">
    <button>Home</button>
</form>

<form action="/contractors/edit/<?= htmlspecialchars($contractor['id']) ?>">
    <button>Edit Phone</button>
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