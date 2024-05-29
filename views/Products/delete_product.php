<a href="/products/vieone/<?= $product["id"] ?>">Cancel</a>

<form method="post" action="/product/destroy/<?= $product["id"] ?>">

    <h2>Are you sure you want to delete this product?</h2>

    <button>Confirm</button>

</form>
