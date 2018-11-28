<?php

class ConducteurController
{

    /**
     * Property:
     * id_conducteur
     */
    private $id_conducteur;

    /**
     * prenom
     */
    private $prenom;

    /**
     * nom
     */
    private $nom;

    /**
     * Constructor
     */
    public function __constructor(/*$_id_conducteur, $_prenom, $_nom*/)
    {
        // $this->id_conducteur = $_id_conducteur;
        // $this->prenom        = $_prenom;
        // $this->nom           = $_nom;

        // Database connection
        Database::connect();
    }

    /**
     * Get property:
     */ 
    public function getId_conducteur()
    {
        return $this->id_conducteur;
    }

    /**
     * Set property:
     *
     * @return  self
     */ 
    public function setId_conducteur($id_conducteur)
    {
        $this->id_conducteur = $id_conducteur;

        return $this;
    }

    /**
     * Get prenom
     */ 
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set prenom
     *
     * @return  self
     */ 
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get nom
     */ 
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set nom
     *
     * @return  self
     */ 
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }




}