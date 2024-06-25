<div class="form-container">
    <div>
        <label for="name">Item Name:</label>
        <input type="text" id="name" name="name" value="<?= isset($item) ? htmlspecialchars($item['name'] ?? '') : '' ?>">
    </div>

    <div>
        <label for="item_type">Item Type:</label>
        <select id="item_type" name="item_type">
            <?php foreach ($itemTypes as $type): ?>
                <option value="<?= htmlspecialchars($type['id']) ?>" <?= isset($item) && $item['item_type'] == $type['id'] ? 'selected' : '' ?>>
                    <?= htmlspecialchars($type['type']) ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <div>
        <label for="image">Image:</label>
        <input type="file" id="image" name="image">
    </div>

    <div>
        <button type="submit">Save</button>
    </div>
</div>
