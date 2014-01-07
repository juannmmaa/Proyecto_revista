
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
			<div id="pitch">
				
				<p>En este sitio encontrar&aacutes variada informaci&oacuten sobre nuestra escuela de Inform&aacutetica, podr&aacutes encontrar desde anuncios, hasta noticias de presentaciones o exposiciones patrocinadas por nuestra escuela.</p>
			</div>
		
		
			<h1>La noticia que esta solicitando no existe</h1>
			
		
			<div class="clear"></div>
			
			
		
		<div id="content-bottom"></div>
	
		<div id="footer">
            <p id="links">
                <a href="<?php echo base_url() ?>index/nosotros">Nosotros</a>
            </p>
            <p> Grupo 05; Felipe Alvarez, Juan Cortez, Christopher Salvatierra</p>
        </div>
	</div>	

