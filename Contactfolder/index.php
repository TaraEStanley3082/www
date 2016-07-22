<?php

    include("dbconnect.php");
    note=$_REQUEST['note'];

?>

<html>
<head>

</head>
<body>

    //Lets you know the info was submitted
    
<?PHP if($note=='success')
{
    echo "<h1>Form submitted successfully</h1>"
}
    
?>
    
    
<form action="user_process.php" method="post" name="user">

    Name: <input type="text" name="name" value=""><br>
    City: <input type="text" name="city" value=""><br>
    Email: <input type="text" name="email" value=""><br>
    Message: <textarea name="message"></textarea>
    <input type="submit" value="Submit">

</form>



</body>
</html>