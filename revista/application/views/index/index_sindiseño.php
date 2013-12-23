<html>

	<head>

	</head>	

	<body>
		
		<h1>Revista Informatica</h1>

		<br />
         <div id="page" class="hfeed site">
	
		<div id="header">

		<div id="estaipegao">
		<!-- Menu -->
		<!-- navegacion top -->
		<div id="navegacion">
		<ul class="first">
		<li class="sub-nav"><a href='#' class="fNiv"><span>PRINCIPAL</span></a>
		<ul>
		<li><a href="<?php echo base_url()?>usuarios/login">Logeo Administrador</a></li>
        <br/>
		</ul>
		</li>
		<li class="sub-nav"><a href='#'><span>SECCIONES</span></a>
		<ul>
		<li class="blank">Temas</li>
		<li><a href="<?php echo base_url()?>usuarios/login">Actualidad en la universidad</a></li>
		<li><a href="<?php echo base_url()?>usuarios/login">Tecnologia</a></li>
		<li><a href="<?php echo base_url()?>usuarios/login">Documentos</a></li>
		<li><a href="<?php echo base_url()?>usuarios/login">Calendario</a></li>
		<br/>
		</ul>
		</li>
		<li class="sub-nav"><a href='#'><span>NOTICIAS</span></a>
		<ul>
		<li class="blank">Diversos</li>
		<li><a href="<?php echo base_url()?>usuarios/login">Noticias recientes</a></li>
		<li><a href="<?php echo base_url()?>usuarios/login">Noticias no tan recientes</a></li>
		<li><a href="<?php echo base_url()?>usuarios/listar_articulo">Todas las noticias</a></li>
		<li><a href="<?php echo base_url()?>usuarios/login">Lugar de ocio</a></li>
		<br/>
		</ul>
		</li>
        <li class="sub-nav"><a href='#'><span>CONTACTANOS</span></a>
		<ul>
		<li class="blank">Detalle</li>
		<li><a href="<?php echo base_url()?>contacto/index">Envianos tus dudas</a></li>
		</ul>
		</li>

		<h1>NOTICIAS </h1>
		
				<?php
				foreach ($datos as $dato)
				{
					?>
					
				<div class="column">
					<!--<h6><?php //echo $dato->pk ?></h6>-->
					<h3><?php echo $dato->titulo?></h3>
					<img src="public/images/thumb.gif" alt="Thumb" />
					<p><?php echo $dato->bajada?></p>
					<p class="more"><a href="<?php echo base_url()?>index/mostrar_noticia_completa/<?php echo $dato->pk?> ">read more</a></p>
				</div>
					<br/>
					<?php

				}
				?>

		
	  	</ul>
	</body>	
</html>