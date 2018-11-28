<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Voiture</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<?php

    // Class:
    // require_once "Vehicule.php";
    // require_once "scenario.php";

    // Chargement automatique des classes
    function autochargement($nomClass) {
        $nomClass = preg_replace("/\\\/", "/", $nomClass);
        include_once "class/".$nomClass . '.php';
    }
    spl_autoload_register('autochargement');

    // Déclaration des voitures
    require_once "Vehicule_declaration_PHP.php";

    // Création de l'objet scénario
    $scenario = new Scenario();

?>


<!-- Container -->
<div class="container">

    <!-- Bouton RESET -->
    <div class="row justify-content-around">
        <a href="" class="col-1 btn btn-dark" id="scenario-reset">Reset !</a>
    </div>

    <!-- Container Mise en page -->
    <div class="m-5 pt-5 pl-5 pr-5">

        <!-- Voitures -->
        <div class="row" id="voitures">


                <!-- Voiture 1 -->
                <div class="col-4">
                <div class="card">
                    <img class="card-img-top" src="assets/img/voiture1.png" alt="Voiture 1">
                    <div class="card-body">
                        <!-- <h5 class="card-title">Voiture 1</h5> -->
                        <p class="card-text"><strong>Propriétés :</strong>
                            <?php $voiture1->DisplayCard(); ?>
                        </p>
                        <div class="row justify-content-around">
                            <a href="" class="col-5 btn btn-success" id="<?= $voiture1_start_cufa['instance'].'-'.$voiture1_start_cufa['fonction']; ?>">Démarrer</a>
                            <a href="" class="col-5 btn btn-danger" id="<?= $voiture1_stop_cufa['instance'].'-'.$voiture1_stop_cufa['fonction']; ?>">Stopper</a>
                        </div>
                        <div class="row"><br /></div>
                        <div class="row justify-content-around">
                            <a href="" class="col-10 btn btn-info" id="<?= $voiture1_go_cufa['instance'].'-'.$voiture1_go_cufa['fonction']; ?>">Accélérer / Ralentir</a>
                        </div>
                        <div class="row"><br /></div>
                        <div class="row justify-content-around">
                            <a href="" class="col-5 btn btn-warning" id="<?= $voiture1_turnL_cufa['instance'].'-'.$voiture1_turnL_cufa['fonction'].'-'.$voiture1_turnL_cufa['par1']; ?>"><i class="fas fa-arrow-left"></i></a>
                            <a href="" class="col-5 btn btn-warning" id="<?= $voiture1_turnR_cufa['instance'].'-'.$voiture1_turnR_cufa['fonction'].'-'.$voiture1_turnR_cufa['par1']; ?>"><i class="fas fa-arrow-right"></i></span></a>
                        </div>

                    </div>
                </div>
                </div>

                <!-- Voiture 2 -->
                <div class="col-4">
                <div class="card">
                    <img class="card-img-top" src="assets/img/voiture2.png" alt="Voiture 2">
                    <div class="card-body">
                        <!-- <h5 class="card-title">Voiture 2</h5> -->
                        <p class="card-text"><strong>Propriétés :</strong>
                            <?php $voiture2->DisplayCard(); ?>
                        </p>
                        <div class="row justify-content-around">
                            <a href="." class="col-5 btn btn-success" id="<?= $voiture2_start_cufa['instance'].'-'.$voiture2_start_cufa['fonction']; ?>">Démarrer</a>
                            <a href="" class="col-5 btn btn-danger" id="<?= $voiture2_stop_cufa['instance'].'-'.$voiture2_stop_cufa['fonction']; ?>">Stopper</a>
                        </div>
                        <div class="row"><br /></div>
                        <div class="row justify-content-around">
                            <a href="" class="col-10 btn btn-info" id="<?= $voiture2_go_cufa['instance'].'-'.$voiture2_go_cufa['fonction']; ?>">Accélérer / Ralentir</a>
                        </div>
                        <div class="row"><br /></div>
                        <div class="row justify-content-around">
                            <a href="" class="col-5 btn btn-warning" id="<?= $voiture2_turnL_cufa['instance'].'-'.$voiture2_turnL_cufa['fonction'].'-'.$voiture2_turnL_cufa['par1']; ?>"><i class="fas fa-arrow-left"></i></a>
                            <a href="" class="col-5 btn btn-warning" id="<?= $voiture2_turnR_cufa['instance'].'-'.$voiture2_turnR_cufa['fonction'].'-'.$voiture2_turnR_cufa['par1']; ?>"><i class="fas fa-arrow-right"></i></a>
                        </div>

                    </div>
                </div>
                </div>

                <!-- Voiture 3 -->
                <div class="col-4">
                <div class="card">
                    <img class="card-img-top" src="assets/img/voiture3.png" alt="Voiture 3">
                    <div class="card-body">
                        <!-- <h5 class="card-title">Voiture 3</h5> -->
                        <p class="card-text"><strong>Propriétés :</strong>
                            <?php $voiture3->DisplayCard(); ?>
                        </p>
                        <div class="row justify-content-around">
                            <a href="" class="col-5 btn btn-success" id="<?= $voiture3_start_cufa['instance'].'-'.$voiture3_start_cufa['fonction']; ?>">Démarrer</a>
                            <a href="" class="col-5 btn btn-danger" id="<?= $voiture3_stop_cufa['instance'].'-'.$voiture3_stop_cufa['fonction']; ?>">Stopper</a>
                        </div>
                        <div class="row"><br /></div>
                        <div class="row justify-content-around">
                            <a href="" class="col-10 btn btn-info" id="<?= $voiture3_go_cufa['instance'].'-'.$voiture3_go_cufa['fonction']; ?>">Accélérer / Ralentir</a>
                        </div>
                        <div class="row"><br /></div>
                        <div class="row justify-content-around">
                            <a href="" class="col-5 btn btn-warning" id="<?= $voiture3_turnL_cufa['instance'].'-'.$voiture3_turnL_cufa['fonction'].'-'.$voiture3_turnL_cufa['par1']; ?>"><i class="fas fa-arrow-left"></i></a>
                            <a href="" class="col-5 btn btn-warning" id="<?= $voiture3_turnR_cufa['instance'].'-'.$voiture3_turnR_cufa['fonction'].'-'.$voiture3_turnR_cufa['par1']; ?>"><i class="fas fa-arrow-right"></i></a>
                        </div>

                    </div>
                </div>
                </div>

            </div>

        </div>  <!-- Voitures -->

        <!-- Queue -->
        <div class="row">

            <div class="col pl-5 pr-5">
            <div class="card">
                <!-- <img class="card-img-top card-img-top-backcolor" src="assets/img/evenements.png" alt="Evenements" style="width: 50px; heigth: 100%;"> -->
                <span class="card-img-top-backcolor pl-3 pr-1 pt-1 pb-1">Evénements</span>
                <div class="card-body" id="queue">

                    <!-- Queue d'affichage du scénario -->
                    <!-- <div id="queue_max" class="queue_hidden">0</div> -->
                    <!-- <div id="queue_0"></div>
                    <div id="queue_1"></div>
                    <div id="queue_2"></div>
                    <div id="queue_3"></div>
                    <div id="queue_4"></div>
                    <div id="queue_5"></div>
                    <div id="queue_6"></div>
                    <div id="queue_7"></div>
                    <div id="queue_8"></div>
                    <div id="queue_9"></div> -->

                </div>
            </div>
            </div>

        </div>  <!-- Queue -->

    </div>  <!-- Container Mise en page -->

    <div class="row"><div class="m-5"></div></div>

</div> <!-- Container -->

    <!-- BOOTSTRAP -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <!-- SCRIPT JS -->
    <?php require_once "Vehicule_declaration_JS.php"; ?>
    <script type="text/javascript" src="assets/js/script.js"></script>

</body>
</html>

