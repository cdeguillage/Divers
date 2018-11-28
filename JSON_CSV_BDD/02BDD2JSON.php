<?php

// ETAPE 2
// ----------

// Ecrire un script PHP permettant la récupération des données utilisateur depuis la BDD.
// Ce script génère le rendu au format json.

// Utiliser:
// header()   -- Application Type
// json_encode()
// PDO


    // PARAMETRAGE BASE DE DONNEES
    $servername = "localhost";
    $username   = "root";
    $password   = "";
    $dbname     = "contact";
    $tablename  = "users";

?>
<h1>Génération d'un fichier JSON à partir de la base de données <cite><?= $dbname; ?></cite></h1>

<!-- Connection à la base de données -->
<h2>Connection à la base de données <cite>contact</cite></h2>
<?php

    // On crée une connexion à la BDD
    try
    {
        $db = new PDO('mysql:host='.$servername.';port=3306;dbname='.$dbname.';charset=utf8', $username, $password,
                    [
                    // Activation de la gestion des messages d'erreur xdebug
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
                    // Charset
                    // PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
                    // Choix des clés retournés dans les tableaux FETCH et FETCHALL
                    // PDO::FETCH_NUM ou PDO::FETCH_ASSOC
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    ]
        );

        if($db)
        {
            echo "Connection établie";
        }
        else
        {
            echo "Erreur à la connection";
        }

    }
    catch(Exception $e)
    {
        echo $e->getMessage()."<br />";
        // header('Location: https://www.google.fr/search?q='.$e->getMessage());
        // echo "<img src='assets/img/john-travolta.gif' alt='Where is my database ?!?'>";

        die();  // ON TAPE SUR LE BOUTON ROUGE D'URGENCE !!!
    }
?>

<hr />

<h2>Génération du fichier <cite>users.json</cite></h2>
<?php

    // Lecture de la table users
    $sql = "SELECT * FROM ".$tablename;
    $query = $db->prepare($sql);
    $query->execute();
    $rows_array = $query->fetchAll();
    $json_rows_array = json_encode($rows_array);

    $fichierJSON = "users.json";
    // Ouverture du fichier
    $fichierJSONOpen = fopen($fichierJSON, 'w+');

    // Ecriture dans le fichier
    fwrite($fichierJSONOpen, $json_rows_array);

    // Fermeture du fichier
    fclose($fichierJSONOpen);
?>

<!-- <hr />

<h3>Déclaration de l'entête de fichier JSON</h2>
<?php
    // Entête JSON
    // header('Content-Type: application/json');
?> -->
