<?php

    class GenerarPass{
        
        private $cadena;
        private $longitud;
        private $pwd;
        
        public function __construct(){
            $this->cadena = 'ABCDEFGHIJKLMNOPQRSTUvWXYZabcdefghijklmnopqrstuvwxyz0123456789';
            $this->pwd = '';            
        }
        
        public function NuevaPass($l){
            $long_cadena = strlen($this->cadena);
            $this->longitud = $l;
            
            for($x=0; $x <= $this->longitud; $x++){
                $aleatorio = mt_rand(0, $long_cadena -1);
                $this->pwd .= substr($this->cadena, $aleatorio, 1); 
            }
            
            return $this->pwd;
        }
    }