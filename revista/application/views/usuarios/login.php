<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<meta name="author" content="Juanma" />
	<link rel="stylesheet" href="public/css/main.css" type="text/css" />
	
	<title>Revista Digital </title>
</head>
<body>
	<div id="wrap">
		<div id="logo">
			<h1>Revista Digital UTEM</h1>
			<p>Proyecto Ingenieria de Software - Grupo 05</p>
		</div>
		
		<div id="explore">
			<a href="#" id="explore-link">Iniciar Sesion</a>
		</div>
		
		
		<div id="content-top"></div>
		
		<div id='cssmenu'>
		
<ul>
   <li class='active'><a href="<?php echo base_url()?>index/index"><span>Inicio</span></a></li>
  <!-- <li class='active'><a href="<?php //echo base_url()?>usuarios/logout"><span>Inicio</span></a>-->
   <li class='has-sub'><a href='#'><span>Noticias</span></a>
      <ul>
         <li><a href='#'><span>universidad</span></a></li>
         <li><a href='#'><span>Internacional</span></a></li>
         <li class='last'><a href='#'><span>Tecnologia</span></a></li>
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
			if ( $this->session->flashdata('ControllerMessage') != '' ) 
    		{
			?>
				<p style="color: red;"><?php echo $this->session->flashdata('ControllerMessage'); ?></p>
			<?php 
			} 
			?>
			<?php
			$atributos = array( 'id' => 'form','name'=>'form');;
			echo form_open(null,$atributos);
			?>
			<?php echo validation_errors(); ?>
		
			
		
			<div class="clear"></div>
			
			<form action="#" method="POST" id="login-form">
		
			<fieldset>

				<p>
					<label for="login-username">Usuario</label>
					<input type="text" name="login" value="<?php echo set_value("login")?>" />
				</p>

				<p>
					<label for="login-password">Contraseña</label>
					<input type="password" name="pass" value="<?php echo set_value("pass")?>" />
				</p>
				
				<input type="submit" value="Enviar" title="Enviar" />
				<a href="dashboard.html" class="button round blue image-right ic-right-arrow">Ingresar</a>

			</fieldset>

			<br/><div class="information-box round">Una vez ingresado su usuario y contraseña haga click en iniciar sesion.</div>

		</form>
		</div>
		
		<div id="content-bottom"></div>
	
		<div id="footer">
			<p id="links">
				<a href="#">Nosotros</a>
			</p>
			<p>Copyright &copy; Grupo 05; Felipe Alvarez, Juan Cortez, Christopher Salvatierra</p>
		</div>
	</div>	
</body>
</html>