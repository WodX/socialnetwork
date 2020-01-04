<?php

session_start();

if(!isset($_SESSION['loggedIN'])){
	header('location: index.php');
	exit();
}

?>

<?php
	$ligacao = mysqli_connect('localhost', 'andre', 'andre.2019', 'andrenun_work') or die ('Não foi possivel ligar à base de dados');
	
	$sql = mysqli_query($ligacao, 'SELECT * FROM users WHERE User_id='.$_SESSION['User_id']);
	
	$row = mysqli_fetch_array($sql);

?>


<html>
  <head>
    <title>André Nunes Work</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="shortcut icon" type="image/x-icon" href="images/icon.png" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/mainStyle.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/animate.css@3.5.2/animate.min.css">
  </head>
  <body class="bglogin">
      <div class="container">
          <div class="row">
			 <div class="menuToggle">
				  <div class="bar1"></div>
				  <div class="bar2"></div>
				  <div class="bar3"></div>
			  </div>
			  <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 menu" >
			  	<div class="menuimg">
					<img src="images/<?php echo $row['User_foto']; ?>"> 
					<br><br>
					<p>Bem-vindo, <h6><?php echo $row['User_name']; ?></h6>
					<?php
						if($_SESSION['User_type'] == 1){
							echo "Administrador";
						}else{
							echo "Utilizador";
						}
					?>
					</p>
				</div>
			  	<div>
					  <a href="feed.php"><button type="button">Página inicial</button></a>			  
				 </div>
				 <div>
					 <a href="profile.php"><button type="button">Perfil</button></a>				  
				 </div>
				  <div>
					  <a href="user_list.php"><button type="button">Utilizadores</button></a>			  
				 </div>
				  <div>
					  <a href="logout.php"><button class="logout" type="button">Sair</button></a>				  
				 </div>
			  </div>