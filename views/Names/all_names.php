<form method="GET" action="/names/viewAll">
    <input type="text" name="search" class="search-input" placeholder="Search by name..." autofocus>
    <button type="submit">Search</button>
</form>

<table>
    <thead>
        <tr>
            <th>Inmate Number</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Source</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($names as $name): ?>
            <tr>
                <td><?php echo htmlspecialchars($name['inmate_number']); ?></td>
                <td><?php echo htmlspecialchars($name['first_name']); ?></td>
                <td><?php echo htmlspecialchars($name['last_name']); ?></td>
                <td><?php echo htmlspecialchars($name['source']); ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>