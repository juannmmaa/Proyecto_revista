<?php

class index_model extends CI_Model 
{

    function __construct()
    {
        parent::__construct();
    }
    public function enviar_mail($data=array())
    {
      echo $data->nombre;
    }
   
   
}