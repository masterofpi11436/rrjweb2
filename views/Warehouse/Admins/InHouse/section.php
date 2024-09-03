<form action="/warehouse/managers/inhouse/create" method="post">

    <label for="supervisor">What supervisor is to recieve the request?</label>
    <select name="supervisor" id="supervisor">
        <?php foreach ($supervisors as $supervisor): ?>
            <option value="<?= htmlspecialchars($supervisor['id']) ?>"><?= htmlspecialchars($supervisor['last_name']) ?>, <?= htmlspecialchars($supervisor['first_name']) ?></option>
        <?php endforeach; ?>
    </select>
    
    <label for="section">Select Section:</label>
    <select name="section" id="section">
        <?php foreach ($sections as $section): ?>
            <option value="<?= htmlspecialchars($section['id']) ?>"><?= htmlspecialchars($section['name']) ?></option>
        <?php endforeach; ?>
    </select>

    <button>Submit</button>
</form>
