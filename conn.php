<?php

$conn=mysqli_connect("localhost","root","","loginregistration") or die("can not connect");
if(!$conn){
    ?>
    <script>alert("connection not succefull")</script>
    <?php
}
else{
    ?>
    <script></script>
    <?php
}
