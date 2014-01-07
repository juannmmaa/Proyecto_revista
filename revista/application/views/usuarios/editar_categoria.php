
<div id="wrap">
		<div id="logo">
			<h1>Revista Digital UTEM</h1>
			<p>Proyecto Ingenieria de Software - Grupo 05</p>
		</div>
		
		
		
		
		<div id="content-top"></div>
		
		<div id='cssmenu'>
<br/>		
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
<?php

	$atributos = array('pk' => 'form', 'nombres' =>'form');
	echo form_open_multipart(null,$atributos);
?>
<?php echo validation_errors(); ?>
<center>
	<br/>
	<br/>
	<br/>
	<div id="content-middle">
			
		
	<!-- MAIN CONTENT -->
	<div id="content">
<p style="font-size: 250%;"> Editar Categoria</p>
<fieldset>
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

</fieldset>

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