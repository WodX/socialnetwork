<?php include 'includes/menu.php'; ?>	
<?php

$userid = $_GET['id'] / 1234325.0983;

if($_SESSION['User_id'] == $userid){
	header('location: profile.php');
}

// include "includes/connection.php"; -- Use this --

$ligacao = mysqli_connect('', '', '', '') or die ('Não foi possivel ligar à base de dados');


$sql3 = 'SELECT * FROM users WHERE User_id='.$userid;

	
	
$consulta3 = mysqli_query($ligacao, $sql3);

$row3 = mysqli_fetch_array($consulta3); 

?>



<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10 conteudo perfil">
	
    <div class="CoverImage FlexEmbed FlexEmbed--2by1" style="background-image:url('images/<?php echo $row3['User_capa']; ?>')"></div>

        <div class="profileimage">

            <img src="images/<?php echo $row3['User_foto']; ?>">

        </div>
    
    <div class="profileinfo">
        
        <p><span id="profilename"><?php echo $row3['User_name'];
            if($row3["User_type"] == 1){ ?>
				<img src="images/admin.svg" title="Admin" width="15px" height="15px">
            <?php }else { ?>
				<img src="images/user.svg" title="Utilizador" width="15px" height="15px">
            <?php } ?> </span><br>
        <span class="profilesmall"><?php echo "@".$row3['User_username']; ?></span><br><span class="profilesmall"><?php echo $row3['User_email']; ?></span></p>
        
        <p id="profileabout"><?php echo $row3['User_about']; ?></p>
        
    </div>
    
    <div id="profileborder"></div>
    
    <button name="profileeditbutton" id="postsbutton">Posts</button>
        
    <div id="profilefeed">
    
        <table class="posts"  width="100%">	
<?php
	

$sql = 'SELECT * FROM feed WHERE Feed_userid='.$row3['User_id'].' ORDER BY Feed_id DESC';

	
	
$consulta = mysqli_query($ligacao, $sql);
	
if ($consulta) {
	
	while ($row = mysqli_fetch_array($consulta)) {
	
		$sql2 = 'SELECT * FROM users WHERE User_id ='.$row['Feed_userid'];
		$consulta2 = mysqli_query($ligacao, $sql2);
		$row2 = mysqli_fetch_array($consulta2);
	?>
			
			<tr>
				<td rowspan="2">
					<img width="40px" height="40px" style="border-radius: 50%;" src="images/<?php echo $row2['User_foto']; ?>">
				</td>
				<td style="padding-left:15px;"><b class="feed-name"><?php echo $row2['User_name'];  
						if($row2["User_type"] == 1){ ?></b>
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
