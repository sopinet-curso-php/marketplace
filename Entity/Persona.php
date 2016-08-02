<?php
/**
 * @Entity
 * @Table(name="persona")
*/
class Persona {
   /**
    * @Column(type="integer")
    * @Id
    * @GeneratedValue(strategy="IDENTITY")
    */
    protected $id;
    /**
    * @Column(type="text")
    */
    protected $nombre;
    
    /**
    * @Column(type="string")
    */
    protected $avatar;
    
    /**
     * @Column(type="string")
     */
    protected $facebookId;
    
    /**
     * @Column(type="string")
     */ 
    protected $facebookAccessToken;
    
    /**
     * @OneToMany(targetEntity="Trayecto", mappedBy="conductor")
     */
     protected $trayectos;

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
     * Set nombre
     *
     * @param string $nombre
     * @return Persona
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string 
     */
    public function getNombre()
    {
        return $this->nombre;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->trayectos = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add trayectos
     *
     * @param \Trayecto $trayectos
     * @return Persona
     */
    public function addTrayecto(\Trayecto $trayectos)
    {
        $this->trayectos[] = $trayectos;

        return $this;
    }

    /**
     * Remove trayectos
     *
     * @param \Trayecto $trayectos
     */
    public function removeTrayecto(\Trayecto $trayectos)
    {
        $this->trayectos->removeElement($trayectos);
    }

    /**
     * Get trayectos
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getTrayectos()
    {
        return $this->trayectos;
    }
    
    
    
    /**
     * Set avatar
     *
     * @param string $avatar
     * @return Trayecto
     */
    public function setAvatar($avatar)
    {
        $this->avatar = $avatar;

        return $this;
    }

    /**
     * Get avatar
     *
     * @return string 
     */
    public function getAvatar()
    {
        return $this->avatar;
    }

    /**
     * Set facebookId
     *
     * @param integer $facebookId
     *
     * @return Persona
     */
    public function setFacebookId($facebookId)
    {
        $this->facebookId = $facebookId;

        return $this;
    }

    /**
     * Get facebookId
     *
     * @return integer
     */
    public function getFacebookId()
    {
        return $this->facebookId;
    }

    /**
     * Set facebookAccessToken
     *
     * @param string $facebookAccessToken
     *
     * @return Persona
     */
    public function setFacebookAccessToken($facebookAccessToken)
    {
        $this->facebookAccessToken = $facebookAccessToken;

        return $this;
    }

    /**
     * Get facebookAccessToken
     *
     * @return string
     */
    public function getFacebookAccessToken()
    {
        return $this->facebookAccessToken;
    }
}
