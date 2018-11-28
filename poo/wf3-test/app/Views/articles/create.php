<?php $this->layout('layout', ['title' => $title]) ?>



<?php $this->start('main_content') ?>
    <div class="container">
        
        <div class="page-header">
            <h1>Ajouter des articles</h1>
        </div>
        
        
        <!-- Articles Form
         !-- --
         !-- Bootstrap Carousel
         !-- -->
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                
                <!-- Flashbag message -->
                <?php foreach($flashbag as $message): ?>
                    <div class="alert alert-<?=$this->e($message['status'])?>">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <?=$this->e($message['message'])?>
                        
                        <?php if ($message['status'] == 'success'): ?>
                            <a href="<?=$this->url("article_read", array("id" => $message['article'])) ?>">Lire l'article</a>
                        <?php endif ?>
                    </div>
                <?php endforeach ?>
                
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a data-target="#add-single" role="tab" data-toggle="tab">Ajouter un article</a></li>
                    <li role="presentation"><a data-target="#add-multiple" role="tab" data-toggle="tab">Importer des articles</a></li>
                </ul>
                
                <!-- Tab panes -->
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="add-single">
                        
                        <form action="<?= $this->url('article_create') ?>" method="post" name="addSingle">
                            
                            <div class="form-group">
                                <label for="article_title">Titre de l'article</label>
                                <input type="text" class="form-control" id="article_title" name="article[title]">
                            </div>
                            
                            <div class="form-group">
                                <label for="article_content">Contenu de l'article</label>
                                <textarea class="form-control" id="article_content" name="article[content]" rows="8"></textarea>
                            </div>
                            
                            <button type="submit" class="btn btn-default">Ajouter</button>
                        </form>
                        
                    </div>
                    <div role="tabpanel" class="tab-pane" id="add-multiple">
                        
                        <form action="<?= $this->url('article_create') ?>" method="post" name="addMultiple" enctype="multipart/form-data">
                        
                            <div class="form-group">
                                <label for="articles_json">File input</label>
                                <input type="file" id="articles_json" name="articles[json]">
                            </div>
                            
                            <button type="submit" class="btn btn-default">Ajouter</button>
                        </form>
                        
                    </div>
                </div>
                
            </div>
        </div>
    </div>
<?php $this->stop('main_content') ?>