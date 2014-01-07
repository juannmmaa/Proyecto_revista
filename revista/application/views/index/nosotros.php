<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<meta name="author" content="Juanma" />
	<link rel="stylesheet" href="css/main.css" type="text/css" />
	<title>Revista Digital </title>
</head>
<div>
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
 <br/>           
<center>
<h1> GRUPO 05 - INGENIERIA DE SOFTWARE </H1>
<br/>

Somos tres estudiantes de la carrera ingenier&iacutea civil en inform&aacutetica, que estamos cursando cuarto a&ntildeo. 
La realizaci&oacuten de este proyecto fue una idea inspirada en la poca divulgaci&oacuten de la informaci&oacuten dentro de la universidad 
o los nulos canales con los que los alumnos disponen. Tenemos la idea de satisfacer estas necesidades a trav&eacutes de este 
proyecto, el cual queremos que satisfaga y mantenga en contacto continuo a todos los estamentos de la facultad.


</center>
          
            
            <div class="clear"></div>
        </div>
     
      

        <div id="footer">
            <p id="links">
                <a href="<?php echo base_url() ?>index/nosotros">Nosotros</a>
            </p>
            <p> Grupo 05; Felipe Alvarez, Juan Cortez, Christopher Salvatierra</p>
        </div>
    </div>	
</div>