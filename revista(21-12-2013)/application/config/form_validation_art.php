<?php
$config=array
(
     'usuarios/nuevo_articulo'
     =>array(

            array('field' => 'titulo',            'label' => 'Titulo',    
           'rules' => 'required|is_string|trim|xss_clean'),
            array('field' => 'bajada',            'label' => 'Bajada',    
           'rules' => 'required|is_string|trim|xss_clean'),
            array('field' => 'noticia',           'label' => 'Noticia',   
           'rules' => 'required|is_string|trim|xss_clean'),
            array('field' => 'fecha',            'label' => 'Fecha',    
           'rules' => 'required|is_string|trim|xss_clean'),
            array('field' => 'autor_fk',            'label' => 'Autor_fk',    
           'rules' => 'required|is_string|trim|xss_clean'),
            array('field' => 'categoria_fk',           'label' => 'Categoria_fk',   
           'rules' => 'required|trim|xss_clean'),

      ),

);