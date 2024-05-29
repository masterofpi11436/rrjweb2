
<label for="name">Product Name:</label>
<input type="text" id="name" name="name" value="<?php echo $product["name"] ?? ""; ?>">

<?php if (isset($errorMessage["name"])): ?>
    <p><?= $errorMessage["name"] ?></p>
<?php endif; ?>

<label for="description">Item Description:</label>
<textarea name="description" id="description"><?php echo $product["description"] ?? ""; ?></textarea>

<?php if (isset($errorMessage["description"])): ?>
    <p><?= $errorMessage["description"] ?></p>
<?php endif; ?>

<button>Save</button>