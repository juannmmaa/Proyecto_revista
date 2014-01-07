<?php
//con estas condiciones se haran las valdiaciones de los datos ingresados en los formularios
/*
aqui es donde se le dan los tipos de datos que deben ser ingresados en los formularios y si es que son o no estrictamente
requeridos para ser agregados a la base de datos
*/
$config=array
(
  //validacion para la creacion de usuarios
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

     //validacion para la creacion de articulos
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

     //validacion para la creacion de categorias
     'usuarios/nueva_categoria'
     =>array(

            array('field' => 'nombre',            'label' => 'Nombre',    
           'rules' => 'required|is_string|trim|xss_clean'),
            array('field' => 'descripcion',            'label' => 'Descripcion',    
           'rules' => 'required|is_stringtrim|xss_clean'),
            
      ),

     //validacion para la edicion de usuario, este esta aparte ya que al momento de editar usuario no tenemos los mismos campos que al crearlo
      'usuarios/usuario_editado'
     =>array(

            array('field' => 'nombres',            'label' => 'Nombres',    
           'rules' => 'required|is_string|trim|xss_clean'),
            array('field' => 'apellidos',            'label' => 'Apellidos',    
           'rules' => 'required|is_string|trim|xss_clean'),
            array('field' => 'rut',           'label' => 'Rut',   
           'rules' => 'required|is_string|trim|xss_clean'),
            
      ),
);

?>

