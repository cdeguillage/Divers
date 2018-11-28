<?php

/**
 * Street Fighters reborn !
 * 
 * Définir les constantes d'expérience
 *   La constante Novice vaut 1
 *   La constante Medium vaut 2
 *   La constante Expert vaut 3
 * 
 * Ajouter des propriétés
 *   nom
 *   point de vie
 *   expérience
 * 
 * Ajouter des méthodes
 *   Saluer
 *   Attaquer
 *   Super Attaque
 *   Attaque secrète
 *   Soigner
 * 
 * Un soin apporte 10 point de vie.
 * Un attaque fait perdre les point de vie de l'adversaire selon l'expérience de l'attaquant.
 * 
 * Expérience 1 = 10 points de vie
 * Expérience 2 = 20 points de vie
 * Expérience 3 = 30 points de vie
 * 
 * Une super attaque double le cout d'une attaque.
 * Une attaque secrète retire tout les points de vie de l'adversaire et ne peut être utiliser que si l'adversaire possède moins de 50 points de vie.
 * Naissance des champions
 * 
 * Créer deux personnages
 *   Batman (lego)
 *   Nom : Batman
 *   Point de vie : 100
 *   Expérience : 2
 * 
 *   Superman (lego)
 *   Nom : Superman
 *   Point de vie : 100
 *   Expérience : 1
 * 
 * Fight
 *   Afficher l'état des combattants
 *   Démarrer le combat
 *   Batman salue Superman (B100 - S100)
 *   Superman salue Batman (B100 - S100)
 *   Batman attaque Superman  (B100 - S80)
 *   Superman riposte d'une attaque suivi d'une super attaque (B70 - S80)
 *   Batman – Furax – fait une super attaque (B70 - S40)
 *   Superman se soigne (il pleure) (B70 - S50)
 *   Batman tente une attaque secrète (B70 - S50) (échec)
 *   Superman encore affaiblie lance une double attaque (B50 - S50)
 *   Batman répond d'une attaque simple suivi d'une attaque secrète (et paf un coup de cryptonyte) (B50 - S30 / S0)
 *   Superman est au tapis et Batman gagne un point d'expérience.
 * 
 * Afficher l'état des combattants
 */
class Personnage
{
    /**
     * Niveau Novice
     */
    const NOVICE = 1;

    /**
     * Niveau Medium
     */
    const MEDIUM = 2;

    /**
     * Niveau Expert
     */
    const EXPERT = 3;

    /**
     * Attaque / super-attaque
     */
    const ATTACK = false;
    const SUPER_ATTACK = true;

    /************************
     * Propriétés du joueur *
     ************************/
    /**
     * Nom du personnage
     * @param string
     */
    public $name;

    /**
     * Point de vie du personnage
     * @param int
     * @default 100
     */
    public $life = 100;

    /**
     * Niveau d'expérience du personnage
     * @param int
     */
    public $xp;

    /**
     * Constructeur
     */
    public function __construct(string $character_name, int $experience = self::NOVICE)
    {
        $this->name = $character_name;
        $this->xp = $experience;
    }

    /**
     * Saluer son adversaire
     * @param string $name Nom de l'adversaire
     * @return string Personnage A salue le personnage B
     */
    public function SayHello($opponent)
    {
        return $this->name." salue ".$opponent->name;
    }

    /**
     * On attaque un adversaire et on lui soustrait des points de vie
     * @param object $opponent Adversaire
     */
    public function Attack($opponent, $superattack = self::ATTACK)
    {
        $life_attack = ($superattack == self::ATTACK) ? 1 : 2;

        switch($this->xp)
        {
            case self::NOVICE:
                $opponent->life -= (10*$life_attack);
                break;

            case self::MEDIUM:
                $opponent->life -= (20*$life_attack);
                break;

            case self::EXPERT:
                $opponent->life -= (30*$life_attack);
                break;
        }
    }

    /**
     * Une super-attaque double les dégâts
     * @param object $opponent Adversaire
     */
    public function SuperAttack($opponent)
    {
        $this->attack($opponent, self::SUPER_ATTACK);
    }

     /**
     * Attaque secrète du personnage
     * @param object $opponent Adversaire
     */
    public function SecretAttack($opponent)
    {
        if ($opponent->life < 50)
        {
            $opponent->life = 0;
        }
    }

     /**
     * Soignement du personnage
     * 
     */
    public function Care()
    {
        $this->life += 10;
    }

     /**
     * Augmentation du point d'expérience
     * 
     */
    public function LevelUp()
    {
        switch($this->xp)
        {
            case self::NOVICE:
                $this->xp = self::MEDIUM;
                break;

            case self::MEDIUM:
                $this->xp = self::EXPERT;
                break;

            default:
                $this->xp = self::NOVICE;
        }
    }
    
}


?>