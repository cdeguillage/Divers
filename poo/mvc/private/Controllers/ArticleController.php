<?php

namespace Controllers;

use \Models\ArticleModel;

class ArticleController extends PostController
{
    const TYPE = "article";

    // Property $articles
    // Tableau de la liste des articles
    private $articles = [];

    // Instance AticleModel
    private $model;

    // Contructeur
    public function __construct()
    {
        $this->model = new ArticleModel;
    }

    /**
     * Boucle sur la liste des articles et les affiche
     */
    public function viewAll()
    {
        foreach($this->model->getAll() as $article)
        {
            echo "<h3>".$article->title."</h3>";
            echo "<div>Slug : ".$article->slug."</div>";
            echo "<div>".$article->content."</div>";
            echo "<hr>";
        }
    }

    public function getTitle()
    {
        
    }

    public function getSlug()
    {

    }

    public function getContent()
    {

    }

    
}