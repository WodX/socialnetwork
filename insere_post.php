<?php 

session_start();

if(!isset($_SESSION['loggedIN'])){
	header('location: index.php');
	exit();
}

$UserId = $_SESSION['User_id'];

$servername = "localhost";
$username = "andre";
$password = "andre.2019";
$dbname = "andrenun_work";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$post = $_POST['post'];

$sql = "INSERT INTO feed (Feed_msg, Feed_userid) VALUES ('$post', '$UserId')";

if (mysqli_query($conn, $sql)) {
    header('location: feed.php');
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>
