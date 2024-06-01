<div class="form-container">
    <div>
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="<?= isset($phone) ? htmlspecialchars($phone['name'] ?? '') : '' ?>">
    </div>

    <div>
        <label for="title">Title:</label>
        <input type="text" id="title" name="title" value="<?= isset($phone) ? htmlspecialchars($phone['title'] ?? '') : '' ?>">
    </div>

    <div>
        <label for="section">Section:</label>
        <input type="text" id="section" name="section" value="<?= isset($phone) ? htmlspecialchars($phone['section'] ?? '') : '' ?>">
    </div>

    <div>
        <label for="extension">Number:</label>
        <input type="text" id="extension" name="extension" value="<?= isset($phone) ? htmlspecialchars($phone['extension'] ?? '') : '' ?>">
    </div>

    <div>
        <button type="submit">Save</button>
    </div>
</div>
