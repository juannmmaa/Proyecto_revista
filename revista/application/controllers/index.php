<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Index extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->layout->setLayout('template1');
    }

    public function index() 
    {   
        //crear codigo de paginacion
        if($this->uri->segment(3)) //corresponde al 3.. el primero es el controlador, el segundo el metodo y el tercero el numero de la pagina
            {
                $pagina=$this->uri->segment(3);
            }
        else
        {
            $pagina=0;
        }
        
        $porpagina=9;
        $datos = $this->index_model->lista_articulo($pagina,$porpagina,"limit");
        //$datosNoticia=$this->index_model->getNoticiasPagination($pagina,$porpagina,"limit");
        $cuantos=$this->index_model->lista_articulo($pagina,$porpagina,"cuantos");

        $config['base_url'] = base_url().'index/index';
        $config['total_rows'] = $cuantos;
        $config['per_page'] = $porpagina;
        $config['uri_segment'] = '3';
        $config['num_links'] = '4';
        $config['first_link'] = 'Primero';
        $config['next_link'] = 'Siguiente';
        $config['prev_link'] = 'Anterior';
        $config['last_link'] = 'Ultimo';
        $this->pagination->initialize($config);


        
        $categorias = $this->index_model->lista_categorias();
        $cerrar = $this->usuarios_model->cerrar_sesion();
        $this->layout->view('index', compact("datos","categorias","cerrar","datosNoticia","cuantos"));


    }

    public function mostrar_noticia_completa($pk) 
    {
        $existe = $this->index_model->existeNoticia($pk); //valida que la noticia que se esta solicitando exista en la base de datos
        if($existe !=null)
        {
            $datos = $this->index_model->noticiaPK($pk);
            $escritor = $this->index_model->obtenerEscritor($datos->autor_fk);
            $nom_categoria = $this->index_model->obtenerCategoria($datos->categoria_fk);
            $categorias = $this->index_model->lista_categorias();
            $this->layout->view("ver_noticia", compact("datos","escritor","nom_categoria","categorias"));
        }
        else
        {
            $this->layout->view("noExiste");
        }
        
    }
    public function lista_por_categoria($pk)
    {

        $datos = $this->index_model->lista_articuloPorCategoria($pk);
        $nom_categoria= $this->index_model->obtenerCategoria($pk);
        $cerrar = $this->usuarios_model->cerrar_sesion();//para cerrar la sesion de usuario al momento de salir del panel de administrador 
        $this->layout->view("listaPorCategoria",compact("datos","nom_categoria","cerrar"));    
    }


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */