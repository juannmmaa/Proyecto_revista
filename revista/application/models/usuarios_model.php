<?php
//modelo para hacer las consultas del controlador USUARIOS y la validacion de rut
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
      ->select("pk,titulo, bajada, noticia, fecha, autor_fk, imagen,categoria_fk")
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
        echo $pk;//prueba para ver si recibe correctamente la pk
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
   
      public function valida_rut($rut) 
      { 
        
       //echo $rut;//recibe correctamente el parametro 
        
  
        
        $rut_numerico=(int) $rut;
        $digito = $rut_numerico%10; //obtengo el digito verificador
        //echo $digito; //obtiene correctamente el digito
      
        
        $rut_sin_digito = $rut_numerico - $digito; 
        $rut_sin_digito = $rut_sin_digito/10;
       // echo $rut_sin_digito; //comprobar si es el rut sin digito verificador
        
         $contador =2;
         $acumulador=0;
         $multiplo =0;
         while ($rut_sin_digito!=0)
         {
          $multiplo = ($rut_sin_digito%10) *$contador;
          $acumulador=$acumulador + $multiplo;
          $rut_sin_digito = $rut_sin_digito/10;
          $contador = $contador+1;
          if($contador ==8)
            {
              $contador =2;
            }
          }
          $calculado = 11 - ($acumulador %11);
          //echo ("EL digito calculado es: ".$calculado);
          if($calculado ==11)
          {
            $calculado =0;
          }
          if($calculado ==10)
          {
            //echo ("EL RUT ES GUION K");
            $calculado = 'k';
          }

          if($calculado == $digito)
          {
            //echo ("VERDADERO");
            return true;
          }
          else
          {
            //echo ("FALSO");
            return false;
          }
      }
      public function validar_k($rut)
      {
        $var = strstr($rut, 'k');
        //echo $var; // encuentra correctamente la k
        if($var =='k')
        {
          //echo "El rut contiene K";
          return true;
        }
      }

      public function calculo_digito($rut)
      {
        $rut_numerico=(int) $rut;
        $contador = 2;
        $acumulador =0;
        $multiplo = 0;
         while ($rut_numerico !=0)
         {
            $multiplo = ($rut_numerico %10) * $contador;
            $acumulador = $acumulador + $multiplo;
            $rut_numerico = $rut_numerico/10;
            $contador = $contador +1;
            if($contador ==8)
            {
              $contador =2;
            }
         }
         $digito = 11 - ($acumulador %11);
         if ($digito ==10)
         {
            //echo ("EL RUT TIENE K");
            return $digito;
            //echo $digito;
         }
      }
      public function cerrar_sesion()
      {
        $this->session->unset_userdata(array('login' => ''));
        $this->session->sess_destroy("taller_ci");
        //redirect(base_url().'index',  301);
      }
       public function existeAdmin($pk)
      {
        //echo $pk; //recibe correctamente el rut
        $where=array("rut"=>$pk);
        $query=$this->db
        ->select("rut")
        ->from("administrador")
        ->where($where)
        ->get();
        return $query->row();
      }

     /* public function getEscritor($pk)
    {
      echo $pk;//recibe el login del admin
      $where=array("login"=>$pk);
        $query=$this->db
         ->select("pk")
        ->from("administrador")
        ->where($where)
        ->get();
        return $query->row();

    }*/
     
    }
