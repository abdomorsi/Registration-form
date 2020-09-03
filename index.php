<?php
//require 'database.php';

session_start();

if (isset($_SESSION["logedUserNmae"])){
    unset($_SESSION["logedUserNmae"]);
}
if (isset($_SESSION['errors'])){
    unset($_SESSION["errors"]);
}

include 'upForm.php';
include 'inForm.php';

$server = "localhost";
$serverUserName = "root";
$servePassword = "";
$dbName = "regform1";


$conn = new mysqli($server, $serverUserName, $servePassword, $dbName);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$errorsMsg = array();

if (isset($_POST['signin']) || isset($_POST['signup'])) {
    $userEmail = mysqli_real_escape_string($conn,$_POST['email']);
    $userPassword = mysqli_real_escape_string($conn,$_POST['password']);
    if (empty($userEmail)){
        array_push($errorsMsg,"email is required");
    }
    if (empty($userPassword)){
        array_push($errorsMsg,"password is required");
    }

    if (isset($_POST['signup'])) {
        $userName = mysqli_real_escape_string($conn,$_POST['name']);;
        $userPhoneNumber = mysqli_real_escape_string($conn,$_POST['phoneNumber']);
        $userAddress = mysqli_real_escape_string($conn,$_POST['address']);
        $userConPassword = mysqli_real_escape_string($conn,$_POST['confirmPassword']);

        if (empty($userName)){
            array_push($errorsMsg,"username is required");
        }
        if (empty($userPhoneNumber)){
            array_push($errorsMsg,"phone number is required");
        }
        if ( $userConPassword != $userPassword ){
            array_push($errorsMsg,"these passwords doesn't match");
        }
        $sqlOrder1 = "SELECT * FROM usersdata WHERE Email = '$userEmail' OR PhoneNumber = '$userPhoneNumber'";
        $result = mysqli_query($conn, $sqlOrder1);
        $userInfo = mysqli_fetch_assoc($result);
        if ($userInfo) {
            if ($userInfo['Email']==$userEmail){
                array_push($errorsMsg,"this email already exists");
            }
            if ($userInfo['PhoneNumber']==$userPhoneNumber){
                array_push($errorsMsg,"this phone number already exists");
            }
            if (count($errorsMsg)) {
                $_SESSION['errors'] = $errorsMsg;
                header("location: upForm.php");
            }
        } else {
            $sqlOrder2 = "INSERT INTO usersdata (Name,Email,Password,PhoneNumber,Address) VALUES ('$userName','$userEmail','$userPassword','$userPhoneNumber','$userAddress')";
            mysqli_query($sqlOrder2);
            echo "Registered successfully";
            $_SESSION["logedUserNmae"] = $userName;
            header("location: HomePage.php");
        }
    }

    if (isset($_POST['signin'])) {
        $sqlOrder1 = "SELECT Name, Email, Password, PhoneNumber, Address FROM usersdata WHERE Email = '$userEmail' AND Password='$userPassword'";
        $result = mysqli_query($conn,$sqlOrder1);
        $userInfo = mysqli_fetch_assoc($result);
        if (mysqli_num_rows($result)==1){
            $_SESSION["logedUserNmae"] = $userInfo["Name"];
            echo "loged in";
            header("location: HomePage.php");
        } else {
            array_push($errorsMsg,"something wrong try another password/emaol");
            $_SESSION['errors'] = $errorsMsg;
            header("location: inForm.php");
        }
    }

    $conn->close();
}

?>
