

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
	<p style="font-size: 250%;"> Crear Categoria</p>
	</center>
	<?php echo validation_errors(); ?>
		<form action="#" method="POST" id="login-form">
		
			<fieldset>

				<p>
					<label for="login-username">Nombre de categoria</label>
					<input type="text" name="nombre" value="<?php echo set_value("nombre")?>" />
					<!--<input type="text" id="nombre-categoria" class="round full-width-input" autofocus />-->
				</p>

				<p>
					<label for="login-password">Descripcion</label>
					<input type = "text" name ="descripcion" value "<?php echo set_value("descripcion")?>"/>
					<!--<input type="text" id="descripcion" />-->
				</p>
				
				
				
				<!--<a href="dashboard.html" class="button round blue image-center">  Crear Categoria </a>-->
				<input type ="submit" value ="Crear Categoria" title="Crear Categoria"/>
				</br>
				</br>
				<input type="button" name="Atras" value="Atrás" onClick="location.href='<?php echo base_url() ?>usuarios'" />
				<!--<a href="dashboard.html" class=" button round blue image-left ic-left-arrow">Atras</a>-->

			</fieldset>

			

		</form>
		
	</div> <!-- end content -->
		
		<div id="content-bottom"></div>
	
		<div id="footer">
            <p id="links">
                <a href="<?php echo base_url() ?>index/nosotros">Nosotros</a>
            </p>
            <p> Grupo 05; Felipe Alvarez, Juan Cortez, Christopher Salvatierra</p>
        </div>
	</div>	
