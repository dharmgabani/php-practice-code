<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
</head>

<body>
    <a class="btn btn-outline-primary" href="./register.php">register</a>
    <?php
    if (isset($_SESSION['uname']) && !empty($_SESSION['uname'])) : ?>
        <a class="btn btn-outline-primary" href="./logout.php">logout</a>
    <?php else : ?>
        <a class="btn btn-outline-primary" href="./login.php">login</a>
    <?php endif; ?>

    <div class="container mt-5">
        <?php if(isset($_SESSION['uname']) && !empty($_SESSION['uname'])): ?>
            <h1>Welcome <?php echo $_SESSION['uname']; ?></h1>
        <?php endif; ?>
    </div>
</body>

</html>
