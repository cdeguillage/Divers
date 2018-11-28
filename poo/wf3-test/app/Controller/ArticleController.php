<?php

namespace Controller;

use \W\Controller\Controller;
use \Model\ArticleModel;

class ArticleController extends Controller
{
	/* Index
	 * --
	 * List of articles
	 */
	public function index()
	{
		$this->show('articles/index');
	}
	
	
	
	/* Index Paginnated
	 * --
	 * List of articles with pagination (for logged user only)
	 */
	public function indexPaginnated($page)
	{
		/* restriction
		 */
		
		$this->allowTo('admin');
		
		
		/* Define some vars
		 */
		
		global $w_config;
		
		$article 	= new ArticleModel();
		
		// Query limits
		$limit 		= isset($w_config['per_page_items']) ? $w_config['per_page_items'] : 5;
		$offset 	= ($page-1) * $limit;
		
		// Pagination
		$total 		= count($article->findAll());
		$lastPage 	= ceil($total / $limit);
		
		
		/* Get articles
		 */
		
		$data = $article->findAll("date_add", "ASC", $limit, $offset);
		
		// No articles for this page
		if(count($data) == 0) return $this->redirect('/Ooops');
		
		$data_ = $data;
		$data = array();
		foreach($data_ as $d)
		{
			// Trunc article content (147 + ... = 150 chars)
			if (strlen($d['content']) > 147) $d['content'] = substr($d['content'], 0, 147)."...";
			array_push($data,$d);
		}
		
        
		/* Response
		 */
		
		$this->show('articles/list', array(
			"articles" => $data,
			"page" => $page,
			"lastPage" => $lastPage
		));
	}



	/* Read
	 * --
	 * Single Article
	 */
	public function read($id)
	{
		
		
		/* Define some vars
		 */
		
		$article = new ArticleModel();
		
		
		/* Get articles
		 */
		
		if ($data = $article->find($id))
		{
			// Connvert DateAdd
			$date = new \DateTime($data['date_add']);
			$data['date_add'] = $date->format('d/m/Y H:i');
		}
		
		// Article not found > redirect to the 404
		else return $this->redirect('/Ooops');
		
        
		/* Response
		 */
		
		$this->show('articles/read', array(
			"data" => $data
		));
	}



	/* Create
	 * --
	 * Single Article
	 */
	public function create()
	{
		/* restriction
		 */
		$this->allowTo('admin');
		
		
		/* Define some vars
		 */
		
		if (!isset($_SESSION['flashbag']))
			$_SESSION['flashbag'] = array();
		
		
		/* Form treatment
		 * --
		 * Multiple Articles treatment
		 */
		
		if (isset($_FILES['articles'])) {
			
			$data = array();
			
			// retrieve file content
			if ($_FILES['articles']['type']['json'] == "application/json") {
				$data = file_get_contents($_FILES['articles']['tmp_name']['json']);
				$data = json_decode($data, true);
			}
			
			// Loop on file content 
			foreach ($data as $article) {
				self::addArticle($article);
			}
			
		}
		
		
		/* Form treatment
		 * --
		 * Single Article treatment
		 */
		else if (isset($_POST['article'])) {
			
			// Save data
			$insertResult = self::addArticle($_POST['article']);
			
			// Flashbag message
			array_push($_SESSION['flashbag'], $insertResult);
			
			// Redirect to prevent multipost-refresh
			return $this->redirectToRoute('article_create');
		}
		
		
		
		/* Flashbag
         * --
         *  flashbag message and reset flashbag session
		 */
		
		$flashbag = $_SESSION['flashbag'];
		unset($_SESSION['flashbag']);
		
        
		/* Response
		 */
		
		$this->show('articles/create', array(
			"title" => "Create a new article",
			"flashbag" => $flashbag
		));
		
	}



	/* Add Article
	 * --
	 * this private methos is used to insert or update an article onto database
	 */
	private function addArticle($data) {
		
		// Init our $article object
		$article = new ArticleModel();
		
		// Images (hotlink address)
		$images = array(
			"http://www.kitesista.com/wp-content/uploads/2016/03/large-Kari-copie.jpg",
			"https://assets.rbl.ms/578174/1200x600.jpg",
			"http://images.askmen.com/1200x600/entertainment/austin/the-joy-of-punching-1068942-TwoByOne.jpg",
			"http://www.gelaendewagen.at/images52/stadium_super_trucks/stadium_super_trucks_2.jpg",
			"http://www.northshorevisitor.com/wp-content/uploads/2015/04/dog-sled.jpg"
		);
		
		
		// Add some data
		if (!isset($data['id']))		$data['id'] = null;
		if (!isset($data['date_add'])) 	$data['date_add'] = date("Y-m-d H:i:s");
		if (!isset($data['author'])) 	$data['author'] = "Author Name";
		$data['figure'] = $images[mt_rand(0, count($images)-1)];
		
		
		// If the article $id ALREADY exist, we update the entry
		if ($article->find($data['id']))
			$article->update($data, $data['id']);
		
		// If the article $id NOT exist, we insert the entry
		else {
			unset($data['id']);
			$article->insert($data);
		}
		
		return array(
			"status" => "success",
			"message" => "L'article à été ajouté.",
			"article" => $article->lastInsertId()
		);
	}

}