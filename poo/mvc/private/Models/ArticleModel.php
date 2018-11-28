<?php

namespace Models;

class ArticleModel
{
    // Stocke l'instance de PDO
    private $db;

    public function __construct()
    {
        // Récupére le nom de la table en dynamique
        // Test de fonction pendant le développement
        // $this->getTable();

        // Instance PDO
        try
        {
            $this->db = new \PDO("mysql:dbname=wp-perso;host=127.0.0.1", "root", "",
                [
                    \PDO::ATTR_ERRMODE => \PDO::ERRMODE_WARNING,
                    \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
                ]
            );
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
    public function create()
    {

    }

    // R - Read / Retrieve One
    public function getOne()
    {

    }

    // U - Update
    public function update()
    {

    }

    // D - Delete
    public function delete()
    {

    }

}