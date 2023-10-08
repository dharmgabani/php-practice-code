<?php

include_once("./conn.php");
session_start();

$email = '';
$pwd = '';
$errors = [];

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $pwd = $_POST['pwd'];
    $e = '';
    $p = '';

    $esearch = "select * from user where email='$email'";
    $equery = mysqli_query($conn, $esearch);
    // $ecount = mysqli_num_rows($equery);
    if (mysqli_num_rows($equery) == 1) {
        $record = mysqli_fetch_assoc($equery);
        $e=$record['email'];
        $p=$record['pwd'];

        // var_dump($p);
        // exit;

        if($pwd==$p){
            $status=$record['status'];
            if($status==="0"){
                $_SESSION['uname']=$record['uname'];
                header("location:index.php");
            }
            else{
                $_SESSION['admin']=$record['uname'];
                header("location:admin/index.php");
            }
        }
        else{
            $errors[]="password is wrong";
        }
    }
    else{
        $errors[]="Email is not registered";
    }
}

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
    <div class="container mt-5">
        <?php
        if ($errors) { ?>
            <div class="alert alert-danger">
                <p><?php echo $errors[0]; ?></p>
            </div>
        <?php }

        ?>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" class="form-control" required value="<?php echo $email; ?>">
            </div>
            <div class="form-group">
                <label for="pwd">Password:</label>
                <input type="password" name="pwd" class="form-control" required value="<?php echo $pwd; ?>">
            </div>
            <div class="form-group">
                <button class="btn btn-outline-primary" name="submit" type="submit">Submit</button>
            </div>
        </form>
        <a href="./register.php">Click here for Registration</a>
    </div>
</body>

</html>