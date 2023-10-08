<?php

include_once("../conn.php");
session_start();

$id=$_GET['id'];
$query="select * from emp where id='$id'";
$a=mysqli_query($conn,$query);
$record=mysqli_fetch_assoc($a);

// var_dump($record);
// exit;

$ename=$record['ename'];
$age=$record['age'];
$dept=$record['dept'];
$sal=$record['sal'];
$errors=[];

if(isset($_POST['submit'])){
    $ename=$_POST['ename'];
    $age=$_POST['age'];
    $dept=$_POST['dept'];
    $sal=$_POST['sal'];

    $query="update  emp set ename='$ename',age='$age',dept='$dept',sal='$sal' where id='$id'";
    if(mysqli_query($conn,$query)==true){
        header('location:display.php');
    }
}

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
                <label for="ename">Empname:</label>
                <input type="text" name="ename" class="form-control" required value="<?php echo $ename; ?>">
            </div>
            <div class="form-group">
                <label for="age">Age:</label>
                <input type="number" name="age" class="form-control" required value="<?php echo $age; ?>">
            </div>
            <div class="form-group">
                <label for="dept">Dept:</label>
                <input type="text" name="dept" class="form-control" required value="<?php echo $dept; ?>">
            </div>
            <div class="form-group">
                <label for="sal">Salary:</label>
                <input type="number" name="sal" class="form-control" required value="<?php echo $sal; ?>">
            </div>
            <div class="form-group">
                <button class="btn btn-outline-primary" name="submit" type="submit">Submit</button>
            </div>
        </form>
    </div>
</body>

</html>