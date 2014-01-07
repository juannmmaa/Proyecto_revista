
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
<br/>
<br/>
<center>
<p style="font-size: 250%;"> Registro de Articulos</p>
</center>
<p>
	<a href ="<?php echo base_url()?>usuarios/articulo_nuevo" > Crear un nuevo articulo </a>

</p>
<?php if($this->session->flashdata('ControllerMessage') != '')
		{
?>			
		<p style="color: red;" ><?php echo $this->session->flashdata('ControllerMessage');?> </p>
<?php		
		}
?>
<table >
	
	<tr style ="background-color:#000000; color:#ffffff ">
		<th>PK</th>
		<th>Titulo</th>
		<th>Bajada</th>
		<th>Noticia</th>
		<th>Fecha</th>
		<th>Autor_fk</th>
		<th>Categoria_fk</th>
		<th>Imagen</th>
		<th>Acciones</th>
	</tr>
	<?php
		foreach ($datos as $dato)
		{
			?>
			<tr style ="background-color:#f0f0f0;">
				<td> 
					<?php echo $dato->pk ?> 
					<br/>
					<a href="<?php echo base_url() ?>index/mostrar_noticia_completa/<?php echo $dato->pk ?> ">Ver</a>
				</td>

				<td> <?php echo $dato->titulo ?> </td>
				<td> <?php echo $dato->bajada ?> </td>
				<td> <?php echo $dato->noticia ?> </td>
				<td> <?php echo $dato->fecha ?> </td>
				<td> <?php echo $dato->autor_fk ?> </td>
				<td> <?php echo $dato->categoria_fk ?> </td>
				<td> <?php echo $dato->imagen ?> </td>
				<td>
					<a href="<?php echo base_url()?>usuarios/validar_editar_art/<?php echo $dato->pk?>">Editar</a> || <a href="<?php echo base_url()?>usuarios/validar_delete_art/<?php echo $dato->pk?>">Eliminar</a>
				</td>
			</tr>
			<?php
		}
	?>

</table>

<input type="button" name="Atras" value="Atrás" onClick="location.href='<?php echo base_url() ?>usuarios'" />