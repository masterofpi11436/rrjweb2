<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
    <title>Page not found</title>
</head>
<body>
    <h1>ERROR 404</h1>
    <h1>The page you are looking for does not exist.</h1>
    <a href="/login">Login Page</a><br><br>
    <div>
        <?php
        // Get the previous URL from the HTTP referer
        $previousUrl = $_SERVER['HTTP_REFERER'] ?? '/login';
        ?>
        <form action="<?= htmlspecialchars($previousUrl) ?>">
            <button>Go Back</button>
        </form>
    </div>
</body>
</html>
