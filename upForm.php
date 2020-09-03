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
<html>
<head>
    <title> Sign Up </title>

</head>

<body>

<h1> Registration: </h1>

<form name="upform" method="post" action="index.php" onsubmit="return validateSignUp()">
    <label for="name"> Name: </label> <br>
    <input type="text" name="name" required minlength="4" maxlength="49">
    <br> <br>
    <label for="email"> Email: </label> <br>
    <input type="email" name="email" required minlength="12">
    <br> <br>
    <label for="password"> Password: </label> <br>
    <input type="password" name="password" required minlength="8">
    <br><br>
    <label for="confirmPassword"> Confirm Password: </label> <br>
    <input type="password" name="confirmPassword" required minlength="8">
    <br><br>
    <label for="phoneNumber"> Phone Number: </label> <br>
    <input type="text" name="phoneNumber" required minlength="11">
    <br><br>
    <label for="address"> Address: </label> <br>
    <input type="text" name="address" >
    <br>
    <br>
    <input type="submit" name="signup" value="SIGN UP"> <br>
    <p> Already have an account <a href="inForm.php"> Sign In </a> </p>
</form>

</body>

</html>
