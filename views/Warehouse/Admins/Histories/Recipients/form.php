<div class="form-container">

    <div>
        <label for="first_name">First Name:</label>
        <input type="text" id="first_name" name="first_name" value="<?= isset($recipient) ? htmlspecialchars($recipient['first_name'] ?? '') : '' ?>">
    </div>

    <?php if (isset($errorMessage["first_name"])): ?>
        <p><?= $errorMessage["first_name"] ?></p>
    <?php endif; ?>

    <div>
        <label for="last_name">Last Name:</label>
        <input type="text" id="last_name" name="last_name" value="<?= isset($recipient) ? htmlspecialchars($recipient['last_name'] ?? '') : '' ?>">
    </div>

    <?php if (isset($errorMessage["last_name"])): ?>
        <p><?= $errorMessage["last_name"] ?></p>
    <?php endif; ?>

    <div>
        <label for="email">Email:</label>
        <input type="text" id="email" name="email" value="<?= isset($recipient) ? htmlspecialchars($recipient['email'] ?? '') : '' ?>">
    </div>

    <?php if (isset($errorMessage["email"])): ?>
        <p><?= $errorMessage["email"] ?></p>
    <?php endif; ?>

    <div>
        <button type="submit">Save</button>
    </div>
</div>
