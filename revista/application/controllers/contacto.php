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
        $this->layout->view('formulario_contacto',"cerrar");
	}
    
    public function enviar()
    {
    	 
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */