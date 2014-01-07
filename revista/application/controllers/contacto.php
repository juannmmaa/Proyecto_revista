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
        $categorias = $this->index_model->lista_categorias();
        $this->layout->view('formulario_contacto',compact("cerrar","categorias"));

        
	}
       
    /*public function enviar()
    {
      $this->load->model('contacto_model');
         if($this->input->post()) 
        {
           $data = array
                        (

                                'nombre'=>$this->input->post("nombre",true),
                                'email'=>$this->input->post("email",true),
                                'mensaje'=>$this->input->post("mensaje",true)
                                 
                        );
            $nombre = $this->input->post("nombre",true);
            $email = $this->input->post("email",true);
            $mensaje = $this->input->post("mensaje",true);
            
           // $enviar = $this->contacto_model->enviar_mail($nombre,$email,$mensaje);

        }

    }
    */
}

