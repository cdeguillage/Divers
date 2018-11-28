<?php
/**
 * Ce commentaire apporte une documentation générale sur la classe MaClass
 *
 * @usage
 * $monObjet = new MaClass();
 * 
 * @package  MaClass
 * @author   John Doe <john@example.com>
 * @version  $Revision: 1.3 $
 * @access   public
 * @see      http://www.example.com/maclass
 */
namespace Models;

class VehiculeModel
{
    // Stocke l'instance de PDO
    private $db;

    public function __construct()
    {
        // Instance PDO
        try
        {
            $this->db = new \PDO("mysql:dbname=vtc;host=127.0.0.1", "root", "",
                [
                    \PDO::ATTR_ERRMODE => \PDO::ERRMODE_WARNING,
                    \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
                ]
            );
            // echo "Connection OK !";
        }
        catch(\Exception $e)
        {
            echo "Connection échouée : ".$e->getMessage();
        }
    }

    public function getTable()
    {
        // Récupére le namespace
        $table = get_called_class();

        // Explose la chaine en tableau
        $table = explode("\\", $table);

        // Récupére le dernier élément
        // $table = $table[count($table)-1];
        $table = end($table);

        $table = str_replace("Model", null, $table);
        $table = strtolower($table);

        // Retourne le nom de la table
        return $table;
    }

    // List / Retrieve All
    public function getAll()
    {
        $query = $this->db->prepare("SELECT * FROM ".$this->getTable());
        $query->execute();
        return $query->fetchAll(\PDO::FETCH_OBJ);
    }

    // C - Create - Insert
    public function create($_marque, $_modele, $_couleur, $_immatriculation)
    {
        $query = $db->prepare("
                    INSERT INTO vehicule (`marque`, `modele`, `couleur`, `immatriculation`)
                    VALUES               (:marque,  :modele,  :couleur,  :immatriculation )
        ");
        $query->bindValue(':marque', $_marque, PDO::PARAM_STR);
        $query->bindValue(':modele', $_modele, PDO::PARAM_STR);
        $query->bindValue(':couleur', $_couleur, PDO::PARAM_STR);
        $query->bindValue(':immatriculation', $_immatriculation, PDO::PARAM_STR);
        $query->bindValue(':id_vehicule', $_id_vehicule, PDO::PARAM_STR);
        
        if ($query->execute()) {
            return true;
        }
    }

    // R - Read / Retrieve One
    public function getOne($_id)
    {
        $query = $this->db->prepare("
                    SELECT *
                      FROM ".$this->getTable()."
                     WHERE id_vehicule = :id
        ");
        $query->bindValue(":id", $_id, \PDO::PARAM_STR);
        $query->execute();
        return $query->fetch(\PDO::FETCH_OBJ);
    }

    // U - Update
    public function update($_id_vehicule, $_marque, $_modele, $_couleur, $_immatriculation)
    {
        $query = $db->prepare("
                    UPDATE vehicule
                       SET `marque`          = :marque,
                           `modele`          = :modele,
                           `couleur`         = :couleur,
                           `immatriculation` = :immatriculation
                    WHERE  id_vehicule       = :id_vehicule
        ");
        $query->bindValue(':marque', $_marque, PDO::PARAM_STR);
        $query->bindValue(':modele', $_modele, PDO::PARAM_STR);
        $query->bindValue(':couleur', $_couleur, PDO::PARAM_STR);
        $query->bindValue(':immatriculation', $_immatriculation, PDO::PARAM_STR);
        $query->bindValue(':id_vehicule', $_id_vehicule, PDO::PARAM_STR);
        
        if ($query->execute()) {
            return true;
        }
    }

    // D - Delete
    public function delete($_id_vehicule)
    {
        $query = $db->prepare("
                    DELETE vehicule
                    WHERE  id_vehicule = :id_vehicule
        ");
        $query->bindValue(':id_vehicule', $_id_vehicule, PDO::PARAM_STR);
        
        if ($query->execute()) {
            return true;
        }
    }

}