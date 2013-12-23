<?php

	$atributos = array('pk' => 'form', 'nombres' =>'form');
	echo form_open_multipart(null,$atributos);
?>
<?php echo validation_errors(); ?>
<?php 
if ( $this->session->flashdata('ControllerMessage') != '' ) 
    {
?>
<p style="color: red;"><?php echo $this->session->flashdata('ControllerMessage'); ?></p>
<?php 
} 
?>
<h1>Editar Administrador</h1>
<p>
 <p>
	Nombres: <input type="text" name="nombres" value="<?php echo $datos->nombres?>" />
	</p>
	<p>
	Correo: <input type="text" name="apellidos" value="<?php echo $datos->apellidos?>" />
	</p>
	<p>
	RUT: <input type="text" name="rut" value="<?php echo $datos->rut?>" />
	</p>
	<p>
	Usuario: <input type="text" name="login" value="<?php echo $datos->login?>" />
	</p>
	<p>
	Password: <input type="text" name="pass" value="<?php echo $datos->pass?>" />
	</p>
</p>

<input type="hidden" name="pk" value="<?php echo $pk?>" />
<input type ="submit" value ="Enviar" title="Enviar" />

<a href="<?php echo base_url()?>usuarios">Atras</a> 
<!--<input type="button" name="Atras" value="Atrás" onClick="location.href='usuarios/saludo'" />-->



<?php
echo form_close();
?>