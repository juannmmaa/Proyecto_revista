<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
//controlador que realiza las aciones del index
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
        
        $porpagina=9;//seleccionamos la cantidad de noticias que tendremos por pagina
        $datos = $this->index_model->lista_articulo($pagina,$porpagina,"limit");
        //$datosNoticia=$this->index_model->getNoticiasPagination($pagina,$porpagina,"limit");
        $cuantos=$this->index_model->lista_articulo($pagina,$porpagina,"cuantos");

        $config['base_url'] = base_url().'index/index';
        $config['total_rows'] = $cuantos;//indica cuantas noticiasexisten en la base de datos
        $config['per_page'] = $porpagina; //indica cuantas noticias queremos por pagina
        $config['uri_segment'] = '3';
        $config['num_links'] = '4';
        $config['first_link'] = 'Primero';
        $config['next_link'] = 'Siguiente';
        $config['prev_link'] = 'Anterior';
        $config['last_link'] = 'Ultimo';
        $this->pagination->initialize($config);


        
        $categorias = $this->index_model->lista_categorias();//lista las categorias para enviarlas a la vista
        $cerrar = $this->usuarios_model->cerrar_sesion();//cierra sesion de usuario en caso de que este abierta
        $this->layout->view('index', compact("datos","categorias","cerrar","cuantos")); //son enviados a la vista las noticias, cuantas hay, las categorias y el cierre de sesion


    }

    public function mostrar_noticia_completa($pk) //muestra una noticia en particular
    {
        $existe = $this->index_model->existeNoticia($pk); //valida que la noticia que se esta solicitando exista en la base de datos
        if($existe !=null) //si la noticia que se solicita existe
        {
            $datos = $this->index_model->noticiaPK($pk); //va a buscar la noticia
            $escritor = $this->index_model->obtenerEscritor($datos->autor_fk);//va a buscar al escritor de esa noticia
            $nom_categoria = $this->index_model->obtenerCategoria($datos->categoria_fk);//el nombre de la categoria
            $categorias = $this->index_model->lista_categorias();//lista las categorias
            $this->layout->view("ver_noticia", compact("datos","escritor","nom_categoria","categorias"));//todos los datos anteriores se mandan a la vista
        }
        else
        {
            $categorias = $this->index_model->lista_categorias();//se solicita de igual manera las categorias para la barra superior de cada vista
            $this->layout->view("noExiste",compact("categorias"));//en caso de que la noticia no exista se va a una vista que arroja un mensaje de error de existencia
        }
        
    }
    public function lista_por_categoria($pk) //lista a todas las noticias que sean de una misma categoria
    {
       

        $categorias = $this->index_model->lista_categorias();
        $datos = $this->index_model->lista_articuloPorCategoria($pk);
        $nom_categoria= $this->index_model->obtenerCategoria($pk);//obtiene datos de la categoria
        $cerrar = $this->usuarios_model->cerrar_sesion();//para cerrar la sesion de usuario al momento de salir del panel de administrador 
        $this->layout->view("listaPorCategoria",compact("datos","nom_categoria","cerrar","categorias","datos_paginacion","cuantos_paginacion"));    
    }
    public function nosotros()//muestra la vista nosotros
    {
        $categorias = $this->index_model->lista_categorias();
        $this->layout->view("nosotros",compact("categorias"));
    }


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */