<?php

var_dump($_GET);
var_dump($_POST);


    // Models
    function autoload_models($nomClass) {
        $nomClass = preg_replace("/\\\/", "/", $nomClass);
        include_once "../private/".$nomClass . '.php';
    }
    spl_autoload_register('autoload_models');

    // Controllers
    function autoload_controllers($nomClass) {
        $nomClass = preg_replace("/\\\/", "/", $nomClass);
        include_once "../private/".$nomClass . '.php';
    }
    spl_autoload_register('autoload_controllers');
    
    // Déclaration namespace Véhicule
    use \Controllers\VehiculeController as Vehicule;
    
    // Traitement du formulaire
    $id_vehicule = $marque = $modele = $couleur = $immatriculation = null;
    
    // ID du véhicule existant ???
    // if (empty($_REQUEST['id']))
    // {
        // die("Le véhicule n'est pas idendifié !!!");
    //     echo "Ajout";
    // }
    // else
    if (!empty($_REQUEST['id']))
    {
        $id_vehicule = $_REQUEST['id'];

        // Constructeur Vehicule
        $vehicules = new Vehicule();
        $vehicule = $vehicules->getVehicule($id_vehicule);

var_dump($vehicule);

        // Récupration des valeurs
        $marque = $vehicule->marque;
        $modele = $vehicule->modele;
        $couleur = $vehicule->couleur;
        $immatriculation = $vehicule->immatriculation;
    }



// var_dump($_REQUEST);

    // Insertion dans la BDD
    if (!empty($_POST)) {
        $id_vehicule = empty($_REQUEST['id_vehicule']) ? "" : $_REQUEST['id_vehicule'];
        $marque = $_REQUEST['marque'];
        $modele = $_REQUEST['modele'];
        $couleur = $_REQUEST['couleur'];
        $immatriculation = $_REQUEST['immatriculation'];

        // Pour la gestion des erreurs
        $errors = [];

        // Vérifier la marque
        if (empty($marque))
        {
            $errors['marque'] = 'La marque n\'est pas valide';
        }

        // Vérifier le modele
        if (empty($modele))
        {
            $errors['modele'] = 'Le modele n\'est pas valide';
        }

        // Vérifier la couleur
        if (empty($couleur))
        {
            $errors['couleur'] = 'La couleur n\'est pas valide';
        }

        // Vérifier l'immatriculation
        if (empty($immatriculation))
        {
            $errors['immatriculation'] = 'L\'immatriculation n\'est pas valide';
        }

        // Aucune erreur dans le formulaire - On insère
        if (empty($errors) && ($_REQUEST['req'] === "update"))
        {
            $success = $vehicule->update($id_vehicule, $marque, $modele, $couleur, $immatriculation);
        }
        else if (empty($errors) && ($_REQUEST['req'] === "add"))
        {
            $success = $vehicule->create($marque, $modele, $couleur, $immatriculation);
        }
        else if (empty($errors) && ($_REQUEST['req'] === "delete"))
        {
            $success = $vehicule->delete($id_vehicule);
        }
    }

?>
    <main class="container">

        <?php if (isset($success) && $success) { ?>
            <div class="alert alert-success alert-dismissible fade show">
                La pizza <strong><?php echo $name; ?></strong> a bien été ajouté avec l'id <strong><?php echo $db->lastInsertId(); ?></strong> !
                <button type="button" class="close" data-dismiss="alert">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php } ?>

        <form method="POST">
            <div class='card-body bg-white'>
                <div class="row">
                    <!-- Colonne 1 -->
                    <div class="col">
                        <div class="form-group p-3">
                            <label for="marque">Marque :</label>
                            <input type="text" name="marque" id="marque" class="form-control <?php echo isset($errors['marque']) ? 'is-invalid' : null; ?>" value="<?php echo $marque; ?>">
                            <?php if (isset($errors['marque'])) {
                                echo '<div class="invalid-feedback">';
                                echo $errors['marque'];
                                echo '</div>';
                            } ?>

                            <label for="modele">Modèle :</label>
                            <input type="text" name="modele" id="modele" class="form-control <?php echo isset($errors['modele']) ? 'is-invalid' : null; ?>" value="<?php echo $modele; ?>">
                            <?php if (isset($errors['modele'])) {
                                echo '<div class="invalid-feedback">';
                                echo $errors['modele'];
                                echo '</div>';
                            } ?>

                            <label for="couleur">Couleur :</label>
                            <input type="text" name="couleur" id="couleur" class="form-control <?php echo isset($errors['couleur']) ? 'is-invalid' : null; ?>" value="<?php echo $couleur; ?>">
                            <?php if (isset($errors['couleur'])) {
                                echo '<div class="invalid-feedback">';
                                echo $errors['couleur'];
                                echo '</div>';
                            } ?>

                            <label for="immatriculation">Immatriculation :</label>
                            <input type="text" name="immatriculation" id="immatriculation" class="form-control <?php echo isset($errors['immatriculation']) ? 'is-invalid' : null; ?>" value="<?php echo $immatriculation; ?>">
                            <?php if (isset($errors['immatriculation'])) {
                                echo '<div class="invalid-feedback">';
                                echo $errors['immatriculation'];
                                echo '</div>';
                            } ?>

                        </div>
                        <button type="submit" class="btn btn-dark btn-block">Ajouter ce véhicule</button>
                    </div>
                </div><!-- /.row -->
            </div><!-- /.card-body -->
        </form>
    </main><!-- /.container -->
