<?php

	$atributos = array('pk' => 'form', 'nombres' =>'form');
	echo form_open_multipart(null,$atributos);
?>
<?php echo validation_errors(); ?>
<h1>Editar Categoria</h1>
<p>

	Nombre: <input type="text" name="nombre" value="<?php echo $datos->nombre?>" />
	</p>
	<p>
	Descripcion: <input type="text" name="descripcion" value="<?php echo $datos->descripcion?>" />
	</p>
</p>

<input type ="submit" value ="Enviar" title="Enviar" />

<input type="hidden" name="pk" value="<?php echo $pk?>" />

<a href="<?php echo base_url()?>usuarios">Atras</a> 
<!--<input type="button" name="Atras" value="Atrás" onClick="location.href='usuarios/saludo'" />-->



<?php
echo form_close();
?>