<?php

session_start();

if(!isset($_SESSION['loggedIN'])){
	header('location: index.php');
	exit();
}

?>

<?php

// include "includes/connection.php"; -- Use this --

$servername = "";
$username = "";
$password = "";
$dbname = "";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$id = $_GET['id'];
$post = $_POST['editpost'];


$sql = "UPDATE feed SET Feed_msg='$post' WHERE Feed_id='$id'";

if (mysqli_query($conn, $sql)) {
    header('location: feed.php');
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
	


mysqli_close($conn);
?>
