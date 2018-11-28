<?php

/**
 * Gérer un parc automobile
 * 
 * Créer une classe "Voiture"
 * 
 * Ajouter des propriétés
 *   Les propriétés nous servirons à distinguer les voitures.
 *     Marque
 *     Modèle
 *     Couleur
 *     En marche (oui ou non ?)
 *     Vitesse (par défaut 0km/h)
 *     Nom du conducteur
 * 
 *   Ajouter des méthodes
 *   Les méthodes sont les actions que les voitures pourrons exécuter.
 *     Démarrer (le véhicule doit être à l'arrêt)
 *     Avancer (le véhicule doit être démarrer)
 *     Freiner (le véhicule doit avancer)
 *     Tourner (la vitesse ne doit pas être > à 30 km/h)
 *     S'arrêter (le véhicule doit être en marche et à une vitesse de 0km/h)
 * 
 *   Créer les voitures
 *   Créer trois voitures :
 *     Voiture 1
 *     Voiture 2
 *     Voiture 3

 *     Marque : Ford
 *     Modèle : Ranger
 *     Couleur : Noire
 *     Conducteur : Michel
 * 
 * Déplacer les véhicules
 *   Démarrer les véhicules 1 et 3
 *   le véhicule 1 accélère jusqu'à 50km/h
 *   le véhicule 3 accélère jusqu'à 30km/h
 *   les deux véhicules tournent à droite
 *   le véhicule 1 ralenti de 30km/h
 *   le véhicule 3 accélère de 40km/h
 *   le véhicule 1 tourne à gauche
 *   on arrête tous les véhicules
 *   Affiche le nom des conducteurs des 3 véhicules et leur vitesse max.
 */

class Vehicule
{

    /**
     * Constantes
     */
    const ROULE = true;
    const NE_ROULE_PAS = false;
    const SPEED_LIMIT_TURN = 30;
    const SPEED_STOP = 0;
    const TURN_RIGHT = "droite";
    const TURN_LEFT = "gauche";

    /**
     * Marque
     * @var string
     */
    private $marque;

    /**
     * Modele
     * @var string
     */
    private $modele;

    /**
     * Couleur
     * @var string
     */
    private $couleur;

    /**
     * Activité : Roule oui ou non
     * @var boolean
     */
    private $activite = false;

    /**
     * Vitesse
     * @var int
     */
    private $vitesse = 0;

    /**
     * Nom du chauffeur
     * @var string
     */
    private $chauffeur = "";


    /**
     * Constructeurs
     */
    public function __construct(string $_marque, string $_modele, string $_couleur, string $_chauffeur)
    {
        $this->marque = $_marque;
        $this->modele = $_modele;
        $this->couleur = $_couleur;
        $this->chauffeur = $_chauffeur;
    }

    public function getMarque()
    {
        return $this->marque;
    }

    public function getModele()
    {
        return $this->modele;
    }

    public function getCouleur()
    {
        return $this->couleur;
    }

    public function getChauffeur()
    {
        return $this->chauffeur;
    }


    /**
     * Démarre la voiture et avance à la vitesse demandée
     * @param string
     */
    function Start()
    {
        echo "<h5 class='card-title'>[".$this->chauffeur."]  Démarrer le véhicule.</h5>";
        if($this->activite == self::NE_ROULE_PAS)
        {
            $this->activite = self::ROULE;
            // $this->Go($_speed);
            // echo "[START/".$this->chauffeur."] Message: Le véhicule est démarré.<br />";
            echo "<div class='alert alert-success' role='alert'>Le véhicule est démarré.</div>";
        }
        else
        {
            // echo "[START/".$this->chauffeur."] WARNING: Le véhicule est déjà démarré !<br />";
            echo "<div class='alert alert-danger' role='alert'>Le véhicule est déjà démarré !!!</div>";
        }
    }

    /**
     * Avance le véhicule
     * @param int
     */
    function Go(int $_speed)
    {
        echo "<h5 class='card-title'>[".$this->chauffeur." / ".$_speed."]  Accélérer / Ralentir le véhicule.</h5>";
        if($this->activite == self::ROULE)  // Voiture démarrée, roule-t-elle ?
        {
            if(($this->vitesse == self::SPEED_STOP) && ($_speed == self::SPEED_STOP))   // A l'arrêt
            {
                // echo "[GO  /".$this->chauffeur."] Message: Le véhicule n'avance pas. La vitesse reste à ".$_speed." km/h.<br />";
                echo "<div class='alert alert-warning' role='alert'>Le véhicule n'avance pas. La vitesse reste à ".$_speed." km/h.</div>";
            }
            else if(($this->vitesse != self::SPEED_STOP) && ($_speed > $this->vitesse))   // Ca roule déjà, on accèlère
            {
                // echo "[GO  /".$this->chauffeur."] Message: Le véhicule accélère. La vitesse est à ".$_speed." km/h.<br />";
                echo "<div class='alert alert-success' role='alert'>Le véhicule accélère. La vitesse est à ".$_speed." km/h.</div>";
            }
            else if(($this->vitesse != self::SPEED_STOP) && ($_speed < $this->vitesse))   // Ca roule déjà, on déccèlère
            {
                // echo "[GO  /".$this->chauffeur."] Message: Le véhicule ralentit. La vitesse est à ".$_speed." km/h.<br />";
                echo "<div class='alert alert-success' role='alert'>Le véhicule ralentit. La vitesse est à ".$_speed." km/h.</div>";
            }
            else   // on reste à la même vitesse
            {
                // echo "[GO  /".$this->chauffeur."] Message: Le véhicule ne change pas de vitesse. La vitesse est à ".$_speed." km/h.<br />";
                echo "<div class='alert alert-success' role='alert'>Le véhicule ne change pas de vitesse. La vitesse est à ".$_speed." km/h.</div>";
            }
            $this->vitesse = $_speed;
        }
        else
        {
            // echo "[GO  /".$this->chauffeur."] WARNING: Le véhicule ne peut pas avancer. Non démarré !<br />";
            echo "<div class='alert alert-danger' role='alert'>Le véhicule ne peut pas avancer. Non démarré !!!</div>";
        }
    }

    /**
     * Arrête le véhicule
     * 
     */
    function Stop()
    {
        echo "<h5 class='card-title'>[".$this->chauffeur."]  Stopper le véhicule.</h5>";
        if($this->activite == self::ROULE)
        {
            $this->vitesse = 0;
            // echo "[STOP/".$this->chauffeur."] Message: Le véhicule s'arrête. La vitesse est à ".$this->vitesse." km/h.<br />";
            echo "<div class='alert alert-success' role='alert'>Le véhicule s'arrête. La vitesse est à ".$this->vitesse." km/h.</div>";
        }
        else
        {
            // echo "[STOP/".$this->chauffeur."] WARNING: Le véhicule est déjà arrêté !<br />";
            echo "<div class='alert alert-danger' role='alert'>Le véhicule est déjà arrêté !!!</div>";
        }
    }

    /**
     * Tourne le véhicule
     * 
     */
    function Turn(string $_turn)
    {
        echo "<h5 class='card-title'>[".$this->chauffeur." / ".$_turn."]  Faire tourner le véhicule.</h5>";
        if($this->vitesse <= self::SPEED_LIMIT_TURN)
        {
            // echo "[TURN/".$this->chauffeur."] Message: Le véhicule tourne à ".$_turn.".<br />";
            echo "<div class='alert alert-success' role='alert'>Le véhicule tourne à ".$_turn.".</div>";
        }
        else
        {
            // echo "[TURN/".$this->chauffeur."] WARNING: Le véhicule roule trop vite pour tourner à ".$_turn." !<br />";
            echo "<div class='alert alert-danger' role='alert'>Le véhicule roule trop vite pour tourner à ".$_turn." !!!</div>";
        }
    }

    /**
     * Affiche les paramétres du vehicule
     * 
     */
    // function Display()
    // {
    //     echo "[DISP/".$this->chauffeur."] Message: ".$this->chauffeur." / ".$this->vitesse." km/h.<br />";
    // }

    function DisplayCard()
    {
        echo "<br /><ul><li>".$this->chauffeur."</li><li>".$this->marque."</li><li>".$this->modele."</li><li>".$this->couleur."</li></ul>";
    }

}

 ?>