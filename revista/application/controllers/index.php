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
        $this->layout->view('index', compact("datos"));
    }

    public function mostrar_noticia_completa($pk) {
        $datos = $this->index_model->noticiaPK($pk);
        $this->layout->view("ver_noticia", compact("datos"));
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */