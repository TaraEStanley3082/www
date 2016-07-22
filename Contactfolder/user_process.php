<?php

include("dbconnect.php");

$name=$_REQUEST['name'];
$city=$_REQUEST['city'];
$email=$_REQUEST['email'];
$msg=$_REQUEST['message'];

// Insert the data to the table

$query=mysqli_query($db_connect, "INSERT INTO USER (name, city, email, message) VALUES ('$name', '$city', '$email', '$msg')") or die(mysqli_error($db_connect));

mysqli_close($db_connect);

header("location:index.php?note=success");

?>