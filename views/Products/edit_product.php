<a href="/products/viewOne/<?= $product["id"] ?>">Cancel</a>

<a href="/products/deleteProduct/<?= $product["id"] ?>">Delete Product</a>

<form method="post" action="/products/updateProduct/<?= $product["id"] ?>">

    <?php require "form.php"; ?>

</form>
