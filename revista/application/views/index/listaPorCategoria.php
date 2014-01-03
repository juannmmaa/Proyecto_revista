 <h1> NOTICIAS DE LA CATEGORIA <?php echo $nom_categoria->nombre?></h1>
 <h2>DESCRIPCION: <?php echo $nom_categoria->descripcion ?></h2>

  <?php
            foreach ($datos as $dato) {
                ?>

                <div class="column">

                    <h3><?php echo $dato->titulo ?></h3>
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
                    <!--<p> <?php //echo $dato->categoria_fk?> </p>-->
                </div>

                <?php
            }
            ?>