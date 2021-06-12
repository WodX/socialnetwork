<?php
	
	session_start();

	if(isset($_SESSION['loggedIN'])){
		header('location: feed.php');
		exit();
	}

	
    if (isset($_POST['login'])) {
		
	    	//include connection
	    
		$connection = new mysqli('localhost', '', '', '');
		
     	$user = $connection->real_escape_string($_POST['userPHP']);
		$password = md5($connection->real_escape_string($_POST['passwordPHP']));
		
		$data = $connection->query("SELECT * FROM users WHERE User_username='$user' AND User_password='$password'");
		
		if($data->num_rows > 0){
			$row = mysqli_fetch_assoc($data);
			$_SESSION['User_id'] = $row['User_id'];
			$_SESSION['User_username'] = $row['User_username'];
			$_SESSION['User_name'] = $row['User_name'];
			$_SESSION['User_email'] = $row['User_email'];
			$_SESSION['User_foto'] = $row['User_foto'];
			$_SESSION['User_type'] = $row['User_type'];
			$_SESSION['User_about'] = $row['User_about'];
			$_SESSION['User_capa'] = $row['User_capa'];
			$_SESSION['loggedIN'] = 1;
          	exit('success');
		} else {
			exit('failed');
		}						
	};

?>
