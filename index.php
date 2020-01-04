<?php include 'includes/verification_login.php'; ?>
<!doctype html>
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
      <div class="container-fluid">
          <div class="row">
			  <div class="loginbox">
				<form class="mainlogin" method="post" >
					<img class="imgprofilogin" src="images/noimageuser.png">
					<h4>Iniciar Sessão</h4>
					<table align="center">
						<tr>
							<td><img class="loginicon" src="images/AdminUserLogin.svg"></td>
							<td><input type="text" id="username" placeholder="Utilizador" class="loginput" ></td>
							<td><div id="fail"><img src="images/warning.svg"></div></td>

						</tr>
						<tr>
							<td><img class="loginicon" src="images/AdminPassLogin.svg"></td>
							<td><input type="password" id="password" placeholder="Password" class="loginput" ></td>
							<td><div id="fail2"><img src="images/warning.svg"></div></td>
						</tr>
						
						<tr>
							<td></td>
							<td><input type="button" id="btn_login" class="btn_login" value="Submeter" ><br></td>
						</tr>
						<tr>
							<td></td>
							<td><a id="novaAcc">Criar conta</a></td>
						</tr>
					</table>
				</form>
				<p style="color: black; font-size:12px;"><br><b>User:</b> username<br>
				<b>Password:</b> username<br><br>
				or Create a new account on "Criar Conta"</p>
            </div>
          </div>
		  <div class="novaAcc">
			  <div class="novaAccBG" onclick="javascript:$('.novaAcc').fadeOut();"></div>
			  <div class="novaAccBox">			  
				  <div class="novaAccCont">
				<form class="CreAcc" method="post" action="register.php" >
					<h4>Criar Conta</h4>
					<table align="center">
						<tr>
							<td><input type="text" id="CAname" name="CAname" placeholder="Nome" required="required" class="loginput" maxlength="20" minlength="3"></td>
						</tr>
						<tr>
							<td><input type="email" name="CAemail" placeholder="Email" required="required" maxlength="40" class="loginput" id="CAemail" ></td>
						</tr>
						<tr>
							<td><input type="text" name="CAusername" placeholder="Username" class="loginput" maxlength="20" required="required" minlength="5"  ></td>
						</tr>
						<tr>
							<td><input type="password" name="CApassword" placeholder="Password" class="loginput" required="required" minlength="3" ></td>
						</tr>
						<tr>
							<td><input type="submit" name="btn_CreAcc" id="registar" class="btn_login" value="Criar Conta" ><br></td>
						</tr>
					</table>
				</form>   
				  </div>	
			</div>
		</div>
      </div>     
    <script src="http://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  	crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="bootstrap/js/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  	crossorigin="anonymous"></script>
	<script src="js/login.js"></script>
  </body>
</html>