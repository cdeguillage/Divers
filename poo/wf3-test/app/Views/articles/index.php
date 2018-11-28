<?php $this->layout('layout', ['title' => 'Articles']) ?>


<?php $this->start('main_content') ?>
    
    <!-- Featured Articles
     !-- --
     !-- Bootstrap Carousel
     !-- -->
    <div class="container">
        
        <div class="page-header text-center">
            <h1>Nos articles <small>Bonne lecture ;-)</small></h1>
        </div>
        
        <section class="row section">
            <article class="col-md-3 article" style="height: 480px">
                <figure>
                    <img class="img-responsive article-figure" />
                </figure>
                <h2 class="article-title"></h2>
                <div class="article-content"></div>
                <a class="btn btn-info btn-xs pull-right article-button">Lire l'article</a>
            </article>
        </section>
        
    </div>
    
<?php $this->stop('main_content') ?>



<?php $this->start('page_scripts') ?>
    <script>
        
        $(document).ready(function() {
            
            var win = $(window);
            var $section = $('.section');
            var $article = $section.html();
            var $page = 0;
            var url = "<?= $this->url('ajax_articles_index', array("page" => '')) ?>";
            
            // Reset article parent
            $section.html('');
            
            // Each time the user scrolls
            win.scroll(function() {
                // End of the document reached?
                if ($(document).height() - win.height() == win.scrollTop()) {
                    getArticles($page+1);
                }
            });
            
            // Get first page
            getArticles(1);
            
            function getArticles(page) {
                
                if (page > $page) {
                    $.getJSON(url+page, function(data){
                        
                        // $i just to know if we can increment the $page number or not.
                        var i=0;
                        
                        // On each item
                        for (var index in data) {
                            
                            // get new article element
                            var article = $($article);
                            
                            // Set data
                            article.find('.article-figure').attr('src', data[index].figure);
                            article.find('.article-title').html(data[index].title);
                            article.find('.article-content').html(data[index].content);
                            article.find('.article-button').attr('href', "<?= $this->url('article_read', array("id" => '')) ?>"+data[index].id);
                            
                            // Set new article element onto the section
                            $section.append(article);
                            
                            i++;
                        }
                        
                        // Define the number of the current page only if the query have 5 results
                        if (i <= 5) $page = page;
                        
                    });
                }
            }
        });
        
        
    </script>
<?php $this->stop('page_scripts') ?>