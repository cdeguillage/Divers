<?php
	
	$w_routes = array(
		
		/* Homepage
		 */
		
		['GET', '/', 'Default#home', 'default_home'],
		
		
		/* Articles
		 * --
		 * Index : List of articles
		 * Read : Single article
		 */ 
		['GET', '/articles', 'Article#index', 'articles_index'],
		['GET', '/articles/list/[:page]', 'Article#indexPaginnated', 'articles_list'],
		['GET|POST', '/article/create', 'Article#create', 'article_create'],
		['GET', '/article/[:id]', 'Article#read', 'article_read'],
		
		
		/* Security
		 * --
		 */ 
		['GET|POST', '/signin', 'Security#signin', 'security_signin'],
		['GET|POST', '/signup', 'Security#signup', 'security_signup'],
		['GET', '/logout', 'Security#logout', 'security_logout'],
		['GET|POST', '/lost-password', 'Security#resetPwd', 'security_reset_pwd'],
		
		
		
		/* Ajax Getter
		 * --
		 * Index : List of articles
		 * Read : Single article
		 */ 
		['GET', '/ajax/articles/[:page]', 'Ajax#articles', 'ajax_articles_index'],
		['GET', '/ajax/search/q=[:expression]', 'Ajax#search', 'ajax_search_index'],
	);