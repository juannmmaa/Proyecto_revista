<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contacto extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->layout->setLayout('template1');
    }

    /*
    este controlador es el encargado de realizar las acciones para la vista de contacto
    */
    
	public function index()
	{
        $cerrar = $this->usuarios_model->cerrar_sesion();//en caso de que este abierta una sesion de usuario esta es cerrada 
        $categorias = $this->index_model->lista_categorias(); //lista las categorias para enviarlas a la vista
        $this->layout->view('formulario_contacto',compact("cerrar","categorias"));//ambas variables se envian a la vista para que sean utilizadas

        
	}
       
    
}

