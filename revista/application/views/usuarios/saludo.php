bienvenid@ <?php echo $nombre?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<meta name="author" content="Juanma" />
	<link rel="stylesheet" href="public/css/contacto.css" type="text/css" />
	
	<title>Revista Digital </title>
</head>
<body>
<br />
<a href="<?php echo base_url()?>usuarios/logout">Cerrar Sesión</a>
<br />
<br />

<a href ="<?php echo base_url()?>usuarios/usuario" > Crear un nuevo administrador </a>

<br />
<a href ="<?php echo base_url()?>usuarios/listar" >Lista de administradores </a>

<br />
<a href="<?php echo base_url()?>usuarios/articulo_nuevo"> Subir un articulo</a>


<br />
<a href="<?php echo base_url()?>usuarios/listar_articulo"> Lista de Noticias</a>

<br />
<a href="<?php echo base_url()?>usuarios/nueva_categoria"> Ingresar una categoria</a>

<br />
<a href="<?php echo base_url()?>usuarios/listar_categoria"> Lista de categorias</a>
</body>
</html>
