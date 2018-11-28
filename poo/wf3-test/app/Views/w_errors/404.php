<?php $this->layout('layout', ['title' => 'Page Hors course']) ?>



<?php $this->start('main_content'); ?>
    
    <div class="container">
        <div class="oops">
            <h1>Ooops !!</h1>
            <p class="lead">Cette page semble être hors course...</p>
        </div>
        <div id="video"></div>
    </div>
<?php $this->stop('main_content'); ?>



<?php $this->start('page_scripts') ?>
    <script src="<?= $this->assetUrl('lib/youtube-background-video/src/jquery.youtubebackground.js') ?>"></script>
    <script>
        $(document).ready(function(){
            $('#video').YTPlayer({
                fitToBackground: true,
                videoId: 'jYLrsFZk-MM',
                playerVars: {
                    modestbranding: 0,
                    autoplay: 1,
                    controls: 0,
                    showinfo: 0,
                    branding: 0,
                    rel: 0,
                    autohide: 0,
                    start: 27
                }
            });
        });
        
    </script>
<?php $this->stop('page_scripts') ?>
