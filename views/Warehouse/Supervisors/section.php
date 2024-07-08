<form action="/warehouse/supervisors/items">
    <label for="section">Select Section:</label>
        <select name="section" id="section">
            <?php foreach ($sections as $section): ?>
                <option value="<?= htmlspecialchars($section['id']) ?>"><?= htmlspecialchars($section['name']) ?></option>
            <?php endforeach; ?>
        </select>

    <button>Submit</button>
</form>

<form action="/warehouse/supervisors/dashboard">
    <button>Go Back</button>
</form>