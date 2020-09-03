<?php
session_start();
if (isset($_SESSION['errors'])){
    foreach ($_SESSION['errors'] as $msg){
        echo $msg, '<br>';
    }
}
unset($_SESSION['errors']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title> Sign In </title>
</head>

<body>

<h1> Sign In: </h1>
<form name="inform" method="post" action="index.php" >

    <label for="email"> Email: </label> <br>
    <input type="email" name="email" required minlength="12">
    <br>
    <br>
    <label for="password"> Password: </label> <br>
    <input type="password" name="password" required minlength="1">
    <br>
    <br>
    <input type="submit" name="signin" value="SIGN IN"> <br>
    <br>
    <p> create an account <a href="upForm.php"> Register </a> </p>

</form>

</body>



</html>
