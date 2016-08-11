<?php
/**
 * @Entity
 * @Table(name="trayecto")
*/
class Trayecto {
    /**
    * @Column(type="integer")
    * @Id
    * @GeneratedValue(strategy="IDENTITY")
    */
    protected $id;

    /**
     * @Column(type="string")
     */
    protected $origen;
    /**
     * @Column(type="string")
     */
    protected $destino;
    /**
     * @Column(type="string")
     */
    protected $calle;
    /**
     * @Column(type="date")
     */
    protected $fechaPublicacion;
    /**
     * @Column(type="time")
     */
    protected $hora;
    /**
     * @Column(type="float")
     */
    protected $precio;
    /**
     * @Column(type="text")
     */
    protected $descripcion;
    /**
     * @Column(type="integer")
     */
    protected $plazas;
    
    /**
     * @ManyToOne(targetEntity="Persona", inversedBy="trayectos")
     * @JoinColumn(name="persona_id", referencedColumnName="id")
     */
    protected $conductor;
    
    /**
     * Rellena este objeto con una serie de datos pasados por parámetro
     * 
     * @return void
     **/ 
    function llenarObjeto($p1, $p3, $p4, $p5, $p6, $p7, $p8, $p9, $p10) {
        $this->conductor = $p1;
        $this->origen = $p3;
        $this->destino = $p4;
        $this->calle = $p5;
        $this->fechaPublicacion = $p6;
        $this->hora = $p7;
        $this->precio = $p8;
        $this->descripcion = $p9;
        $this->plazas = $p10;
    }
    
    function getFechaPublicacion() {
        return $this->fechaPublicacion;
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

    /**
     * Set id
     *
     * @param integer $id
     * @return Trayecto
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }


    /**
     * Set origen
     *
     * @param string $origen
     * @return Trayecto
     */
    public function setOrigen($origen)
    {
        $this->origen = $origen;

        return $this;
    }

    /**
     * Get origen
     *
     * @return string 
     */
    public function getOrigen()
    {
        return $this->origen;
    }

    /**
     * Set destino
     *
     * @param string $destino
     * @return Trayecto
     */
    public function setDestino($destino)
    {
        $this->destino = $destino;

        return $this;
    }

    /**
     * Get destino
     *
     * @return string 
     */
    public function getDestino()
    {
        return $this->destino;
    }

    /**
     * Set calle
     *
     * @param string $calle
     * @return Trayecto
     */
    public function setCalle($calle)
    {
        $this->calle = $calle;

        return $this;
    }

    /**
     * Get calle
     *
     * @return string 
     */
    public function getCalle()
    {
        return $this->calle;
    }

    /**
     * Set fechaPublicacion
     *
     * @param \DateTime $fechaPublicacion
     * @return Trayecto
     */
    public function setFechaPublicacion($fechaPublicacion)
    {
        $this->fechaPublicacion = $fechaPublicacion;

        return $this;
    }

    /**
     * Set hora
     *
     * @param \DateTime $hora
     * @return Trayecto
     */
    public function setHora($hora)
    {
        $this->hora = $hora;

        return $this;
    }

    /**
     * Get hora
     *
     * @return \DateTime 
     */
    public function getHora()
    {
        return $this->hora;
    }

    /**
     * Set precio
     *
     * @param float $precio
     * @return Trayecto
     */
    public function setPrecio($precio)
    {
        $this->precio = $precio;

        return $this;
    }

    /**
     * Get precio
     *
     * @return float 
     */
    public function getPrecio()
    {
        return $this->precio;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     * @return Trayecto
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Get descripcion
     *
     * @return string 
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set plazas
     *
     * @param integer $plazas
     * @return Trayecto
     */
    public function setPlazas($plazas)
    {
        $this->plazas = $plazas;

        return $this;
    }

    /**
     * Get plazas
     *
     * @return integer 
     */
    public function getPlazas()
    {
        return $this->plazas;
    }
    
    
    public function setConductor($conductor)
    {
        $this->conductor=$conductor;
        return $this;
    }
    
    public function getConductor(){
        return $this->conductor;
    }
}
