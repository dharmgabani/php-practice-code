<?php

include_once("../conn.php");

$id=$_GET['id'];

// echo "<pre>";
// var_dump($id);
// echo "</pre>";
// exit;

$str="delete from emp where id='$id'";
$exe=mysqli_query($conn,$str);

header('Location:display.php');

?>