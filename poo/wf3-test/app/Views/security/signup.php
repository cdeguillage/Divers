<?php $this->layout('layout', ['title' => 'Login']) ?>


<?php $this->start('main_content') ?>
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            
            <div class="page-header text-center">
                <h3>Sign Up</h3>
            </div>
            
            
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
            
            
            <form action="<?= $this->url('security_signup') ?>" method="post">
                <div class="form-group">
                    <label for="username">Prénom & Nom</label>
                    <input type="text" class="form-control" id="username" name="user[username]" placeholder="Prénom Nom">
                </div>
                
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="user[email]" placeholder="Email">
                </div>
                
                <div class="form-group">
                    <label for="password">Mot de passe</label>
                    <input type="password" class="form-control" id="password" name="user[password]" placeholder="Mot de passe">
                </div>
                
                <button type="submit" class="btn btn-default">Submit</button>
            </form>
            
            <hr />
            
            <i class="fa fa-angle-right"></i>&nbsp;&nbsp;<a href="<?= $this->url('security_signin') ?>">J'ai déjà un compte</a>
            
        </div>
    </div>
<?php $this->stop('main_content') ?>