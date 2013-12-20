<?php

class usuarios_model extends CI_Model 
{

    function __construct()
    {
        parent::__construct();
    }
   public function logueo($login,$pass)
   {
         $query=$this->db
        ->select("id,login,pass")
        ->from("administrador")
        ->where(array("login"=>$login,"pass"=>$pass))
        ->count_all_results();
        return $query;
   }

   public function agregar($datos = array())
   {
      $this->db->insert("administrador",$datos);
      return true;
   }
   public function agregar_articulo($datos=array())
   {
      $this->db->insert("articulos",$datos);
      return true;
   }
   public function agregar_categoria($datos=array())
   {
      $this->db->insert("categorias",$datos);
      return true;
   }
   public function lista()
   {
      $query=$this->db
      ->select("pk,nombres, apellidos, rut")
      ->from("administrador")
      ->order_by("pk","desc")
      ->get();
      return $query->result();
   }
   public function lista_articulo()
   {
      $query=$this->db
      ->select("pk,titulo, bajada, noticia, fecha, autor_fk, categoria_fk")
      ->from("articulos")
      ->order_by("pk","desc")
      ->get();
      return $query->result();
   }
   public function lista_categoria()
   {
      $query=$this->db
      ->select("pk,nombre, descripcion")
      ->from("categorias")
      ->order_by("pk","desc")
      ->get();
      return $query->result();
   }
    public function getPersonaPorPk($pk)
    {
        $where=array("pk"=>$pk);
        $query=$this->db
         ->select("pk,nombres,apellidos,rut,login,pass")
        ->from("administrador")
        ->where($where)
        ->get();
        return $query->row();
    }
   public function getCategoria($pk)
   {
      $where=array("pk"=>$pk);
        $query=$this->db
         ->select("pk,nombre,descripcion")
        ->from("categorias")
        ->where($where)
        ->get();
        return $query->row();
   }
    public function getArticulo($pk)
   {
      $where=array("pk"=>$pk);
        $query=$this->db
         ->select("pk,titulo,bajada,noticia,fecha,autor_fk,categoria_fk")
        ->from("articulos")
        ->where($where)
        ->get();
        return $query->row();
   }
   
    public function eliminar_persona($pk)
    {
        $this->db->delete('administrador', array('pk' => $pk));
        return true; 
    }
    public function eliminar_categoria($pk)
    {
      $this->db->delete('categorias',array('pk'=>$pk));
      return true;
    }
    public function eliminar_articulo($pk)
    {
      $this->db->delete('articulos',array('pk'=>$pk));
      return true;
    }
   public function modificar_usuario($datos=array(),$pk)
    {
        $this->db->where('pk', $pk);
        $this->db->update('administrador', $datos); 
            return true;       
    }
    public function modificar_categoria($datos=array(),$pk)
    {
        $this->db->where('pk', $pk);
        $this->db->update('categorias', $datos); 
            return true;       
    }
    public function modificar_articulo($datos=array(),$pk)
    {
        $this->db->where('pk', $pk);
        $this->db->update('articulos', $datos); 
            return true;       
    }

}