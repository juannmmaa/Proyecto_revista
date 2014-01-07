

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
			<center>
<p style="font-size: 300%;"> Subir Noticia </p>
			</center>

<?php

	$atributos = array('pk' => 'form', 'nombre' =>'form');
	echo form_open_multipart(null,$atributos);
?>
<?php echo validation_errors(); ?>
<p>
	TItulo: <input type="text" name="titulo" maxlength="30" value="<?php echo set_value("titulo")?>" />
	<br/>
	<br/>
	Bajada:
	<br/>
	
	<!-- <input type="text" name="bajada" style="width:500px ; height: 100px" value="<?php //echo set_value("bajada")?>" />-->
	<textarea name="bajada" rows="6" cols="50" maxlength="45"></textarea>
	<br/>
	<br/>
	Noticia:
	<br/>
	 <!--<input type="text" name="noticia" style="width:500px ; height: 100px" value="<?php //echo set_value("noticia")?>" />-->
	<textarea name="noticia" rows="6" cols="50"></textarea>
	<br/>
	<br/>
	Imagen: 
	<?php 
		$datos = array(
						'name' =>'file',
						'type' =>'file',
						'id' => 'file'/*,
						'maxlength' =>'100',*/

			);
		echo form_input($datos,'');	
	?>
	<br/>
	<br/>
	Fecha: <input type="date" name="fecha" value="<?php echo set_value("fecha")?>" />
	<br/>
	<br/>
	<br/>

	<select name=mytextarea>
		
		<?php
                foreach ($escritores as $escritor) 
                {
                ?>
                <option name="<?php echo $escritor->nombres ?> " value="<?php echo $escritor->pk ?> "> <?php echo $escritor->nombres. "  ".$escritor->apellidos. " - " .$escritor->pk ?> </option>
                  <!--<li><a href="<?php //echo base_url() ?>index/lista_por_categoria/<?php //echo $categoria->pk ?> "><span><?php //echo $categoria->nombre?> </span></a></li>-->
                <?php
                }
        ?>
     	 

	</select>
	<br/>
	Escritor: <input type="text" name="autor_fk" value="<?php echo set_value("autor_fk")?>" /> 
	<br/>
	(ingrese su codigo)
	<br/>
	<br/>
	<br/>
	<select name=mytextarea>
		
		<?php
                foreach ($categorias as $categoria) 
                {
                ?>
                <option name="<?php echo $categoria->nombre ?> " value="<?php echo $categoria->pk ?> "> <?php echo $categoria->nombre. " - " .$categoria->pk ?> </option>
                  <!--<li><a href="<?php //echo base_url() ?>index/lista_por_categoria/<?php //echo $categoria->pk ?> "><span><?php //echo $categoria->nombre?> </span></a></li>-->
                <?php
                }
        ?>
	</select>
	<br/>
	Categoria: <input type="text" name="categoria_fk" value="<?php echo set_value("categoria_fk")?>" />
	
	<br/>
	(ingrese el numero de la categoria)

</p>

<center>
	<br/>

<input type ="submit" value ="Enviar" title="Enviar" />

<input type="button" name="Atras" value="Atrás" onClick="location.href='<?php echo base_url() ?>usuarios'" />
</center>

<?php
echo form_close();
?>

		
	</div> <!-- end content -->
		
		<div id="content-bottom"></div>
	</center>
	
		<div id="footer">
            <p id="links">
                <a href="<?php echo base_url() ?>index/nosotros">Nosotros</a>
            </p>
            <p> Grupo 05; Felipe Alvarez, Juan Cortez, Christopher Salvatierra</p>
        </div>
	</div>	