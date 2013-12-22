<?php

$config=array
(
     'usuarios/usuario'
     =>array(

            array('field' => 'nombres',            'label' => 'Nombres',    
           'rules' => 'required|is_string|trim|xss_clean'),
            array('field' => 'apellidos',            'label' => 'Apellidos',    
           'rules' => 'required|is_string|trim|xss_clean'),
            array('field' => 'rut',           'label' => 'Rut',   
           'rules' => 'required|is_string|trim|xss_clean'),
            array('field' => 'login',            'label' => 'Login',    
           'rules' => 'required|is_string|trim|xss_clean'),
            array('field' => 'pass',            'label' => 'Pass',    
           'rules' => 'required|is_string|trim|xss_clean'),
          
      ),

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
     'usuarios/nueva_categoria'
     =>array(

            array('field' => 'nombre',            'label' => 'Nombre',    
           'rules' => 'required|alpha|trim|xss_clean'),
            array('field' => 'descripcion',            'label' => 'Descripcion',    
           'rules' => 'required|alpha|trim|xss_clean'),
            
      ),
);

?>

