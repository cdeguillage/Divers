<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title><?= $this->e($title) ?></title>

	<!-- Styles -->
	<link rel="stylesheet" href="<?= $this->assetUrl('lib/bootstrap/dist/css/bootstrap.css') ?>">
	<link rel="stylesheet" href="<?= $this->assetUrl('lib/components-font-awesome/css/font-awesome.css') ?>">
	<link rel="stylesheet" href="<?= $this->assetUrl('lib/flexslider/flexslider.css') ?>">
	<link rel="stylesheet" href="<?= $this->assetUrl('css/style.css') ?>">
	
</head>
<body>
	
	<!-- MAIN HEADER
	 !-- --
	 !-- This header will contain our main navbar
	 !-- -->
	
	<header class="main-header">
		<nav class="navbar">
			<div class="container">
				
				<!-- Brand Logo -->
				<div class="navbar-header">
					<a class="navbar-brand" href="<?= $this->url('default_home') ?>"><img src="data:image/gif;base64,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" /></a>
				</div>
				
				<!-- Navigation elements -->
				<div class="collapse navbar-collapse">
					<ul class="nav navbar-nav">
						<li><a href="<?= $this->url('default_home') ?>">Home</a></li>
						<li><a href="<?= $this->url('articles_index') ?>">Articles</a></li>
					</ul>
					
					<form class="navbar-form navbar-left" role="search">
						<div class="form-group">
							<input type="text" class="form-control typeahead" placeholder="Search" data-provide="typeahead">
						</div>
						<button type="submit" class="btn btn-default">Submit</button>
					</form>
					
					<ul class="nav navbar-nav navbar-right">
						
						<?php if(isset($_SESSION['user'])): ?>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION['user']['username']; ?> <span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li><a href="<?= $this->url('articles_list', array("page" => 1)) ?>"><i class="fa fa-list"></i>&nbsp;&nbsp;Tous les articles</a></li>
								<li><a href="<?= $this->url('article_create') ?>"><i class="fa fa-plus"></i>&nbsp;&nbsp;Ajouter des news</a></li>
								<li role="separator" class="divider"></li>
								<li><a href="<?= $this->url('security_logout') ?>">Logout</a></li>
							</ul>
						</li>
						<?php else: ?>
							<li><a href="<?= $this->url('security_signin') ?>"><i class="fa fa-lock"></i></a></li>
						<?php endif; ?>
						
					</ul>
				</div>
				
			</div>
		</nav>
	</header>
	
	
	<!-- MAIN CONTENT
	 !-- --
	 !-- In this element we will display the Page content
	 !-- -->
	
	<main class="main-content">
		<?= $this->section('main_content') ?>
	</main>
	
	
	<!-- MAIN FOOTER
	 !-- --
	 !-- In this element we will display the Page content
	 !-- -->
	
	<footer class="main-footer text-center">
		&copy; 2016
	</footer>
	
	
	<!-- SCRIPTS
	 !-- --
	 !-- Load Page's script
	 !-- -->
	
	<!-- Vendor Scripts -->
    <script src="<?= $this->assetUrl('lib/jquery/dist/jquery.js') ?>"></script>
    <script src="<?= $this->assetUrl('lib/bootstrap/dist/js/bootstrap.js') ?>"></script>
    <script src="<?= $this->assetUrl('lib/bootstrap3-typeahead/bootstrap3-typeahead.js') ?>"></script>
	
	<!-- Global App Scripts -->
	<script>
		var str = "est";
		var route_search = '<?= $this->url('ajax_search_index', array("expression" => "")) ?>';
		var route_article = '<?= $this->url('article_read', array("id" => "")) ?>';
	</script>
	<script src="<?= $this->assetUrl('js/app.js') ?>"></script>
	
	<!-- Pages Specific Scripts -->
	<?= $this->section('page_scripts') ?>

</body>
</html>