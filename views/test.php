<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="<?php echo htmlspecialchars($_SERVER['REQUEST_URI']) ?>" method="get">
        <input type="text" name="test">
        <button type="submit">Test</button>
    </form>

    <?php
    if (isset($_GET["test"])) {
        echo $_GET["test"];
    }
    ?>
</body>
</html>