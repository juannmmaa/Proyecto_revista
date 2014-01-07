

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
        <div id="content-middle">
			
		
	<!-- MAIN CONTENT -->
	<div id="content">
<center>
<p style="font-size: 250%;"> Editar Articulo</p>

<?php

	$atributos = array('pk' => 'form', 'nombre' =>'form');
	echo form_open_multipart(null,$atributos);
?>
<?php echo validation_errors(); ?>

<p>
	Titulo: <input type="text" name="titulo" value="<?php echo $datos->titulo?>" />
	</p>
	<p>
	Bajada: 
	<br/><!--<input type="text" name="bajada" value="<?php //echo $datos->bajada?>" />-->
	<textarea name="bajada" rows="6" cols="50"></textarea>
	</p>
	<p>
	Noticia: 
	<br/><!--<input type="text" name="noticia" value="<?php //echo $datos->noticia?>" />-->
	<textarea name="noticia" rows="6" cols="50"></textarea>
	</p>
	<p>
	Fecha: <input type="date" name="fecha" value="<?php echo $datos->fecha?>" />
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
	Escritor: <input type="text" name="autor_fk" value="<?php echo $datos->autor_fk?>" />
	<br/>
	(ingrese su codigo)
	</p>
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
	<p>
	Categoria: <input type="text" name="categoria_fk" value="<?php echo $datos->categoria_fk?>" />
	</p>
	(ingrese el numero de la categoria)

</p>
<input type="hidden" name="pk" value="<?php echo $pk?>" />
<input type ="submit" value ="Enviar" title="Enviar" />


<a href="<?php echo base_url()?>usuarios">Atras</a> 
</center>
<!--<input type="button" name="Atras" value="Atrás" onClick="location.href='usuarios/saludo'" />-->

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