<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<meta name="author" content="Luka Cvrk (www.solucija.com)" />
	<link rel="stylesheet" href="public/css/main.css" type="text/css" />
	<title>Enthusiastica</title>
</head>
<body>
	<div id="wrap">
		<div id="logo">
			<h1><a href="#">enthusiastica</a></h1>
			<p>enthusiastic about the web</p>
		</div>
		
		<div id="explore">
			<a href="#" id="explore-link">Explore</a>
		</div>
		
		
		<div id="login">
			<!--<a href= id="login-1">Iniciar Sesion</a>-->
			<a href="<?php echo base_url()?>usuarios/login">Iniciar Sesion</a>
		</div>
		<div id="content-top"></div>
		
		<div id='cssmenu'>
		
<ul>
   <li class='active'><a href='index.html'><span>Inicio</span></a></li>
   <li class='has-sub'><a href='#'><span>Noticias</span></a>
      <ul>
         <li><a href='#'><span>universidad</span></a></li>
         <li><a href='#'><span>Popurri</span></a></li>
         <li class='last'><a href='#'><span>Nacional</span></a></li>
      </ul>
   </li>
   <li class='has-sub'><a href='#'><span>Company</span></a>
      <ul>
         <li><a href='#'><span>About</span></a></li>
         <li class='last'><a href='#'><span>Location</span></a></li>
      </ul>
   </li>
   <li class='last'><a href='#'><span>Contact</span></a></li>
</ul>
</div>


		<div id="content-middle">
			<div id="pitch">
				<h1>Duis aute irure reprehenderit in voluptate velit<br /><span>exercitation ullamco</span></h1>
				<p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit.</p>
			</div>
		
			<?php
				foreach ($datos as $dato)
				{
					?>
					
				<div class="column">
					
					<h3><?php echo $dato->titulo?></h3>
					<img src="public/images/thumb.gif" alt="Thumb" />
					<p><?php echo $dato->bajada?></p>
					<p class="more"><a href="<?php echo base_url()?>index/mostrar_noticia_completa/<?php echo $dato->pk?> ">read more</a></p>
				</div>
					
					<?php

				}
				?>
			<div class="clear"></div>
		</div>
		
		<div id="content-bottom"></div>
	
		<div id="footer">
			<p id="links">
				<a href="#">Terms and Conditions</a>
				<a href="#">Privacy</a>
				<a href="#">About Us</a>
			</p>
			<p>Copyright &copy; Enthusiastica &middot; Design: Luka Cvrk, <a href="http://www.solucija.com" title="Free CSS Templates">Solucija</a></p>
		</div>
	</div>	
</body>
</html>