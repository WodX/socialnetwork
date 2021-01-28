<?php include 'includes/menu.php'; ?>	

<?php
	// include "includes/connection.php"; -- Use this --

	$ligacao = mysqli_connect('', '', '', '') or die ('Não foi possivel ligar à base de dados');

	$sql = mysqli_query($ligacao, 'SELECT * FROM users WHERE User_id='.$_SESSION['User_id']);
	
	$row = mysqli_fetch_array($sql);

?>


<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10 conteudo perfil">
	
	 <div class="CoverImage FlexEmbed FlexEmbed--2by1" style="background-image:url('images/<?php echo $row['User_capa']; ?>')"></div>

        <div class="profileimage">

            <img src="images/<?php echo $row['User_foto']; ?>">

        </div>
    
    
   


            <form method="post" action="update_profile.php" enctype="multipart/form-data">
                <table align="center"class="editusertable" style="margin-top:80px;">
                                <tr>
                                    <td>Nome: </td>
                                    <td><input type="text" name="editname" placeholder="Nome" required="required" maxlength="20" minlength="3" class="loginput" value="<?php echo $row['User_name'] ?>" ></td>
                                </tr>
                                <tr>
                                    <td>Email: </td>
                                    <td><input type="text" name="editemail" placeholder="Email" required="required" maxlength="40" class="loginput" value="<?php echo $row['User_email'] ?>" ></td>
                                </tr>
                                <tr>
                                    <td>Username: </td>
                                    <td><input type="text" name="editusername" placeholder="Username" required="required" maxlength="20" minlength="5" class="loginput" value="<?php echo $row['User_username'] ?>" ></td>
                                </tr>
								<tr>
                                    <td>Sobre: </td>
									<td><textarea type="text" name="editsobre" placeholder="Sobre si"  maxlength="170" minlength="5" class="loginput"><?php echo $row['User_about']; ?></textarea></td>
                                </tr>
                                <tr>
                                    <td>Password: </td>
                                    <td><input type="password" name="editpassword" placeholder="Password" minlength="3" class="loginput"></td>
                                </tr>
                                <tr>
                                    <td colspan="2" align="center"   ><input type="submit" name="submit" value="Editar Utilizador" class="editsubmit"><br></td>
                                </tr>
                </table>
            </form>
		
<?php include "includes/footer.php"; ?> 
