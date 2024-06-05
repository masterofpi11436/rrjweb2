<form action="/cells/all">
    <button>Home</button>
</form>

<form action="/cells/edit/<?= htmlspecialchars($cell['id']) ?>">
    <button>Edit Contact</button>
</form>

<table>
    <tr>
        <th>Name</th>
        <td><?= htmlspecialchars($cell["name"] ?? '') ?></td>
    </tr>
    <tr>
        <th>Description</th>
    <td><?= htmlspecialchars($cell['description'] ?? '') ?></td>
    </tr>
    <tr>
        <th>PID Number</th>
        <td><?= htmlspecialchars($cell['pid'] ?? '') ?></td>
    </tr>
    <tr>
        <th>Cell Phone Number</th>
        <td><?= htmlspecialchars($cell['phone'] ?? '') ?></td>
    </tr>
    <tr>
        <th>Email</th>
        <td><?= htmlspecialchars($cell['email'] ?? '') ?></td>
    </tr>
</table>