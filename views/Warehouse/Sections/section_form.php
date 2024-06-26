<div class="form-container">

    <div>
        <label for="name">Section Name:</label>
        <input type="text" id="name" name="name" value="<?= isset($section) ? htmlspecialchars($section['name'] ?? '') : '' ?>">
    </div>

    <div>
        <button type="submit">Save</button>
    </div>
</div>
