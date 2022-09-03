<?php
include("connect.php");


$id=$_GET['id'];

$dlt_query = "DELETE  FROM emp WHERE id = '$id'";
mysqli_query($con,$dlt_query) or die("error:" . mysqli_error($con));
header('location:crud_Show.php');


?>
