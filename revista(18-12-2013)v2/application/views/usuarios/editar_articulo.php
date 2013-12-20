<h1> Editar noticia </h1>

<?php

	$atributos = array('pk' => 'form', 'nombre' =>'form');
	echo form_open_multipart(null,$atributos);
?>
<?php echo validation_errors(); ?>
<p>
	Titulo: <input type="text" name="titulo" value="<?php echo $datos->titulo?>" />
	</p>
	<p>
	Bajada: <input type="text" name="bajada" value="<?php echo $datos->bajada?>" />
	</p>
	<p>
	Noticia: <input type="text" name="noticia" value="<?php echo $datos->noticia?>" />
	</p>
	<p>
	Fecha: <input type="date" name="fecha" value="<?php echo $datos->fecha?>" />
	</p>
	<p>
	Autor_fk: <input type="text" name="autor_fk" value="<?php echo $datos->autor_fk?>" />
	</p>
	<p>
	Categoria_fk: <input type="text" name="categoria_fk" value="<?php echo $datos->categoria_fk?>" />
	</p>

</p>
<input type="hidden" name="pk" value="<?php echo $pk?>" />
<input type ="submit" value ="Enviar" title="Enviar" />


<a href="<?php echo base_url()?>usuarios">Atras</a> 
<!--<input type="button" name="Atras" value="Atrás" onClick="location.href='usuarios/saludo'" />-->

<?php
echo form_close();
?>