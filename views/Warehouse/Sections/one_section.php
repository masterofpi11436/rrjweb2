<form action="/warehouse/sections/all">
    <button>Home</button>
</form>

<form action="/warehouse/sections/edit/<?= htmlspecialchars($section['id']) ?>">
    <button>Edit Section</button>
</form>

<table>
    <tr>
        <th>Section Name</th>
        <td><?= htmlspecialchars($section["name"] ?? '') ?></td>
    </tr>
</table>