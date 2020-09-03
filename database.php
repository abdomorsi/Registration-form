<?php

$server = "localhost";
$userName = "root";
$password = "";
$dbname = "regform1";
$connecting = new mysqli($server,$userName,$password,$dbname);

if (!$connecting){
    die("ERROR: failed to connect. ".mysqli_connect_error());
}

$query = "CREATE TABLE UsersData( id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
Name VARCHAR(35) NOT NULL, 
Email VARCHAR(50) NOT NULL UNIQUE,
 Password VARCHAR (50) NOT NULL,
 PhoneNumber VARCHAR (12) NOT NULL,
 Address TEXT)";


if ($connecting->query($query)){
    echo "Table created successfully";
} else {
    echo  "something wrong in table creation" . $connecting->error;
}

$connecting->close();


?>