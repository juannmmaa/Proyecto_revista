
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
	<p style="font-size: 250%;">CONTACTANOS</p>
	</center>
	
		<?php
if (!isset($_POST['email'])) {
?>
  <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
   <center>
   <label>
      Nombre: <br/>
      <input name="nombre" type="text" />
    </label>
    <br/>
    <br/>
    <label>
      Email: <br/>
      <input name="email" type="text" />
    </label>
    <br/>
    <br/>
    <label>
      Mensaje: <br/>
      <textarea name="mensaje" rows="6" cols="50"></textarea>
    </label>
    <br/>
    <br/>
    <input type="submit" value="Enviar" />
    <input type="reset" value="Borrar" />
    
  </form>
  </center>
<?php
}else{
  $mensaje="Mensaje del formulario de contacto de nnatali.com";
  $mensaje.= "\nNombre: ". $_POST['nombre'];
  $mensaje.= "\nEmail: ".$_POST['email'];
  $mensaje.= "\nTelefono: ". $_POST['telefono'];
  $mensaje.= "\nMensaje: \n".$_POST['mensaje'];
  $destino="revistautem@hotmail.com";
  //$destino= "tuemail@loquesea.com";
  $remitente = $_POST['email'];
  $asunto = "Mensaje enviado por: ".$_POST['nombre'];
  mail($destino,$asunto,$mensaje,"FROM: $remitente");
?>

<?php
}
?>
		
		
	
		<div id="footer">
            <p id="links">
                <a href="<?php echo base_url() ?>index/nosotros">Nosotros</a>
            </p>
            <p> Grupo 05; Felipe Alvarez, Juan Cortez, Christopher Salvatierra</p>
        </div>
	</div>	
