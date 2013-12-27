<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Index extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->layout->setLayout('template1');
    }

    public function index() {
        $datos = $this->index_model->lista_articulo();
        $categorias = $this->index_model->lista_categorias();
        $this->layout->view('index', compact("datos","categorias"));
    }

    public function mostrar_noticia_completa($pk) {
        $datos = $this->index_model->noticiaPK($pk);
        $escritor = $this->index_model->obtenerEscritor($datos->autor_fk);
        $categoria = $this->index_model->obtenerCategoria($datos->categoria_fk);
        $categorias = $this->index_model->lista_categorias();
        $this->layout->view("ver_noticia", compact("datos","escritor","categoria","categorias"));
    }
    public function lista_por_categoria($pk)
    {
        $datos = $this->index_model->lista_articuloPorCategoria($pk);
        $nom_categoria= $this->index_model->obtenerCategoria($pk);
        $this->layout->view("listaPorCategoria",compact("datos","nom_categoria"));    
    }


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */