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
    
    function copiarObjetoConModificaciones(Trayecto $trayecto) {
        $this->copiarObjeto($trayecto);
        if ($this->origen == "Córdoba") {
            $this->origen = "Málaga";
        }
    }
    
    /**
     * Copia un objeto completo pasado por parámetro
    **/ 
    function copiarObjeto(Trayecto $trayecto) {
        $this->conductor = $trayecto->conductor;
        $this->avatar = $trayecto->avatar;
        $this->origen = $trayecto->origen;
        $this->destino = $trayecto->destino;
        $this->calle = $trayecto->calle;
        $this->hora = $trayecto->hora;
        $this->precio = $trayecto->precio;
        $this->descripcion = $trayecto->descripcion;
        $this->plazas = $trayecto->plazas;
    }
    
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
     * Pediente: Hay que terminar esta función
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