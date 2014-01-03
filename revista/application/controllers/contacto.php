<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contacto extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->layout->setLayout('template1');
    }
    
	public function index()
	{
        $cerrar = $this->usuarios_model->cerrar_sesion();
        
        $this->layout->view('formulario_contacto',compact("cerrar"));
	}
    
    public function enviar()
    {
          $data = array
                        (
                                'nombre'=>$this->input->post("nombre",true),
                                'correo'=>$this->input->post("correo",true),
                                'texto'=>$this->input->post("texto",true)
                            
                        );
         //$enviar= $this->contacto_model->enviar_correo($data);
         $this->layout->view('formulario_contacto',compact("data"));
    }
}
