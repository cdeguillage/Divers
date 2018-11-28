<?php $this->layout('layout', ['title' => 'Accueil']) ?>


<?php $this->start('main_content') ?>
    
    <!-- Featured Articles
     !-- --
     !-- Flexslider
     !-- -->
    <div class="container">
        <div class="flexslider">
            <ul class="slides">
                <li>
                    <img class="img-responsive" />
                    <a class="flex-caption">Adventurer Cheesecake Brownie</a>
                </li>
            </ul>
        </div>
    </div>
    
    
    <!-- Work
     !-- -->
    <div class="container">
        
        <div class="alert alert-danger">
            La méthod Model lastInsertId() retourne toujours "0".
        </div>
        
        <pre>
CREATE TABLE `article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `date_add` datetime NOT NULL,
  `author` varchar(45) NOT NULL,
  `figure` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  UNIQUE KEY `email_UNIQUE` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;</pre>
        
        <h3>App</h3>
        <ol>
            <li>Intégration des dépendences des scripts du front-end avec le gestionnaire Bower</li>
            <li>Theme graphique sous Bootstrap 3</li>
            <li>Ajout de la bibliotheque font-awesome</li>
            <li>Ne sont pas géeré, tous les éléments du S.E.O.</li>
            <li>Recherche (TypeAhead.js) sur le titre.</li>
        </ol>
        
        <h3>Home</h3>
        <ol>
            <li>Chargement dynamique du carousel de la Home</li>
        </ol>
        
        <h3>Articles</h3>
        <ol>
            <li>Ajout de la page <a href="<?= $this->url('articles_index') ?>">Articles</a> qui index tout les articles en les affichant par lot de 5 en "Infinit Scroll".</li>
            <li>Ajout de la page de lecture d'un article</li>
            <li>Ajout de la page d'ajout d'articles (<a href="<?= $this->url('article_create') ?>"><i class="fa fa-plus"></i></a>)  (en mode single ou multiple) + flashbag de callback (je n'ai pas géré de cas d'erreur)</li>
            <li>Les images sont associées aléatoirement aux articles lors de l'enregistrement de ceux-ci.</li>
            <li>Les images ne sont pas optimisé pour les miniatures (1500px X 1000px) - récupération par Hotlink.</li>
        </ol>
        
        <h3>Users</h3>
        <ol>
            <li>Formulaire de connexion (<a href="<?= $this->url('security_signin') ?>"><i class="fa fa-lock"></i></a>)</li>
            <li>Création d'un compte utilisateur (<a href="<?= $this->url('security_signin') ?>"><i class="fa fa-user-plus"></i></a>), j'ai fixé le role "admin" pour tous les comptes</li>
            <li>Le formulaire de renouvellement de mot de passe est "factice" et n'est donc pas fonctionnel.</li>
        </ol>
        
        <h3>404</h3>
        <ol>
            <li>Personnalisation de la page 404 <a href="/Ooops">Ooops</a></li>
            <li>Video youtube en background... pour le fun.</li>
        </ol>
        
    </div>
    
<?php $this->stop('main_content') ?>



<?php $this->start('page_scripts') ?>
    <script src="<?= $this->assetUrl('lib/flexslider/jquery.flexslider.js') ?>"></script>
    <script>
        $(document).ready(function(){
            
            /* Get Slides parent & slide item template
             */
            var $slides = $('.flexslider > .slides');
            var $slide = $slides.html();
            
            /* Get featured articles
             */
            $.getJSON("<?= $this->url('ajax_articles_index', array("page" => 1)) ?>", function(data){
                
                // Reset carousel content
                $slides.html('');
                
                // On each item
                for (var index in data) {
                    
                    // get new indicator element
                    var slide = $($slide);
                    
                    // Set new indicator index
                    slide.find('img').attr('src', data[index].figure);
                    slide.find('.flex-caption')
                        .attr('href', "<?= $this->url('article_read', array("id" => '')) ?>"+data[index].id)
                        .html(data[index].title);
                    
                    // Set new indicator element onto the carousel
                    $slides.append(slide);
                    
                }
                
                $('.flexslider').flexslider({
                    animation: "slide"
                });
                
            });
        });
    </script>
<?php $this->stop('page_scripts') ?>
