<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<body>

<?php /*Carga el header en el controlador*/
	$id_post = 0;
	$nick = 1;
// foreach() mostrando todos los comentarios de un post de los post
	foreach ($post->result() as $value) {
			echo $value->Nombre."<br>"."<br>";
			echo $value->Descripcion."<br>"."<br>";
			$id_post = $value->Id;
	} 

	if($comentarios) {

		foreach ($comentarios->result() as $value) {
			foreach ($usuarios->result() as $name) {
				if($value->Id_Usuario == $name->Id){
					echo $name->Nick."---";
					echo '<img src="'.base_url().$name->Imagen.'" width="80" height="80">'."<br>"."<br>";
				}
			}
			echo $value->Titulo."<br>"."<br>";
			echo $value->Descripcion."<br>"."<br>";
			echo '<form method="post" action="'.$id_post.'">
					<input type="hidden" name="id_comentario" value="'.$value->Id.'"/>
					<input type="hidden" name="nick" value="'.$nick.'"/>
					<input type="hidden" name="megusta" value="'.$value->Likes.'"/>
					<input type="submit" value="like" /></form> '.$value->Likes;
    		echo '<form method="post" action="'.$id_post.'">
    				<input type="hidden" name="id_comentario" value="'.$value->Id.'"/>
    				<input type="hidden" name="nick" value="1"/>
    				<input type="hidden" name="nomegusta" value="'.$value->Dislikes.'"/>
					<input type="submit" value="Dislike" /></form> '.$value->Dislikes."<br>"."<br>";

			// <input type="hidden" name="usuario" value="'.$_SESSION['Nick'].'"/>
				  
		} 
	}else {
		echo "Se el primero en comentar.";
	}
?>

	<!-- FORMULARIO PARA EL COMENTARIO -->
	<form action="<?php echo base_url().'index.php/controladorPost/mostrarPost/'.$id_post.
		'/'.$Nick; ?>" method=POST>
	
	<label for="descripcion"> Escribir comentario:</label><br>
	<textarea cols=50 rows=15 name="comentario"></textarea>
	<br>
	<input type="hidden" name="id" value=<?php echo $id_post;?> />
	<input type="submit" name="Comentar" value="Comentar">
</form>


</body>
</html>