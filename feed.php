<?php include 'includes/menu.php'; ?>
<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10 conteudo">
		  	
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
	<form action="insere_post.php" method="post">
		<table class="postar"> 
			<tr>
				<td colspan="2"><textarea class="inserepost" maxlength="120" name="post" placeholder="Faça uma publicação..."></textarea></td>
			</tr>
			<tr>
				<td class="postbuttons"  id="charNum"></td>
				<td class="postbuttons"><div id="charNum"></div><input type="submit" class="submitpost" value="Publicar"></td>
			</tr>
		</table>
		
		
	</form>
	
	<table class="posts"  width="100%">	
<?php

// include "includes/connection.php"; -- Use this --
		
$ligacao = mysqli_connect('', '', '', '') or die ('Não foi possivel ligar à base de dados');

$sql = 'SELECT * FROM feed ORDER BY Feed_id DESC';

$consulta = mysqli_query($ligacao, $sql);
	
if ($consulta) {
	
	while ($row = mysqli_fetch_array($consulta)) {
	
		$sql2 = 'SELECT * FROM users WHERE User_id ='.$row['Feed_userid'];
		$consulta2 = mysqli_query($ligacao, $sql2);
		$row2 = mysqli_fetch_array($consulta2);
	?>
			
			<tr>
				<td rowspan="2">
					<a href="view_profile.php?id=<?php echo $row2['User_id']* 1234325.0983; ?>"><img width="40px" height="40px" style="border-radius: 50%;" src="images/<?php echo $row2['User_foto']; ?>"></a>
				</td>
				<td style="padding-left:15px;"><a style="text-decoration:none; color: black;" href="view_profile.php?id=<?php echo $row2['User_id']* 1234325.0983; ?>"><b class="feed-name"><?php echo $row2['User_name'];  
		if($row2["User_type"] == 1){ ?></b></a>
							<img src="images/admin.svg" title="Admin" width="10px" height="10px">
						<?php }else { ?>
							<img src="images/user.svg" title="Utilizador" width="10px" height="10px">
						<?php } ?> 
				
				</td>
			</tr>
			<tr>
				
				<td style="padding-left:15px; padding-right:15px;"><a class="hidepost<?php echo $row['Feed_id']; ?>"><?php echo $row['Feed_msg']; ?></a>
					<form class="novaAcc<?php echo $row['Feed_id']; ?>" style="display:none;" method="post" action="edit_post.php?id=<?php echo $row['Feed_id']; ?>" >
					<textarea class="inserepost2" maxlength="120" name="editpost"><?php echo $row['Feed_msg']; ?></textarea>
					<input type="submit" class="btn_login" value="Submeter" ><a onclick="javascript:$('.novaAcc<?php echo $row['Feed_id']; ?>').hide('slow'); $('.hidepost<?php echo $row['Feed_id']; ?>').show('slow');" ><input type="button" class="btn_login" value="Cancelar" ></a>
						
				</form>  
				</td>
				
				<?php	if($_SESSION["User_type"] == 1 || $_SESSION['User_id'] == $row['Feed_userid']){ ?>
				
				<td style="min-width: 30px;">
					<a style="cursor:pointer;" onclick="javascript:$('.novaAcc<?php echo $row['Feed_id']; ?>').show('slow'); $('.hidepost<?php echo $row['Feed_id']; ?>').hide();" >
						<img src="images/edit.svg" title="Editar Post" width="15px" height="15px"></a>
				</td>
				<td style="min-width: 30px;">
					<a href="del_post.php?id=<?php echo $row['Feed_id'] ?>" onclick="return confirm('Tem a certeza que quer eliminar este post?')"><img src="images/delete.svg" title="Apagar Post" width="15px" height="15px"></a>
				</td>
						
				<?php
					}
				?>
			</tr>
		<tr><td><br></td></tr>
	
		
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
</div>
<?php include "includes/footer.php"; ?> 
