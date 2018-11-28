<?php $this->layout('layout', ['title' => 'Articles']) ?>


<?php $this->start('main_content') ?>
    
    <!-- Featured Articles
     !-- --
     !-- Bootstrap Carousel
     !-- -->
    <div class="container">
        
        <div class="page-header text-center">
            <h1>Tous les articles <small>(<?= $this->e($page) ?> / <?= $this->e($lastPage) ?>)</small></h1>
        </div>
        
        <?php foreach($articles as $article): ?>
        <article class="article-admin">
            <figure>
                <img class="img-responsive img-thumbnail" src="<?=$this->e($article['figure'])?>" />
            </figure>
            <h2><?=$this->e($article['title'])?></h2>
            <div><?=$this->e($article['content'])?></div>
            <a href="<?=$this->url("article_read", array("id" => $article['id'])) ?>">Lire l'article</a>
            <hr />
        </article>
        <?php endforeach; ?>
        
        <nav>
            <ul class="pagination">
                <li>
                  <li><a href="<?= $this->url('articles_list', array("page" => 1)) ?>" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                  </a>
                </li>
                <?php for($i=1; $i<=$lastPage; $i++): ?>
                <li><a href="<?= $this->url('articles_list', array("page" => $i)) ?>"><?php echo $i; ?></a></li>
                <?php endfor; ?>
                <li>
                  <li><a href="<?= $this->url('articles_list', array("page" => $lastPage)) ?>" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                  </a>
                </li>
            </ul>
        </nav>

    </div>
    
<?php $this->stop('main_content') ?>