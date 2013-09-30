// Hide and show effects
function hideElement(element) {
    $(element).effect( "fade", {}, 50 );
};
function showElement(element) {
    setTimeout(function() {
        $( element ).fadeIn();
    }, 200 );
};  
        
$(document).ready(function() {     
    $('body').on('redmineProjectShow', 
        function(event, argument){
            //for each div with class localize
            $('.widgetRedmineProjectDetail').each(function() {
                var element = $(this);
                hideElement(element);
                $scope = element.scope();
                $.ajax( {
                    "url": $(this).data("api") + "/" + argument + ".json",
                    "dataType": 'json',
                    "success": function ( json ) {
                        $scope.result = json;
                        $scope.$apply();
                        showElement(element);
                    }
                });    
            });
        });   
} );  
