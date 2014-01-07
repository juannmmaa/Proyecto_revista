
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
	<center>
	<?php
      /*
		$atributos = array('pk' => 'form', 'nombres' =>'form');
		echo form_open_multipart(null,$atributos);
		*/
	?>
	<?php echo validation_errors(); ?>
	<p style="font-size: 250%;"> Crear Administrador</p>
	</center>
	
		<form action="<?php echo base_url()?>usuarios/usuario" method="POST" id="login-form">
		
			<fieldset>

				<p>
					<label for="login-username">Nombre</label>
					<input type="text" name="nombres" value="<?php echo set_value("nombres")?>" />
					<!--<input type="text" id="nombrea" class="round full-width-input" autofocus />-->
				</p>
				
				<p>
					<label for="login-username">Apellido</label>
					<input type = "text" name ="apellidos" value "<?php echo set_value("apelidos")?>"/>
					<!--<input type="text" id="apellido" class="round full-width-input" autofocus />-->
				</p>
				
				<p>
					<label for="rut">RUT</label>
					<input type = "text" name ="rut" value "<?php echo set_value("rut")?>"/>
					<!--<input type="text" id="apellido" class="round full-width-input" autofocus />-->
					<p> Se debe ingresar rut sin puntos ni guion (ej: 12345678k)
				</p>
				
				<p>
					<label for="usuario">Usuario</label>
					<input type = "text" name ="login" value "<?php echo set_value("login")?>"/>
					<!--<input type="text" id="usuario" class="round full-width-input" autofocus />-->
				</p>

				<p>
					<label for="login-password">password</label>
					<input type = "password" name ="pass" value "<?php echo set_value("pass")?>"/>
					<!--<input type="password" id="password" class="round full-width-input" />-->
				</p>
				
				
				
				<!--<a href="<?php// echo base_url()?>usuarios/usuario" class="button round blue image-center">  Crear Usuario </a>-->
				<input type ="submit" value ="Crear Usuario" title="Crear Usuario" />
				</br>
				</br>
				<input type="button" name="Atras" value="Atrás" onClick="location.href='<?php echo base_url() ?>usuarios'" />
				<!--<a href="dashboard.html" class=" button round blue image-left ic-left-arrow">Atras</a>-->

			</fieldset>

			

		</form>
		<?php
			//echo form_close();
		?>
		
	</div> <!-- end content -->
		
		<div id="content-bottom"></div>
	
		<div id="footer">
            <p id="links">
                <a href="<?php echo base_url() ?>index/nosotros">Nosotros</a>
            </p>
            <p> Grupo 05; Felipe Alvarez, Juan Cortez, Christopher Salvatierra</p>
        </div>
	</div>	
