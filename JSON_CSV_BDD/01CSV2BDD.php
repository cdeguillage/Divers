<?php


// ETAPE 1
// ----------

// Ecrire , en PHP, le script permettant de récupérer le contenu du fichier "users.csv", et injecter ce contenu en base de données.

// - Préparer une base de données avec la table "users" et les champ "firstname" (varchar(20)), "lastname" (varchar(20)) et "email" (varchar(200)).
// - N'oubliez pas le champ ID en auto-incrément et unique.

// utiliser:
// file_get_contents()
// explode()
// foreach()
// PDO

    // PARAMETRAGE BASE DE DONNEES
    $servername = "localhost";
    $username   = "root";
    $password   = "";
    $dbname     = "contact";
    $tablename  = "users";

?>
<h1>Intégration du fichier CSV vers Database <cite>contact</cite></h1>
<h2>Champs : <cite>ID / Prénom / Nom / Email</cite></h2>
<h3>CREATE DATABASE <cite>contact</cite></h3>
<h3>CREATE TABLE <cite>users</cite></h3>

<hr />

<!-- Creation de la base de données -->
<h3>Si la base de données <cite>contact</cite> n'existe pas, on la crée !</h3>
<?php

    // Create connection
    $conn = new mysqli($servername, $username, $password);
    // Check connection
    if ($conn->connect_error) {
        die("Connection impossible : " . $conn->connect_error);
    } 

    // Create database
    $sql = "CREATE DATABASE ".$dbname;
    if ($conn->query($sql) === TRUE) {
        echo "Base de données créée";
    } else {
        echo "Erreur à la création de la base de données: " . $conn->error;
    }

    $conn->close();
?>

<!-- Creation de la table -->
<h3>Si la table <cite>users</cite> n'existe pas, on la crée !</h3>
<?php
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Pas de connection : " . $conn->connect_error);
    } 

    // sql to create table
    $sql = "
            CREATE TABLE ".$tablename." (
                id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
                firstname VARCHAR(30) NOT NULL,
                lastname VARCHAR(30) NOT NULL,
                email VARCHAR(50)
            )
    ";

    if ($conn->query($sql) === TRUE) {
        echo "Table users créée";
    } else {
        echo "Erreur à la création de la table ".$tablename.": " . $conn->error;
    }

    $conn->close();
?>

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

<!-- Vidage de la table -->
<h3>Si la table <cite>users</cite> existe, on la vide : TRUNCATE TABLE <cite><?= $tablename; ?></cite></h3>
<?php

   // sql to create table
    $sql = "TRUNCATE TABLE ".$tablename;

    if ($db->query($sql)) {
        echo "Table ".$tablename." vidée";
    } else {
        echo "Erreur au vidage de la table ".$tablename.": " . $db->error;
    }

?>

<hr />


<h3>Lecture du fichier users.csv...</h3>
<?php
    $file = file_get_contents('./users.csv', FILE_USE_INCLUDE_PATH);
    var_dump($file);
    $file_array = explode("\n", $file);
    var_dump($file_array);
    
    $nbrows = 0;
    foreach($file_array as $row)
    {
        $row_array = explode(";", $row);
        var_dump($row_array);

        $firstname = $row_array[0];
        $lastname  = $row_array[1];
        $email     = $row_array[2];

        // On prépare les données et on insére dans la base de données
        $query = $db->prepare('
            INSERT INTO '.$tablename.' (`firstname`, `lastname`, `email`)
                                VALUES (:firstname,  :lastname,  :email )
        ');
        $query->bindValue(':firstname', $firstname, PDO::PARAM_STR);
        $query->bindValue(':lastname', $lastname, PDO::PARAM_STR);
        $query->bindValue(':email', $email, PDO::PARAM_STR);
        
        if ($query->execute()) {
            echo "Insertion OK : ".$row;
            $nbrows += 1;
        }

    }

    // Contrôle du nombre de ligne
    $sql = "SELECT COUNT(1) nbrows FROM ".$tablename;
    $query = $db->prepare($sql);
    $query->execute();
    
    echo "<br /><br />";
    echo "Nombre de lignes insérées (Contrôle 1): ".($query->fetch())['nbrows']."<br /><br />";
    echo "Nombre de lignes insérées (Contrôle 2): ".$nbrows."<br /><br />";

?>



