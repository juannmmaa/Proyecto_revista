<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usuarios extends CI_Controller {

	private $session_id;
    public function __construct()
    {
        parent::__construct();
        $this->layout->setLayout('template1');
        $this->session_id = $this->session->userdata('login');
    }
    
	public function index()
	{
		if(!empty($this->session_id))
        {
             $nombre = $this->session_id;
             $this->layout->view('saludo',compact("nombre"));   
              

        }else
        {
            redirect(base_url().'usuarios/login',  301);
        }
        
	}
 
    public function login()
    {
        if ( $this->input->post() )
        {
            $datos=$this->usuarios_model->logueo($this->input->post("login",true),/*sha1*/($this->input->post("pass",true)));
           if($datos==1)
           {
                $this->session->set_userdata("taller_ci");
                $this->session->set_userdata('login', $this->input->post('login',true));
                redirect(base_url().'usuarios',  301);
           }else
           {
            $this->session->set_flashdata('ControllerMessage', 'Usuario y/o clave inválida.');
					           redirect(base_url().'usuarios/login',  301);
           }
        }
        $this->layout->view("login");
    }
    public function logout()
    {
            $this->session->unset_userdata(array('login' => ''));
            $this->session->sess_destroy("taller_ci");
            redirect(base_url().'index',  301);
    }
  
     public function usuario()
        {
           
            if($this->input->post())
            {
               if ($this->form_validation->run("usuarios/usuario"))
                {

                    $data = array
                        (

                                'nombres'=>$this->input->post("nombres",true),
                                'apellidos'=>$this->input->post("apellidos",true),
                                'rut'=>$this->input->post("rut",true),
                                'login'=>$this->input->post("login",true),
                                'pass'=>$this->input->post("pass",true)
                        );
                    $rut=$this->input->post('rut');//esta tomando el valor del campo rut 
                    $validar=$this->usuarios_model->valida_rut($rut); //envia correctamente 
                    //if($validar ==true)
                    //{
                        $guardar = $this->usuarios_model->agregar($data);
                        if($guardar)
                        {
                                $this->session->set_flashdata('ControllerMessage', 'Se ha agregado el adminsitrador exitosamente');
                                redirect(base_url().'usuarios/listar',301);
                        }
                        else
                        {
                            $this->session->set_flashdata('ControllerMessage', 'Se ha producido un error, intente nuevamente');
                            redirect(base_url().'usuarios/usuario',301);
                        }
                    //}
                    //else
                    //{
                      //  echo ("el rut ingresado posiblemente es invalido intente nuevamente");
                    //}
                }
            }
            
            $this->layout->view("crear_usuario");
        }
    public function listar()
    {
        $datos=$this->usuarios_model->lista();
        $this->layout->view('registros',compact("datos"));
    }
    
    public function listar_articulo()
    {
        $datos=$this->usuarios_model->lista_articulo();
        $this->layout->view('lista_articulo',compact("datos"));
    }

    public function listar_categoria()
    {
        $datos=$this->usuarios_model->lista_categoria();
        $this->layout->view('lista_categoria',compact("datos"));
    }

    public function articulo_nuevo($pk=null)
    {
        if($this->input->post()) 
        {
            if ($this->form_validation->run("usuarios/nuevo_articulo"))
            {    
                $data = array
                    (
                            'titulo'=>$this->input->post("titulo",true),
                            'bajada'=>$this->input->post("bajada",true),
                            'noticia'=>$this->input->post("noticia",true),
                            'fecha'=>$this->input->post("fecha",true),
                            'autor_fk'=>$this->input->post("autor_fk",true),
                            'categoria_fk'=>$this->input->post("categoria_fk",true)
                    );
                $guardar = $this->usuarios_model->agregar_articulo($data);
                if($guardar)
                {
                        $this->session->set_flashdata('ControllerMessage', 'Se ha agregado el articulo exitosamente');
                        redirect(base_url().'usuarios/listar_articulo',301);
                }
                 else
                 {
                        $this->session->set_flashdata('ControllerMessage', 'Se ha producido un error, intente nuevamente');
                        redirect(base_url().'usuarios/articulo_nuevo',301);
                }

            }
        }
        
        $this->layout->view("nuevo_articulo");
    }
    public function nueva_categoria()
    {
        
        if($this->input->post())
        {
            if ($this->form_validation->run("usuarios/nueva_categoria"))
            {
                $data = array
                        (
                                'nombre'=>$this->input->post("nombre",true),
                                'descripcion'=>$this->input->post("descripcion",true)
                            
                        );
                $guardar = $this->usuarios_model->agregar_categoria($data);
                if($guardar)
                        {
                            $this->session->set_flashdata('ControllerMessage', 'Se ha agregado la categoria exitosamente');
                            redirect(base_url().'usuarios/listar_categoria',301);
                        }
                else
                    {
                        $this->session->set_flashdata('ControllerMessage', 'Se ha producido un error, intente nuevamente');
                        redirect(base_url().'usuarios/agregar_categoria',301);
                    }
            }

        }
        
        $this->layout->view("crear_categoria");
        
    }
    public function edit_usuario($pk=null)
    {
        if(!$pk)
        {
            show_404();            
        }
            if($this->input->post()) 
            {
               
                if ($this->form_validation->run("usuarios/usuario"))
                {
                    $data=array
                   (
                        'nombres'=>$this->input->post("nombres",true),
                        'apellidos'=>$this->input->post("apellidos",true),
                        'rut'=>$this->input->post("rut",true),
                        'login'=>$this->input->post("login",true),
                        'pass'=>$this->input->post("pass",true)
                   );
                   $guardar=$this->usuarios_model->modificar_usuario($data,$pk);
                    if($guardar)
                    {
                         
                         $this->session->set_flashdata("ControllerMessage","Se ha editado el registro exitosamente");
                            redirect(base_url()."usuarios/listar",310);
                    }else
                    {
                         
                         $this->session->set_flashdata("ControllerMessage","Se ha producido un error. Inténtelo nuevamente por favor.");
                        redirect(base_url()."usuarios/listar",310);
                    }
                }
                
                    
            }
       $datos=$this->usuarios_model->getPersonaPorPk($pk);
        if(sizeof($datos)==0)
        {
            show_404();
        }
        $this->layout->view("editar_usuario",compact("pk","datos"));
    }
     public function delete_usuario($pk=null)
    {
        if(!$pk)
        {
            show_404();
        }
        $guardar=$this->usuarios_model->eliminar_persona($pk);
        if($guardar)
        {
            $this->session->set_flashdata("ControllerMessage","Se ha eliminado el registro exitosamente");
            redirect(base_url()."usuarios/listar",310);
        }else
        {
            $this->session->set_flashdata("ControllerMessage","Se ha producido un error. Inténtelo nuevamente por favor.");
            redirect(base_url()."usuarios/listar",310);
        }
    }
    public function delete_categoria($pk=null)
    {
        if(!$pk)
        {
            show_404();
        }
        $guardar=$this->usuarios_model->eliminar_categoria($pk);
        if($guardar)
        {
            $this->session->set_flashdata("ControllerMessage","Se ha eliminado el registro exitosamente");
            redirect(base_url()."usuarios/listar_categoria",310);
        }else
        {
            $this->session->set_flashdata("ControllerMessage","Se ha producido un error. Inténtelo nuevamente por favor.");
            redirect(base_url()."usuarios/listar_categoria",310);
        }
    }
    public function delete_articulo($pk=null)
    {
        if(!$pk)
        {
            show_404();
        }
        $guardar=$this->usuarios_model->eliminar_articulo($pk);
        if($guardar)
        {
            $this->session->set_flashdata("ControllerMessage","Se ha eliminado el registro exitosamente");
            redirect(base_url()."usuarios/listar_articulo",310);
        }else
        {
            $this->session->set_flashdata("ControllerMessage","Se ha producido un error. Inténtelo nuevamente por favor.");
            redirect(base_url()."usuarios/listar_articulo",310);
        }
    }
    public function edit_categoria($pk=null)
    { 
       if(!$pk)
        {
            show_404();            
        }
            if($this->input->post()) 
            {
                if ($this->form_validation->run("usuarios/nueva_categoria"))
                {
                    $data=array
                   (
                        'nombre'=>$this->input->post("nombre",true),
                        'descripcion'=>$this->input->post("descripcion",true)
                   );
                   $guardar=$this->usuarios_model->modificar_categoria($data,$pk);
                    if($guardar)
                    {
                         
                         $this->session->set_flashdata("ControllerMessage","Se ha editado el registro exitosamente");
                        redirect(base_url()."usuarios/listar_categoria",310);
                    }else
                    {
                         
                         $this->session->set_flashdata("ControllerMessage","Se ha producido un error. Inténtelo nuevamente por favor.");
                         redirect(base_url()."usuarios/listar_categoria",310);
                    }
                }
                    
            }
       $datos=$this->usuarios_model->getCategoria($pk);

        if(sizeof($datos)==0)
        {
            show_404();
        }
        
        $this->layout->view("editar_categoria",compact("pk","datos"));
    }
    public function edit_articulo($pk=null)
    {
        if(!$pk)
        {
            show_404();            
        }
           if($this->input->post()) 
            {
                if ($this->form_validation->run("usuarios/nuevo_articulo"))
                {
                    $data = array
                            (
                                'titulo'=>$this->input->post("titulo",true),
                                'bajada'=>$this->input->post("bajada",true),
                                'noticia'=>$this->input->post("noticia",true),
                                'fecha'=>$this->input->post("fecha",true),
                                'autor_fk'=>$this->input->post("autor_fk",true),
                                'categoria_fk'=>$this->input->post("categoria_fk",true)
                            );
                    $guardar = $this->usuarios_model->modificar_articulo($data,$pk);
                    if($guardar)
                    {
                            $this->session->set_flashdata('ControllerMessage', 'Se ha editado el articulo exitosamente');
                            redirect(base_url().'usuarios/listar_articulo',301);
                    }
                    else
                    {
                            $this->session->set_flashdata('ControllerMessage', 'Se ha producido un error, intente nuevamente');
                            redirect(base_url().'usuarios/articulo_nuevo',301);
                    }
                }
            }

        $datos=$this->usuarios_model->getArticulo($pk);
        if(sizeof($datos)==0)
        {
            show_404();
        }
        $this->layout->view("editar_articulo",compact("pk","datos"));
    }

   
}
