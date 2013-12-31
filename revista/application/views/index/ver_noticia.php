
	

	<div id="wrap">
		<div id="logo">
			<h1>Revista Digital UTEM</h1>
			<p>Proyecto Ingenieria de Software - Grupo 05</p>
		</div>
		
		<div id="explore">
			<a href="<?php echo base_url() ?>usuarios/login" id="explore-link">Iniciar Sesion</a>
		</div>
		
		
		<div id="content-top"></div>
		
		<div id='cssmenu'>
		
<ul>
   <li class='active'><a href="<?php echo base_url() ?>index"><span>Inicio</span></a></li>
   <li class='has-sub'><a href='#'><span>Noticias</span></a>
      <ul>
          				<?php
                       foreach ($categorias as $categoria)  //para mostrar la lista de categorias que estan ingresadas en la bdd q
                       {
                        ?>
                            <li><a href="<?php echo base_url() ?>index/lista_por_categoria/<?php echo $categoria->pk ?> "><span><?php echo $categoria->nombre?> </span></a></li>
                            <?php
                       }
                       ?>
      </ul>
   </li>
   <li class='has-sub'><a href='#'><span>Company</span></a>
      <ul>
         <li><a href='#'><span>About</span></a></li>
         <li class='last'><a href='#'><span>Location</span></a></li>
      </ul>
   </li>
   <li class='last'><a href="<?php echo base_url() ?>contacto"><span>Contact</span></a></li>
</ul>

</div>


		<div id="content-middle">
			
		
	<p>
	<!--Titulo: <input type="text" name="titulo" value="<?php //echo $datos->titulo?>" /> -->
	<?php echo $datos->fecha ?>
	<h1 align="center"> <font color=Darkgrey size="7"><?php echo $datos->titulo?> </font> </h1>


	<br/>

	<?php
	
	if($datos->imagen !=null)//si es que le articulo contiene imagen, que la muestre
	{
	?>
		<center>
		<img src="uploads/archivos/<?php echo $datos->imagen ?> "  width='600' height='320' alt="Thumb"  />
		
		<!--<?php //echo $datos->imagen; ?> //prueba para ver si es que trae correctamente el nombre de la imagen, lo cual lo hace -->

		</center>
		<br/>
		<?php
	}
	else
	{
		?>
		<center>
		<?php echo ("Este articulo no posee imagen"); ?>

		</center>
		<?php
	}
	
	?>

	<h2 align="center"> <font color=black size="4"><?php echo $datos->bajada?> </font></h2>
	<br/>
	<p align="center">
	<?php echo $datos->noticia?>
	</p>
	<br/>
	autor: <?php echo $escritor->nombres. " ".$escritor->apellidos?> <!--llama al escritor por nombre y apellido -->
	<br/>
	
	categoria: <a href="<?php echo base_url() ?>index/lista_por_categoria/<?php echo $nom_categoria->pk ?> "><?php echo $nom_categoria->nombre?></a> <!--llama a la categoria por nombre-->
	

</p>
		
		<div id="content-bottom"></div>
	
		<div id="footer">
			<p id="links">
				<a href="#">Nosotros</a>
			</p>
			<p>Copyright &copy; Grupo 05; Felipe Alvarez, Juan Cortez, Christopher Salvatierra</p>
		</div>
	</div>	
