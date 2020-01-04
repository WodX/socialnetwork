<?php

session_start();

if(!isset($_SESSION['loggedIN'])){
	header('location: index.php');
	exit();
}

?>




<?php

include "includes/edit_img.php";


$servername = "localhost";
$username = "andre";
$password = "andre.2019";
$dbname = "andrenun_work";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$user = $_GET['id'];
$Nome = $_POST['editname'];
$email = $_POST['editemail'];
$userName = $_POST['editusername']; 
$password = md5($_POST['editpassword']);
$usertype = $_POST['edittype'];


if(empty($_POST['editpassword'])){
	
$sql = "UPDATE users SET User_name='$Nome', User_email='$email', User_username='$userName', User_type='$usertype' WHERE User_id='$user'";

if (mysqli_query($conn, $sql)) {
    header('location: user_list.php');
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
		
}else{
	$sql = "UPDATE users SET User_name='$Nome', User_email='$email', User_username='$userName', User_password='$password', User_type='$usertype' WHERE User_id='$user'";
	
	
	
	if (mysqli_query($conn, $sql)) {
    header('location: user_list.php');
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
	
	
}

		


mysqli_close($conn);
?>