<?php include 'includes/menu.php'; ?>	

<?php if($_SESSION['User_type'] == 0){
	header("location: index.php");
} ?>

<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10 conteudo">

<?php		
		
include "includes/connection.php";

if (isset($_GET['id']) && is_numeric($_GET['id']))

{


$id = $_GET['id'] / 1234325.0983;


$result = mysqli_query($conn, "SELECT * FROM users WHERE User_id=$id")

or die(mysqli_error());
	
$row = mysqli_fetch_array($result);?>
            <form method="post" action="update_user.php?id=<?php echo $row['User_id'] ?>" enctype="multipart/form-data">
                <table align="center"class="editusertable" style="margin-top:50px;">
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
                                    <td>Password: </td>
                                    <td><input type="password" name="editpassword" placeholder="Password" minlength="3" class="loginput"></td>
                                </tr>
                                <tr><?php $status = $row['User_type']; ?>
                                    <td>Tipo de Utilizador</td>
                                    <td>
                                    <select name="edittype" class="loginput" >
                                      <option value=1 <?php if($status == "1") echo "SELECTED";?> >Administrador</option>
                                      <option value=0 <?php if($status == "0") echo "SELECTED";?>>Utilizador</option>
                                    </select>
                                    </td>								
                                </tr>
                                <tr>
                                    <td colspan="2" align="center"   ><input type="submit" name="submit" value="Editar Utilizador" class="editsubmit"><br></td>
                                </tr>
                </table>
            </form>
	
	
<?php
}else

{



}



?>
		
<?php include "includes/footer.php"; ?> 