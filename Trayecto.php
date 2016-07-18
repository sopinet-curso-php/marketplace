<?php
class Trayecto {
    var $conductor;
    var $avatar;
    var $origen;
    var $destino;
    var $calle;
    var $fechaPublicacion;
    var $hora;
    var $precio;
    var $descripcion;
    var $plazas;
    
    /**
     * Rellena este objeto con una serie de datos pasados por parámetro
     * 
     * @return void
     **/ 
    function llenarObjeto($p1, $p2, $p3, $p4, $p5, $p6, $p7, $p8, $p9, $p10) {
        $this->conductor = $p1;
        $this->avatar = $p2;
        $this->origen = $p3;
        $this->destino = $p4;
        $this->calle = $p5;
        $this->fechaPublicacion = new DateTime();
        $this->fechaPublicacion->setTimestamp($p6);
        $this->hora = $p7;
        $this->precio = $p8;
        $this->descripcion = $p9;
        $this->plazas = $p10;
    }
    
    function getFechaPublicacion() {
        return $this->fechaPublicacion->format('d-m-Y');
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
    
    /**
     * Copmrueba si el destino pasado por parámetro coincide con el de nuestro objeto ($this)
     * 
     * @return bool
     **/
    function tieneDestino($paramDestino) {
        if ($paramDestino == $this->destino) {
            return true;
        } else {
            return false;
        }
    }
    
    /**
     * Compara tanto si el origen coincide con el parámetro pasado o el destino
     * 
     * @return bool
     **/
    function buscar($param) {
        if ($this->tieneDestino($param) || $this->tieneOrigen($param)) {
            return true;
        } else {
            return false;
        }
    }
    
    /**
     * Comprueba si la fecha actual está dentro del filtro de fecha seleccionado
     * 
     * @return bool
     **/ 
    function filtroFecha($param) {
        if ($param == 0) {
            return true;
        } else {
            $fechaHoy = new DateTime();
            $diff = $fechaHoy->diff($this->fechaPublicacion);
            $diffDias = $diff->format('%a');
            return ($diffDias <= $param);
        }
    }
}
?>