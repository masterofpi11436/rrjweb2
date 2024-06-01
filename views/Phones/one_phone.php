<form action="/phones/all">
    <button>Home</button>
</form>

<form action="/phones/edit/<?= htmlspecialchars($phone['id']) ?>">
    <button>Edit Phone</button>
</form>

<table>
    <tr>
        <th>Name</th>
        <td><?= htmlspecialchars($phone["name"]) ?></td>
    </tr>
    <tr>
        <th>Title</th>
        <td><?= htmlspecialchars($phone["title"]) ?></td>
    </tr>
    <tr>
        <th>Section</th>
        <td><?= htmlspecialchars($phone["section"]) ?></td>
    </tr>
    <tr>
        <th>Extension</th>
        <td><?= htmlspecialchars($phone["extension"]) ?></td>
    </tr>
</table>