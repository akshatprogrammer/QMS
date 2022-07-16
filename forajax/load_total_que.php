<?php
session_start();
include "../connection.php";
$total=0;
$res1 = mysqli_query($link,"select * from questions where category='$_SESSION[category]'");
$total=mysqli_num_rows($res1);
echo $total;
?>