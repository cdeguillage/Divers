<?php

/**
 * @param string $s Nom du personnage
 * @param int $i Age du personnage
 */

class Personnage
{
    // Constants
    const BONJOUR = "Bonjour";
    const AU_REVOIR = "Au revoir";

    // Variables
    public $prenom = "";
    public $age = 0;
    
    // Methods
    function sayBonjour(string $prenom)
    {
        echo Personnage::BONJOUR." ".$prenom;
    }

    function sayAuRevoir()
    {
        echo Personnage::AU_REVOIR;
    }

    // Constructeur (setter age)
    public function __construct($_prenom, $_age)
    {
        $this->prenom = $_prenom;
        $this->age = $_age;
    }


}