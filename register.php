<?php
include "index.php";

// include "includes/connection.php"; -- Use this --

$servername = "";
$username = "";
$password = "";
$dbname = "";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$Nome = $_POST['CAname'];
$email = $_POST['CAemail'];
$userName = $_POST['CAusername']; 
$password = md5($_POST['CApassword']);



$sql = "INSERT INTO users (User_name, User_email, User_username, User_password, User_foto, User_capa, User_type)
VALUES ('$Nome', '$email', '$userName', '$password', 'noimageuser.png', 'capa.jpg', '0')";

if (mysqli_query($conn, $sql)) {
    header('location: index.php');
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>
