<form action="/warehouse/items/all">
    <button>Home</button>
</form>

<form action="/warehouse/items/edit/<?= htmlspecialchars($item['id']) ?>">
    <button>Edit Item</button>
</form>

<table>
    <tr>
        <th>Item Name</th>
        <td><?= htmlspecialchars($item["name"] ?? '') ?></td>
    </tr>
    <tr>
        <th>Type</th>
        <td><?= htmlspecialchars($item["item_type_name"] ?? '') ?></td>
    </tr>
    <tr>
        <th>Image</th>
        <td><?= htmlspecialchars($item["image"] ?? '') ?></td>
    </tr>
    <tr>
        <th>Quantity</th>
        <td><?= htmlspecialchars($item["quantity"] ?? '') ?></td>
    </tr>
</table>