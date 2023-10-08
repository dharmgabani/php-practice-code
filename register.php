<?php

include_once("./conn.php");

$uname = '';
$mobile = '';
$email = '';
$pwd = '';
$cpwd = '';
$errors=[];

if (isset($_POST['submit'])) {
    $uname = $_POST['uname'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $pwd = $_POST['pwd'];
    $cpwd = $_POST['cpwd'];

    // var_dump($cpwd);
    // exit;

    $equery="select * from user where email='$email'";
    $ecount=mysqli_query($conn,$equery);
    if(mysqli_num_rows($ecount)>0){
        $errors[]="email already exits";
    }
    else{
        if($pwd===$cpwd){
            $iquery="insert into user(uname,mobile,email,pwd,status) values('$uname','$mobile','$email','$pwd',0)";
            $iquery=mysqli_query($conn,$iquery);

            if($iquery==true){
                header('location:login.php');
            }
        }
        else{
            $errors[]="password and confirm password must be same";
        }
    }

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <?php
        if($errors){ ?>
            <div class="alert alert-danger">
                <p><?php echo $errors[0]; ?></p>
            </div>
        <?php }
        
        ?>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="user">Username:</label>
                <input type="text" name="uname" class="form-control" required value="<?php echo $uname; ?>">
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" class="form-control" required value="<?php echo $email; ?>">
            </div>
            <div class="form-group">
                <label for="mobile">Number:</label>
                <input type="number" name="mobile" class="form-control" required value="<?php echo $mobile; ?>">
            </div>
            <div class="form-group">
                <label for="pwd">Password:</label>
                <input type="password" name="pwd" class="form-control" required value="<?php echo $pwd; ?>">
            </div>
            <div class="form-group">
                <label for="cpwd">Confirm password:</label>
                <input type="password" name="cpwd" class="form-control" required value="<?php echo $cpwd; ?>">
            </div>
            <div class="form-group">
                <button class="btn btn-outline-primary" name="submit" type="submit">Submit</button>
            </div>
        </form>
        <a href="./login.php">Click here for login</a>
    </div>
</body>

</html>