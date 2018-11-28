<?php $this->layout('layout', ['title' => 'Login']) ?>


<?php $this->start('main_content') ?>
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            
            <div class="page-header text-center">
                <h3>Reset Password</h3>
            </div>
            
            <form>
                <div class="form-group">
                    <label for="login">Email address</label>
                    <input type="email" class="form-control" id="login" placeholder="Login">
                </div>
                <button type="submit" class="btn btn-default">Submit</button>
            </form>
            
            <hr />
            
            <i class="fa fa-angle-right"></i>&nbsp;&nbsp;<a href="<?= $this->url('security_signin') ?>">M'identifier</a>
            
        </div>
    </div>
<?php $this->stop('main_content') ?>