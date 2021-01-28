<?php include 'includes/menu.php'; ?>	
<?php include 'includes/encrypt.php'; ?>

<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10 conteudo">
	
<table class="user_list">
	<tr>
		<th>Foto</th>
		<th>Utilizador</th>
		<th>Nome</th>
		<th>Email</th>
		<th>Tipo de Utilizador</th>
		<th colspan="2">Ações</th>
	</tr>
<?php

// include "includes/connection.php"; -- Use this --
	
$ligacao = mysqli_connect('', '', '', '') or die ('Não foi possivel ligar à base de dados');


$sql = 'SELECT * FROM users ORDER BY User_id ASC';
$consulta = mysqli_query($ligacao, $sql);
	
if ($consulta) {
	
	while ($row = mysqli_fetch_array($consulta)) { ?>
	
	<tr>
		<td>
			<a href="view_profile.php?id=<?php echo $row['User_id']* 1234325.0983; ?>"><img src="images/<?php echo $row['User_foto']; ?>" width="30px" height="30px" style="border-radius:50%;"></a>
		</td>
		<td><?php echo $row['User_username']; ?></td>
		<td><?php echo $row['User_name']; ?> </td>
		<td><?php echo $row['User_email']; ?></td>
		<td>
			<?php if($row['User_type'] == 1){?>
				<img src="images/admin.svg" title="Admin" width="20px" height="20px"> Admin
			<?php }else { ?>
				<img src="images/user.svg" title="Utilizador" width="20px" height="20px"> Utilizador
			<?php } ?> 
		</td>
		
		<td>
			<?php if($_SESSION['User_type'] == 1){ ?>
			
			<a href="edit_user.php?id=<?php echo $row['User_id'] * 1234325.0983; ?>"><img src="images/edit.svg" title="Editar utilizador" width="15px" height="15px"></a>
			
		</td>
		<td>
			<a href="del_user.php?id=<?php echo $row['User_id'] * 1234325.0983; ?>" onclick="return confirm('Tem a Certeza que quer eliminar este utilizador?')"><img src="images/delete.svg" title="Apagar utilizador" width="15px" height="15px"></a>
			
			<?php }	?>
		</td>
		
			
		
	</tr>
			
			
			
		
	
	<?php	
	}
}
else { echo ("A base de dados não contém registos");
}

// libertar variável da memória 
mysqli_free_result($consulta);
?>
	</table>
</div>
<?php include "includes/footer.php"; ?> 
