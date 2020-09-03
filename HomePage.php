<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home Page</title>
    <p>
        Hello <?php echo $_SESSION["logedUserNmae"]; ?>
        please log out <form action="logout.php"> <input type="submit" name ="signout" value="Sign Out"> </form>
    </p>

</head>
<body>

</body>
</html>