<?php

class index_model extends CI_Model 
{

    function __construct()
    {
        parent::__construct();
    }
    public function lista_articulo()
   {
      $query=$this->db
      ->select("pk,titulo, bajada")
      ->from("articulos")
      ->order_by("pk","desc")
      ->get();
      return $query->result();
   }
   public function noticiaPK($pk)
   {
        $where=array("pk"=>$pk);
        $query=$this->db
         ->select("titulo,bajada,noticia,autor_fk,categoria_fk")
        ->from("articulos")
        ->where($where)
        ->get();
        return $query->row();
   }

}