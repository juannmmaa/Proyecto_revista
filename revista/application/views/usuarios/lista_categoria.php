
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
<p style="font-size: 250%;"> Registro de Categorias</p>
</center>

<p>
	<a href ="<?php echo base_url()?>usuarios/nueva_categoria" > Crear un nueva categoria </a>

</p>
<?php if($this->session->flashdata('ControllerMessage') != '')
		{
?>			
		<p style="color: red;" ><?php echo $this->session->flashdata('ControllerMessage');?> </p>
<?php		
		}
?>
<table>
	<tr style ="background-color:#000000; color:#ffffff">
		<th> PK </th>
		<th>Nombre</th>
		<th>Descripcion</th>
		<th>Acciones</th>
	</tr>
	<?php
		foreach ($datos as $dato)
		{
			?>
			<tr style ="background-color:#f0f0f0;">
				<td> <?php echo $dato->pk ?> </td>
				<td> <?php echo $dato->nombre ?> </td>
				<td> <?php echo $dato->descripcion ?> </td>
				<td>
					<a href="<?php echo base_url()?>usuarios/validar_editar_cat/<?php echo $dato->pk?> ">Editar</a>|| <a href="<?php echo base_url()?>usuarios/validar_delete_cat/<?php echo $dato->pk?>">Eliminar</a>
				</td>
			</tr>
			<?php
		}
	?>

</table>

<input type="button" name="Atras" value="Atrás" onClick="location.href='<?php echo base_url() ?>usuarios'" />