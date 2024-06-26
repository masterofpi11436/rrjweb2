<div class="form-container">

    <div>
        <label for="type">Item Type:</label>
        <input type="text" id="type" name="type" value="<?= isset($itemType) ? htmlspecialchars($itemType['type'] ?? '') : '' ?>">
    </div>

    <div>
        <button type="submit">Save</button>
    </div>
</div>
