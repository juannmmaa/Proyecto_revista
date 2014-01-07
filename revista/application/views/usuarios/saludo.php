

<div id="logo">
            <h1>Revista Digital UTEM</h1>
            <p>Proyecto Ingenieria de Software - Grupo 05</p>
        </div>
<div id="content-top"></div>
    <div id='cssmenu'>
bienvenid@ <?php echo $nombre ?>
 &nbsp
<a href="<?php echo base_url() ?>usuarios/logout">Cerrar Sesión</a>
<ul>
   <li class='active'><a href="<?php echo base_url() ?>index"><span>Inicio</span></a></li>
   <li class='has-sub'><a href='#'><span>Noticias por categoria</span></a>
      <ul>
        <!-- <li><a href='#'><span>universidad</span></a></li>
         <li><a href='#'><span>Internacional</span></a></li>
         <li class='last'><a href='#'><span>Tecnologia</span></a></li>
     -->
                        <?php
                       foreach ($categorias as $categoria)  //para mostrar la lista de categorias que estan ingresadas en la bdd q
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
    
    
    
    <div id="content" align="center">
    
    
        
            <font size="3">
                <a href="<?php echo base_url() ?>usuarios/articulo_nuevo/" class="button round blue image-center">Subir Articulo</a>        
                &nbsp
                &nbsp
                <a href="<?php echo base_url() ?>usuarios/listar_articulo" class="button round blue image-center">Lista de Noticias</a>
                &nbsp
                &nbsp
                <a href="<?php echo base_url() ?>usuarios/nueva_categoria" class="button round blue image-center">Ingresar Categoria</a>
                <br/>
                <br/>
                <br/>
                <a href="<?php echo base_url() ?>usuarios/listar_categoria" class="button round blue image-center">Lista de Categorias</a>
                &nbsp
                &nbsp
                <a href="<?php echo base_url() ?>usuarios/usuario" class="button round blue image-center">Crear Nuevo Administrador</a>
                &nbsp
                &nbsp
                <a href="<?php echo base_url() ?>usuarios/listar" class="button round blue image-center" >Lista de Administradores</a>
                <br/>
                <br/>
                
            </font>
    

    </div>
    