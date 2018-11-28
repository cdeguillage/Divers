<?php

namespace Controller;

use \W\Controller\Controller;
use \Model\ArticleModel;

class AjaxController extends Controller
{

	/** Articles
	 * --
	 * Get the list of last articles
	 * --
	 * @return (json) Return a jSon array of $data
	 */
	public function articles($page = 1)
	{
		/* Define some vars
		 */
		
		$model = new ArticleModel();
		$limit = 5;
		$offset = ($page-1) * $limit;
		
		
		/* Get Articles
		 */
		
		$data = $model->findAll("date_add", "DESC", $limit, $offset);
		$data_ = $data;
		$data = array();
		foreach($data_ as $d) {
			if (strlen($d['content']) > 147) {
				$d['content'] = substr($d['content'], 0, 147)."...";
			}
			array_push($data,$d);
		}
		
		
		/* jSon response
		 */
		
		$this->showJson($data);
	}


	/** Search
	 * --
	 * Get the list of last articles for typeahead
	 * --
	 * @return (json) Return a jSon array of $data
	 */
	public function search($expression = null)
	{
		/* Define some vars
		 */
		
		$model = new ArticleModel();
		$limit = 5;
		
		
		/* Get featured Articles
		 * --
		 * Get articles with th $search method
		 * Prepare data for TypeAhead
		 */
		
		$data = $model->search(array(
			"title" => urldecode($expression)
		));
		
		$data_ = $data;
		$data = array();
		foreach ($data_ as $val) {
			array_push($data, (object) array(
				"id" => $val['id'],
				"name" => $val['title']
			));
		}
		
		
		/* jSon response
		 */
		
		$this->showJson($data);
	}

}