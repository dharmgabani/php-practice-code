<?php

include_once("../conn.php");
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
    <div class="container mt-5">
        <a href="./insert.php">Insert new record</a>
        <table class="table table-striped">
            <tr>
                <td>id</td>
                <td>ename</td>
                <td>age</td>
                <td>dept</td>
                <td>sal</td>
                <td>action</td>
            </tr>
            <?php
            $query = "select * from emp";
            $exe = mysqli_query($conn, $query);
            if(mysqli_num_rows($exe)>0){
                while($record=mysqli_fetch_assoc($exe)){ ?>
                    <tr>
                        <td><?php echo $record['id']; ?></td>
                        <td><?php echo $record['ename']; ?></td>
                        <td><?php echo $record['age']; ?></td>
                        <td><?php echo $record['dept']; ?></td>
                        <td><?php echo $record['sal']; ?></td>
                        <td>
                            <a href="./update.php?id=<?php echo $record['id']; ?>" class="btn btn-outline-success">Edit</a>
                            <a href="./delete.php?id=<?php echo $record['id']; ?>" class="btn btn-outline-danger">Delete</a>
                        </td>
                    </tr>
                <?php }
            }
            ?>
        </table>
    </div>
</body>

</html>