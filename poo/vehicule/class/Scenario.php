<?php

class Scenario
{
    // Constantes
    const __FILENAME_SCENARIO = "scenario.json";

    // Variables

    // Méthodes
    function json_resetfile()
    {
        // Supprime le fichier scenario
        unlink(self::__FILENAME_SCENARIO);

        // Ouverture du fichier
        $fichier_json = fopen(self::__FILENAME_SCENARIO, 'c+');

        // Ecriture dans le fichier
        fwrite($fichier_json, "[]");

        // Fermeture du fichier
        fclose($fichier_json);            
    }


    function json_addfile($_action)
    {
        if (file_exists(self::__FILENAME_SCENARIO))
        {
            // Lecture du fichier
            $scenario_json_dec = $this->json_readfile();

            // Ajout d'une nouvelle action
            array_push($scenario_json_dec, $_action);

            // Encodage du fichier JSON
            $scenario_json_enc = json_encode($scenario_json_dec);

            // Ouverture du fichier
            $fichier_json = fopen(self::__FILENAME_SCENARIO, 'w+');

            // Ecriture dans le fichier
            fwrite($fichier_json, $scenario_json_enc);

            // Fermeture du fichier
            fclose($fichier_json);            
        }
        else
        {
            echo "Le fichier ".self::__FILENAME_SCENARIO." n'existe pas !";
        }
    }


    public function json_readfile()
    {
        // Décode JSON --> PHP
        // [{"instance":"voiture1","fonction":"Start","execute":"#"},{"instance":"voiture1","fonction":"Go","par1":"50","execute":"#"}]

        if (file_exists(self::__FILENAME_SCENARIO))
        {
            // Lecture du fichier JSON
            $scenario_json_enc = file_get_contents(self::__FILENAME_SCENARIO);

            // Décodage du fichier JSON
            $scenario_json_dec = json_decode($scenario_json_enc);

            // On le renvoit en objet
            return $scenario_json_dec;
        }
        else
        {
            echo "Le fichier ".self::__FILENAME_SCENARIO." n'existe pas !";
            return false;
        }

    }


}