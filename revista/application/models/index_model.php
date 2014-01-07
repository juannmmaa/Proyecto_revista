<?php
//modelo para realizar las consultas del controlador Index
class index_model extends CI_Model 
{

    function __construct()
    {
        parent::__construct();
    }
    public function lista_articulo($pagina,$porpagina,$quehago) 
   {
     
       switch($quehago)
        {
            case 'limit':
                $query=$this->db
                ->select("pk,titulo,bajada,noticia,fecha,autor_fk,categoria_fk,imagen")
                ->from("articulos")
                //->order_by("pk","desc")
                ->limit($porpagina,$pagina)
                ->get();
                return $query->result();
            break;
            case 'cuantos':
                 $query=$this->db
                ->select("pk,titulo,bajada,noticia,fecha,autor_fk,categoria_fk,imagen")
                ->from("articulos")
                //->order_by("pk","desc")
                ->count_all_results();
                return $query;
            break;
        }
   }
    public function lista_categorias()
   {
      $query=$this->db
      ->select("pk,nombre, descripcion")
      ->from("categorias")
      ->order_by("pk","desc")
      ->get();
      return $query->result();
   }
   public function noticiaPK($pk)
   {
        $where=array("pk"=>$pk);
        $query=$this->db
         ->select("titulo,bajada,noticia,autor_fk,categoria_fk,imagen,fecha")
        ->from("articulos")
        ->where($where)
        ->get();
        return $query->row();
   }
   
    public function obtenerEscritor($pk)
   {
        $where=array("pk"=>$pk);
        $query=$this->db
         ->select("nombres,apellidos")
        ->from("administrador")
        ->where($where)
        ->get();
        return $query->row();
   }
    public function obtenerCategoria($pk)
   {
        $where=array("pk"=>$pk);
        $query=$this->db
         ->select("pk,nombre,descripcion")
        ->from("categorias")
        ->where($where)
        ->get();
        return $query->row();
   }
   public function lista_articuloPorCategoria($pk)
   {
      $where = array("categoria_fk" => $pk);
      $query=$this->db
      ->select("pk,titulo,bajada,imagen,categoria_fk")
      ->from("articulos")
      ->where($where)
      ->get();
      return $query->result();
   }
   public function existeNoticia($pk)
   {
        $where=array("pk"=>$pk);
        $query=$this->db
        ->select("pk")
        ->from("articulos")
        ->where($where)
        ->get();
        return $query->row();
   }
   
   
}