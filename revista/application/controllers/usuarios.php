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
            $categorias = $this->index_model->lista_categorias();
             $nombre = $this->session_id;
             $this->layout->view('saludo',compact("nombre","categorias"));   
              

        }else
        {
            redirect(base_url().'usuarios/login',  301);
        }
        
	}
 
    public function login()
    {
        if ( $this->input->post() )
        {
            $datos=$this->usuarios_model->logueo($this->input->post("login",true),sha1($this->input->post("pass",true))); //envia la contraseña encriptada 
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
        $categorias = $this->index_model->lista_categorias();
        $this->layout->view("login",compact("categorias"));
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
                                'pass'=>sha1($this->input->post("pass",true)) //guarda contraseña encriptada en sha1
                        );

                    $rut=$this->input->post('rut');//esta tomando el valor del campo rut 
                    $existe = $this->usuarios_model->existeAdmin($rut);//valida si es que el usuario existe o no

                    if($existe != null)
                    {
                        $this->session->set_flashdata('ControllerMessage', 'El RUT que ingreso ya existe en nuestros registros');
                        redirect(base_url().'usuarios/listar',301);
                    }
                    if($existe == null) //si el usuario no existe realiza los procedimientos para guardar los datos del usuario ingresado
                    {
                        $validar_si_tiene_k = $this->usuarios_model->validar_k($rut);
                        if($validar_si_tiene_k == true)
                        {
                        
                            $rut = trim($rut, 'k'); //saco la k del rut con lo cual me queda sin digito verificador
                            $calcular_digito = $this->usuarios_model->calculo_digito($rut); 
                            //echo $calcular_digito; //comprueba que el calulo del digito es correcto
                            if($calcular_digito == 10)
                            {
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
                            }
                            else
                            {
                                echo ("el rut ingresado posiblemente es invalido intente nuevamente");
                            }
                        }
                        else
                        {
                            $validar=$this->usuarios_model->valida_rut($rut); //envia correctamente 
                            if($validar ==true)
                            {
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
                            }
                            else
                            {
                                echo ("el rut ingresado posiblemente es invalido intente nuevamente");
                            }
                    
                        }                  
                    }
                    
                    

                }
                  
            }
        
            $categorias = $this->index_model->lista_categorias();
            $this->layout->view("crear_usuario",compact("categorias"));
        }
    public function listar()
    {
        $categorias = $this->index_model->lista_categorias();
        $datos=$this->usuarios_model->lista();
        $this->layout->view('registros',compact("datos","categorias"));
    }
    
    public function listar_articulo()
    {
        $categorias = $this->index_model->lista_categorias();
        $datos=$this->usuarios_model->lista_articulo();
        $this->layout->view('lista_articulo',compact("datos","categorias"));
    }

    public function listar_categoria()
    {
        $categorias = $this->index_model->lista_categorias();
        $datos=$this->usuarios_model->lista_categoria();
        $this->layout->view('lista_categoria',compact("datos","categorias"));
    }

    public function articulo_nuevo($pk=null)
    {
        if($this->input->post()) 
        {
            if ($this->form_validation->run("usuarios/nuevo_articulo"))
            {    

                //proceso la imagen
                $error=NULL;
                               //valido la foto
                 $config['upload_path'] = './uploads/archivos/';
                 $config['allowed_types'] = 'jpg|jpeg|png';
                 $config['max_size'] = '51200'; 
                 $config["overwrite"]=false;
                 $config['encrypt_name'] = true; 
                 $this->load->library('upload', $config);
                 if ( ! $this->upload->do_upload('file'))
                 {
                            $error = array('error' => $this->upload->display_errors());
                            $this->session->set_flashdata('ControllerMessage', $error["error"]);
                                        
                            }
                 if($error==null)
                 {
                    $ima = $this->upload->data();
                    $file_name = $ima['file_name'];
                 }
                     if(!$error==null)
                     {
                        //es requisito subir una foto de lo contrario nos arrojara algun error
                        echo ("la foto no se cargo, puede que el archivo no corresponda a jpg o jpeg o png");
                        
                     }
                     else
                     {
                        echo "file :".$file_name;
                          $data = array
                            (
                            'titulo'=>$this->input->post("titulo",true),
                            'bajada'=>$this->input->post("bajada",true),
                            'noticia'=>$this->input->post("noticia",true),
                            'fecha'=>$this->input->post("fecha",true),
                            'autor_fk'=>$this->input->post("autor_fk",true),
                            'categoria_fk'=>$this->input->post("categoria_fk",true),
                            'imagen' => $file_name
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
        }
        $escritores = $this->usuarios_model->lista();
        $categorias = $this->index_model->lista_categorias();
        $this->layout->view("nuevo_articulo",compact("categorias","escritores"));
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
        $categorias = $this->index_model->lista_categorias();
        $this->layout->view("crear_categoria",compact("categorias"));
        
    }
    public function edit_usuario($pk=null)
    {
       
        if(!$pk)
        {
            show_404();            
        }
            if($this->input->post()) 
            {
               
                if ($this->form_validation->run("usuarios/usuario_editado"))
                {
                   $data = array
                        (

                                'nombres'=>$this->input->post("nombres",true),
                                'apellidos'=>$this->input->post("apellidos",true),
                                'rut'=>$this->input->post("rut",true)
                                //'login'=>$this->input->post("login",true),
                                //'pass'=>sha1($this->input->post("pass",true))
                        );

                    $rut=$this->input->post('rut');//esta tomando el valor del campo rut 
                    
                   
                        $validar_si_tiene_k = $this->usuarios_model->validar_k($rut);
                        if($validar_si_tiene_k == true)
                        {
                            $rut = trim($rut, 'k'); //saco la k del rut con lo cual me queda sin digito verificador
                            $calcular_digito = $this->usuarios_model->calculo_digito($rut); 
                            //echo $calcular_digito; //comprueba que el calulo del digito es correcto
                            if($calcular_digito == 10)
                            {
                                $guardar = $this->usuarios_model->modificar_usuario($data,$pk);
                                if($guardar)
                                {
                                    $this->session->set_flashdata('ControllerMessage', 'Se ha editado el adminsitrador exitosamente');
                                    redirect(base_url().'usuarios/listar',301);
                                }
                                else
                                {
                                    $this->session->set_flashdata('ControllerMessage', 'Se ha producido un error, intente nuevamente');
                                    redirect(base_url().'usuarios/usuario',301);
                                }
                            }
                            else
                            {
                                echo ("el rut ingresado posiblemente es invalido intente nuevamente");
                            }
                        }
                        else
                        {
                            $validar=$this->usuarios_model->valida_rut($rut); //envia correctamente 
                            if($validar ==true)
                            {
                                $guardar = $this->usuarios_model->modificar_usuario($data);
                                if($guardar)
                                {
                                    $this->session->set_flashdata('ControllerMessage', 'Se ha editado el adminsitrador exitosamente');
                                 redirect(base_url().'usuarios/listar',301);
                                }
                                else
                                {
                                    $this->session->set_flashdata('ControllerMessage', 'Se ha producido un error, intente nuevamente');
                                    redirect(base_url().'usuarios/usuario',301);
                                }
                            }
                            else
                            {
                                echo ("el rut ingresado posiblemente es invalido intente nuevamente");
                            }
                    
                         }
                              
                }
                
                    
            }
            $datos=$this->usuarios_model->getPersonaPorPk($pk);
            if(sizeof($datos)==0)
            {
                show_404();
            }
        $escritores = $this->usuarios_model->lista();
        $categorias = $this->index_model->lista_categorias();
        $this->layout->view("editar_usuario",compact("pk","datos","categorias","escritores"));
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
        $categorias = $this->index_model->lista_categorias();
        $this->layout->view("editar_categoria",compact("pk","datos","categorias"));
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
        $escritores = $this->usuarios_model->lista();
        $categorias = $this->index_model->lista_categorias();
        $this->layout->view("editar_articulo",compact("pk","datos","escritores","categorias"));
    }

    public function validar_editar_usr($pk)
    {
        //echo $pk;//recibe pk
        if ( $this->input->post() )
        {
            $datos=$this->usuarios_model->logueo($this->input->post("login",true),sha1($this->input->post("pass",true))); //envia la contraseña encriptada 
           if($datos==1)
           {
                $this->session->set_userdata("taller_ci");
                $this->session->set_userdata('login', $this->input->post('login',true));

                redirect(base_url().'usuarios/edit_usuario/'.$pk,  301);
           }else
           {
            $this->session->set_flashdata('ControllerMessage', 'Usuario y/o clave inválida.');
                               redirect(base_url().'usuarios/validar',  301);
           }
        }
        $this->layout->view("validar");
    }
    public function validar_delete_usr($pk)
    {
         if ( $this->input->post() )
        {
            $datos=$this->usuarios_model->logueo($this->input->post("login",true),sha1($this->input->post("pass",true))); //envia la contraseña encriptada 
           if($datos==1)
           {
                $this->session->set_userdata("taller_ci");
                $this->session->set_userdata('login', $this->input->post('login',true));

                redirect(base_url().'usuarios/delete_usuario/'.$pk,  301);
           }else
           {
            $this->session->set_flashdata('ControllerMessage', 'Usuario y/o clave inválida.');
                               redirect(base_url().'usuarios/validar',  301);
           }
        }
        $this->layout->view("validar");
    }
     public function validar_editar_cat($pk)
    {
        //echo $pk;//recibe pk
        if ( $this->input->post() )
        {
            $datos=$this->usuarios_model->logueo($this->input->post("login",true),sha1($this->input->post("pass",true))); //envia la contraseña encriptada 
           if($datos==1)
           {
                $this->session->set_userdata("taller_ci");
                $this->session->set_userdata('login', $this->input->post('login',true));

                redirect(base_url().'usuarios/edit_categoria/'.$pk,  301);
           }else
           {
            $this->session->set_flashdata('ControllerMessage', 'Usuario y/o clave inválida.');
                               redirect(base_url().'usuarios/validar',  301);
           }
        }
        $this->layout->view("validar");
    }
    public function validar_delete_cat($pk)
    {
         if ( $this->input->post() )
        {
            $datos=$this->usuarios_model->logueo($this->input->post("login",true),sha1($this->input->post("pass",true))); //envia la contraseña encriptada 
           if($datos==1)
           {
                $this->session->set_userdata("taller_ci");
                $this->session->set_userdata('login', $this->input->post('login',true));

                redirect(base_url().'usuarios/delete_categoria/'.$pk,  301);
           }else
           {
            $this->session->set_flashdata('ControllerMessage', 'Usuario y/o clave inválida.');
                               redirect(base_url().'usuarios/validar',  301);
           }
        }
        $this->layout->view("validar");
    }
     public function validar_editar_art($pk)
    {
        //echo $pk;//recibe pk
        if ( $this->input->post() )
        {
            $datos=$this->usuarios_model->logueo($this->input->post("login",true),sha1($this->input->post("pass",true))); //envia la contraseña encriptada 
           if($datos==1)
           {
                $this->session->set_userdata("taller_ci");
                $this->session->set_userdata('login', $this->input->post('login',true));

                redirect(base_url().'usuarios/edit_articulo/'.$pk,  301);
           }else
           {
            $this->session->set_flashdata('ControllerMessage', 'Usuario y/o clave inválida.');
                               redirect(base_url().'usuarios/validar',  301);
           }
        }
        $this->layout->view("validar");
    }
      public function validar_delete_art($pk)
    {
         if ( $this->input->post() )
        {
            $datos=$this->usuarios_model->logueo($this->input->post("login",true),sha1($this->input->post("pass",true))); //envia la contraseña encriptada 
           if($datos==1)
           {
                $this->session->set_userdata("taller_ci");
                $this->session->set_userdata('login', $this->input->post('login',true));

                redirect(base_url().'usuarios/delete_articulo/'.$pk,  301);
           }else
           {
            $this->session->set_flashdata('ControllerMessage', 'Usuario y/o clave inválida.');
                               redirect(base_url().'usuarios/validar',  301);
           }
        }
        $this->layout->view("validar");
    }
   /* public function enviar_correo()
    {
        if($this->input->post()) 
        {
             
            $nombre=$this->input->post("nombre",true);
            $email=$this->input->post("email",true);
            $texto=$this->input->post("texto",true);
                   
            $enviar = $this->usuarios_model->mandar_correo($nombre,$email,$texto);
            if($enviar==true)
            {
                echo "su mensaje ha sido recibido";
            }
            else
            {
                echo "su mensaje no ha sido recibido intente nuevamente";
            }
        }

        $this->layout->view('formulario_contacto');
    }*/
}
