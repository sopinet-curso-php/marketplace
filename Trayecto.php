<?php
class Trayecto {
    var $conductor;
    var $avatar;
    var $origen;
    var $destino;
    var $calle;
    var $hora;
    var $precio;
    var $descripcion;
    var $plazas;
    
    /**
     * Rellena este objeto con una serie de datos pasados por parámetro
     * 
     * @return void
     **/ 
    function llenarObjeto($p1, $p2, $p3, $p4, $p5, $p6, $p7, $p8, $p9) {
        $this->conductor = $p1;
        $this->avatar = $p2;
        $this->origen = $p3;
        $this->destino = $p4;
        $this->calle = $p5;
        $this->hora = $p6;
        $this->precio = $p7;
        $this->descripcion = $p8;
        $this->plazas = $p9;
    }
    
    /**
     * Devuelve la descripción corta (80 primeros caracteres) del objeto
     * 
     * @return string
     **/ 
    function getDescripcionCorta() {
        $descripcionCorta = substr($this->descripcion, 0, 80);
        $descripcionFinal = $descripcionCorta . "...";
        return $descripcionFinal;
    }
    
    /**
     * Comprueba si el origen pasado por parámetro coincide con el de nuestro objeto ($this)
     * Si coincide devolvemos true
     * Si no coincide devolvemos false
     * 
     * @return bool
     * 
     **/ 
    function tieneOrigen($paramOrigen) {
        if ($paramOrigen == $this->origen) {
            return true;
        } else {
            return false;
        }
    }
}
?>