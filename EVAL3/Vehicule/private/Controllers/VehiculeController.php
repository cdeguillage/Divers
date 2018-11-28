<?php
/**
 * VehiculeController
 *
 * @usage
 * $vehicules = new Vehicule();
 * 
 * @package  MaClass
 * @author   John Doe <john@example.com>
 * @version  $Revision: 1.3 $
 * @access   public
 * @see      http://www.example.com/maclass
 */
namespace Controllers;

use \Models\VehiculeModel;

class VehiculeController //extends DisplayController
{
    const TYPE = "vehicule";

    // Property $vehicules
    // Tableau de la liste des vehicules
    private $vehicules = [];

    // Instance VehiculeModel
    private $model;

    // Contructeur
    public function __construct()
    {
        $this->model = new VehiculeModel;
    }

    /**
     * Boucle sur la liste des vehicules et les affiche
     */
    public function viewAll()
    {
        echo "<div class='container'>";
        echo "<div class='row pt-3'>";
        echo "<table>";
        echo "<thead>";
        echo "<tr>";
        echo "<th>id_vehicule</th>";
        echo "<th>marque</th>";
        echo "<th>modele</th>";
        echo "<th>couleur</th>";
        echo "<th>immatriculation</th>";

        echo "<th>modification</th>";
        echo "<th>suppression</th>";

        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";
        foreach($this->model->getAll() as $vehicule)
        {
            echo "<tr>";
            echo "<td>".$vehicule->id_vehicule."</td>";
            echo "<td>".$vehicule->marque."</td>";
            echo "<td>".$vehicule->modele."</td>";
            echo "<td>".$vehicule->couleur."</td>";
            echo "<td>".$vehicule->immatriculation."</td>";

            // echo "<td><a href=''><i class='fa fa-pencil' aria-hidden='true'></i></a></td>";
            echo "<td><a href='#' class='vehicule-update' data-idveh='".$vehicule->id_vehicule."'>E</a></td>";
            echo "<td><a href='#' class='vehicule-delete' data-idveh='".$vehicule->id_vehicule."'><i class='fa fa-eraser' aria-hidden='true'></i></a></td>";

            echo "</tr>";
        }
        echo "</tbody>";
        echo "</table>";
        echo "</div>";
        echo "</div>";

        echo "<hr>";
        echo "<div id='forms'>";
        echo "</div>";

    }

    // Récupére 1 véhicule à partir de son ID
    public function getVehicule($_id)
    {
        return $this->model->getOne($_id);
    }

    // Mise à jour du véhicule à partir de son ID
    public function update($_id_vehicule, $_marque, $_modele, $_couleur, $_immatriculation)
    {
        return $this->model->update($_id_vehicule, $_marque, $_modele, $_couleur, $_immatriculation);
    }

    // Création d'un nouveau véhicule
    public function create($_marque, $_modele, $_couleur, $_immatriculation)
    {
        return $this->model->create($_marque, $_modele, $_couleur, $_immatriculation);
    }

        // Suppression d'un véhicule
    public function delete($_id_vehicule)
    {
        return $this->model->delete($_id_vehicule);
    }

}