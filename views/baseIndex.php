<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://unpkg.com/htmx.org@1.9.11"></script>
    <title>Home</title>
</head>
<body>
    <h1>Home</h1>
    <button hx-get="<?php echo $_SERVER['HTTP_HOST'] ?>/htmx/test" hx-swap="outerHTML">Click me</button>
</body>
</html>