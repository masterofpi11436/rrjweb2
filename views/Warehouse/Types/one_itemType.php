<form action="/warehouse/itemtype/all">
    <button>Home</button>
</form>

<form action="/warehouse/itemtype/edit/<?= htmlspecialchars($itemType['id']) ?>">
    <button>Edit Item Type</button>
</form>

<table>
    <tr>
        <th>Item Type</th>
        <td><?= htmlspecialchars($itemType["type"] ?? '') ?></td>
    </tr>
</table>