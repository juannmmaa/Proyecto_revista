<p>
	<!--Titulo: <input type="text" name="titulo" value="<?php //echo $datos->titulo?>" /> -->
	<h1> <?php echo $datos->titulo?> </h1>

	<h2> <?php echo $datos->bajada?> </h2>

	<?php echo $datos->noticia?>
	<br/>

	autor: <?php echo $datos->autor_fk?>
	<br/>
	
	categoria: <?php echo $datos->categoria_fk?>
</p>