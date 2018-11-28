(function(){
    "use strict";
    
    
    var $input = $('.typeahead');
    
    $input
        .typeahead({
            source: function (query, process) {
                return $.get(route_search+query, function (data) {
                    return process(data);
                });
            },
            afterSelect: function(data){
                window.location.href = route_article.concat(data.id);
            }
        });
})();