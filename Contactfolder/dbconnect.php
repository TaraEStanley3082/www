<?php

$db_host="localhost";
$db_username="root";
$db_password="";
$db_name="contact_form";

$db = new PDO('mysql:host=localhost;dbname=contact_form;port=3306', "root", "");
//To check the connection

if(mysqli_connect_error())
{
    echo "Failed to connect to MYSQL:" .mysqli_connect_error();
}

//echo "connection successful";

?>