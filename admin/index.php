<?php

session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <title>Document</title>
</head>

<body>
    <?php
    if ($_SESSION['admin']) : ?>
        <a class="btn btn-outline-primary" href="../logout.php">logout</a>
    <?php endif; ?>

    <div class="container mt-5">
        <?php if ($_SESSION['admin']) : ?>
            <h1>Welcome <?php echo $_SESSION['admin']; ?></h1>
        <?php endif; ?>
    </div>

    <a class="btn btn-outline-primary" href="./insert.php">Insert</a>

</body>

</html>