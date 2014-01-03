{ñ}
<div>
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
                <li class='has-sub'><a href='#'><span>Noticias</span></a>
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
                <li class='has-sub'><a href='#'><span>Company</span></a>
                    <ul>
                        <li><a href='#'><span>About</span></a></li>
                        <li class='last'><a href='#'><span>Location</span></a></li>
                    </ul>
                </li>
                <li class='last'><a href="<?php echo base_url() ?>contacto"><span>Contact</span></a></li>
            </ul>
        </div>


        <div id="content-middle">
            <div id="pitch">
                <h1>Duis aute irure reprehenderit in voluptate velit<br /><span>exercitation ullamco</span></h1>
                <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit.</p>
            </div>

            <?php
            foreach ($datos as $dato) {
                ?>

                <div class="column">

                    <h3><?php echo $dato->titulo ?></h3>
                    <?php echo $dato->fecha?>
                    <?php 
                    if($dato->imagen == null)// en caso de que el campo de la imagen venga vacio se pondra una imagen demo
                    {
                        ?>
                        <img src="<?php echo base_url() ?>/public/images/thumb.gif" width='250' height='250' alt="Thumb" />
                        <?php
                    }
                    else //en caso contrario se carga la imagen correspondiente al articulo
                    {
                        ?>
                        <img src="<?php echo base_url() ?>/uploads/archivos/<?php echo $dato->imagen ?> "  width='250' height='250' alt="Thumb" />
                        <?php
                    }
                    ?>
                    <p><?php echo $dato->bajada ?></p>
                    <p class="more"><a href="<?php echo base_url() ?>index/mostrar_noticia_completa/<?php echo $dato->pk ?> ">Ver mas</a></p>
                </div>

                <?php
            }
            ?>
            
            <div class="clear"></div>
        </div>
        <p>
            <center>
                <?php echo $this->pagination->create_links()?>
            </center>
        </p>
        <div id="content-bottom"></div>

        <div id="footer">
            <p id="links">
                <a href="#">Nosotros</a>
            </p>
            <p>Copyright &copy; Grupo 05; Felipe Alvarez, Juan Cortez, Christopher Salvatierra</p>
        </div>
    </div>	
</div>