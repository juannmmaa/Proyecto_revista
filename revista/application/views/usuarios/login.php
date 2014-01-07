<div>
    <div id="wrap">
        <div id="logo">
            <h1>Revista Digital UTEM</h1>
            <p>Proyecto Ingenieria de Software - Grupo 05</p>
        </div>

        <div id="explore">
            <a href="<?php echo base_url() ?>usuarios/login" id="explore-link" id="explore-link">Iniciar Sesion</a>
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
            <div id="pitch">
                
                <p>En este sitio encontrar&aacutes variada informaci&oacuten sobre nuestra escuela de Inform&aacutetica, podr&aacutes encontrar desde anuncios, hasta noticias de presentaciones o exposiciones patrocinadas por nuestra escuela.</p>
            </div>
            <?php
            if ($this->session->flashdata('ControllerMessage') != '') {
                ?>
                <p style="color: red;"><?php echo $this->session->flashdata('ControllerMessage'); ?></p>
                <?php
            }
            ?>
            <?php
            $atributos = array('id' => 'form', 'name' => 'form');
            ;
            echo form_open(null, $atributos);
            ?>
            <?php echo validation_errors(); ?>


            <div class="clear"></div>

            <form action="#" method="POST" id="login-form">
                <center>
                <fieldset>
                    
                    <p>
                        <label for="login-username">Usuario</label>
                        <input type="text" name="login" value="<?php echo set_value("login") ?>" />
                    </p>

                    <p>
                        <label for="login-password">Contraseña</label>
                        <input type="password" name="pass" value="<?php echo set_value("pass") ?>" />
                    </p>

                    <input type="submit" align="center" value="  Enviar" title="Enviar"  />
                    <!--<a href="dashboard.html" class="button round blue image-right ic-right-arrow">Ingresar</a>-->

                </fieldset>
                
                <br/><div class="information-box round">Una vez ingresado su usuario y contraseña haga click en iniciar sesion.</div>
                </center>
            </form>
        </div>

        <div id="content-bottom"></div>

        <div id="footer">
            <p id="links">
                <a href="<?php echo base_url() ?>index/nosotros">Nosotros</a>
            </p>
            <p> Grupo 05; Felipe Alvarez, Juan Cortez, Christopher Salvatierra</p>
        </div>
    </div>	
</div>