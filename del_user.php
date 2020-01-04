<?php

session_start();

if(!isset($_SESSION['loggedIN'])){
	header('location: index.php');
	exit();
}


include "includes/connection.php"; include "includes/encrypt.php";

if (isset($_GET['id']) && is_numeric($_GET['id']))

{

$id = $_GET['id'] / 1234325.0983;


$result = mysqli_query($conn, "DELETE FROM users WHERE User_id=$id")

or die(mysqli_error());

$result1 = mysqli_query($conn, "DELETE FROM feed WHERE Feed_userid=$id")

or die(mysqli_error());


header("Location: user_list.php");

}

else

{

echo"Erro ao eliminar";
//header("Location: user_list.php");

}



?>
