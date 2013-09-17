$(document).ready(function(){

});

function getProjectDetails(){
    $.ajax({ 
        type: "GET",
        dataType: "json",
        url: "http://localhost/projects/Visions/web/app_dev.php/api/redmine/projects/.json?limit=2",
        success: function(data){            
            localStorage.setItem('redmine_projects', JSON.stringify(data));
            //alert(JSON.parse(localStorage.getItem('projects')));
            var output = "";           
            for (var i in data.project) {
                output += '<li><a href="#" data-id="' + data.project[i].id + '">' + data.project[i].name + '</a></li>';
            }
            alert(output);
            $('#project-list').html(output);
            // enable button
            $("#redmineLoadProjects").removeClass("disabled").attr("disabled", false);            
            //Hide loader
            $('.preloader').removeClass('visible')
        }
    });            
}