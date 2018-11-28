<?php

class CountryCapital
{

    /**
     * Constantes
     */
    const SEARCH_CAPITAL = "CAPITAL";
    const SEARCH_COUNTRY = "COUNTRY";

    /**
     * Emplacement du fichier JSON de données
     */
    private $file_JSON = null;
    private $file_JSON_array;


    /**
     * Get the value of file_JSON
     */ 
    public function getFile_JSON()
    {
        return $this->file_JSON;
    }

    /**
     * Set the value of file_JSON
     *
     * @return  self
     */ 
    public function setFile_JSON($_file_JSON)
    {
        $this->file_JSON = $_file_JSON;

        return $this;
    }

    /**
     * Constructeur : On initialise l'accès au fichier de données
     */
    public function __construct($_file_JSON)
    {
        if (!file_exists($_file_JSON))
        {
            echo "Le fichier ".$_file_JSON." n'existe pas !!!";
        }
        else
        {
            $this->setFile_JSON($_file_JSON);

            // Ouverture du fichier JSON
            $content_JSON = file_get_contents($this->getFile_JSON());

            // Décodage du fichier JSON
            $this->file_JSON_array = json_decode($content_JSON);
        }
    }

    /**
     * Recherche de l'information demandée
     */
    private function getInfoJSON($_info = null, $_typeinfo = self::SEARCH_CAPITAL)
    {
        foreach($this->file_JSON_array as $rows)
        {
            switch($_typeinfo)
            {
                case self::SEARCH_CAPITAL:
                    if (strtolower($rows->{"country"}) === strtolower($_info))
                        return $rows->{"capital"};

                    break;
                case self::SEARCH_COUNTRY:
                    if (strtolower($rows->{"capital"}) === strtolower($_info))
                        return $rows->{"country"};

                    break;
                default:
                    break;
            }
        }
    }

    /**
     * Affichage de la CAPITALE par le pays demandé
     */
    public function getCapitalByCountry($_country = null)
    {
        if ($_country !== null)
        {
            echo "Quelle est la capitale de la ".$_country. "?<br />";
            echo "La capitale du pays ".$_country." est ".$this->getInfoJSON($_country, self::SEARCH_CAPITAL).".<br /><br />";
        }
    }


    /**
     * Affichage du PAYS par la capitale demandée
     */
    public function getCountryByCapital($_capital = null)
    {
        if ($_capital !== null)
        {
            echo "Quelle est le pays de ".$_capital. "?<br />";
            echo "Le pays de la capitale ".$_capital." est ".$this->getInfoJSON($_capital, self::SEARCH_COUNTRY).".<br /><br />";
        }
    }

    /**
     * Affichage de toutes les capitales
     */
    public function getCapitals()
    {
        foreach($this->file_JSON_array as $rows)
        {
            echo $rows->{"capital"}."<br />";
        }
        echo "<br />";
    }


}