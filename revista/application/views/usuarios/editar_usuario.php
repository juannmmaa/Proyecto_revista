
	<div id="wrap">
		<div id="logo">
			<h1>Revista Digital UTEM</h1>
			<p>Proyecto Ingenieria de Software - Grupo 05</p>
		</div>
		
		
		<div id="content-top"></div>
		
		<div id='cssmenu'>
		
<ul>
   <li class='active'><a href="<?php echo base_url() ?>index"><span>Inicio</span></a></li>
   <li class='has-sub'><a href='#'><span>Noticias por categoria</span></a>
      <ul>
                       
                       <?php
                       foreach ($categorias as $categoria) 
                       {
                        ?>
                            <li><a href="<?php echo base_url() ?>index/lista_por_categoria/<?php echo $categoria->pk ?> "><span><?php echo $categoria->nombre?> </span></a></li>
                            <?php
                       }
                       ?>
                    </ul>
   </li>
   <li class='last'><a href="<?php echo base_url() ?>contacto"><span>Contacto</span></a></li>
</ul>
</div>

<div id="content-middle">
			
		
	<!-- MAIN CONTENT -->
	<div id="content">

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
<center>
<p style="font-size: 250%;"> editar Administrador</p>
<p>
 <p>
	Nombres: <input type="text" name="nombres" value="<?php echo $datos->nombres?>" />
	</p>
	<p>
	Apellido: <input type="text" name="apellidos" value="<?php echo $datos->apellidos?>" />
	</p>
	<p>
	RUT: <input type="text" name="rut" value="<?php echo $datos->rut?>" />
	</p>
	<!--<p>
	Usuario: <input type="text" name="login" value="<?php //echo $datos->login?>" disabled=true/>
	</p>
	<p>
	Password: <input type="password" name="pass" value="<?php //echo $datos->pass?>" disabled=true />
	</p>
	-->
</p>

<input type="hidden" name="pk" value="<?php echo $pk?>" />
<input type ="submit" value ="Enviar" title="Enviar" />

<a href="<?php echo base_url()?>usuarios">Atras</a> 
<!--<input type="button" name="Atras" value="Atrás" onClick="location.href='usuarios/saludo'" />-->



<?php
echo form_close();
?>
</center>
	</div> <!-- end content -->
		
		<div id="content-bottom"></div>
	
		<div id="footer">
            <p id="links">
                <a href="<?php echo base_url() ?>index/nosotros">Nosotros</a>
            </p>
            <p> Grupo 05; Felipe Alvarez, Juan Cortez, Christopher Salvatierra</p>
        </div>
	</div>	