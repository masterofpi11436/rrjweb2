<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
    <link rel="stylesheet" href="/public/css/styles.css">
    <script src="/public/JavaScript/script.js"></script>
    <script src="/public/JavaScript/verify.js"></script>
    <title><?= $title ?></title>
</head>
<body>

<header>
    <div>
        <h1><?= $heading ?></h1>
    </div>
    <?php if (isset($_SESSION['user_id'])): ?>
        <div class="logout-button-container">
            <form action="/logout" method="post" style="display:inline;">
                <button type="submit">Logout</button>
            </form>
        </div>
    <?php endif; ?>
</header>
