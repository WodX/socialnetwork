<?php

session_start();

if(!isset($_SESSION['loggedIN'])){
	header('location: index.php');
	exit();
}

include "includes/connection.php";

if (isset($_GET['id']) && is_numeric($_GET['id']))

{


$id = $_GET['id'];

$result = mysqli_query($conn, "DELETE FROM feed WHERE Feed_id=$id")

or die(mysqli_error());


header("Location: profile.php");

}

else

{

echo"Erro ao eliminar";
	
header("Location: profile.php");

}



?>
