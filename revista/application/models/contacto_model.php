<?php

class contacto_model extends CI_Model 
{

    function __construct()
    {
        parent::__construct();
    }
    public function enviar_mail($nombre,$email,$mensaje)
    {
    	echo $nombre;
    	echo $email;
    	echo $mensaje;
     }
   
   
}