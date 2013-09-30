var project = "";
function widgetProjectDetails($scope) {
    $scope.project = project;
    $scope.$apply();
}   
  
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
            hideElement($('#widgetProjectDetails'));
            $.ajax( {
                "url": "http://localhost/projects/Visions/web/app_dev.php/api/redmine/projects/"+argument+".json",
                "dataType": 'json',
                "success": function ( json ) {
                    project = json;
                    widgetProjectDetails($('#widgetProjectDetails').scope());
                    showElement($('#widgetProjectDetails'));
                }
            });        
        });   
} );  
