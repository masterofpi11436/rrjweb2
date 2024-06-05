<div class="form-container">
    <div>
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="<?= isset($cell) ? htmlspecialchars($cell['name'] ?? '') : '' ?>">
    </div>

    <div>
        <label for="description">Job Description:</label>
        <input type="text" id="description" name="description" value="<?= isset($cell) ? htmlspecialchars($cell['description'] ?? '') : '' ?>">
    </div>

    <div>
        <label for="pid">PID Number:</label>
        <input type="text" id="pid" name="pid" value="<?= isset($cell) ? htmlspecialchars($cell['pid'] ?? '') : '' ?>">
    </div>

    <div>
        <label for="phone">Cell Phone Number:</label>
        <input type="text" id="phone" name="phone" value="<?= isset($cell) ? htmlspecialchars($cell['phone'] ?? '') : '' ?>">
    </div>

    <div>
        <label for="email">Email:</label>
        <input type="text" id="email" name="email" value="<?= isset($cell) ? htmlspecialchars($cell['email'] ?? '') : '' ?>">
    </div>

    <div>
        <button type="submit">Save</button>
    </div>
</div>