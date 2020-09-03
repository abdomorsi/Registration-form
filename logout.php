<?php


if (isset($_POST['signout'])){
    session_destroy();
}
if (isset($_SESSION["logedUserNmae"])){
    unset($_SESSION["logedUserNmae"]);
}
if (isset($_SESSION['errors'])){
    unset($_SESSION["errors"]);
}
header("location: upForm.php");

?>