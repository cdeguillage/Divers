<?php $this->layout('layout', ['title' => $data['title']]) ?>


<?php $this->start('main_content') ?>
    
    <!-- Featured Articles
     !-- --
     !-- Bootstrap Carousel
     !-- -->
    <div class="container">
        
        <article>
            
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    
                    <figure>
                        <img src="<?= $data['figure'] ?>" title="<?= $data['title'] ?>" alt="<?= $data['title'] ?>" class="img-responsive" />
                    </figure>
                    
                    <header class="page-header text-center">
                        <h1><?= $data['title'] ?></h1>
                    </header>
                    
                    <p><?= $data['content'] ?></p>
                    
                    <hr />
                    
                    <footer>
                        <span><i class="fa fa-user"></i>&nbsp;&nbsp;<?= $data['author'] ?></span><br />
                        <time><i class="fa fa-clock-o"></i>&nbsp;&nbsp;<?= $data['date_add'] ?></time>
                    </footer>
                    
                </div>
            </div>
            
            
        </article>
        
    </div>
    
<?php $this->stop('main_content') ?>