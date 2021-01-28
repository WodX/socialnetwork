<?php

session_start();

if(!isset($_SESSION['loggedIN'])){
	header('location: index.php');
	exit();
}

?>




<?php

include "includes/edit_img.php";

// include "includes/connection.php"; -- Use this --

$servername = "";
$username = "";
$password = "";
$dbname = "";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$user = $_GET['id'];
$foto = $_FILES["fileToUpload"]["name"];


	
$sql = "UPDATE users SET User_capa='$foto' WHERE User_id='$user'";

if (mysqli_query($conn, $sql)) {
    header('location: profile.php');
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
		


mysqli_close($conn);
?>
