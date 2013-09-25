$(document).ready(function(){
    var widgetProjects= "widgetProjects";
    $('#widgetProjectDetails').bind('selectedproject', 
    function(event, argument){      
        alert($(this).attr('data-id'));
        this.innerHTML = id;
    });
    
    // load projects from local storage
    var redmineProjects = localStorage.getItem('redmine_projects');
    if(redmineProjects !== null && redmineProjects !== undefined){
        var data = JSON.parse(redmineProjects);
        $('#project-list').empty();
        if (typeof(data.project) == 'undefined'){
            $('#project-list').append('<li>' + data.Message + '</li>');
        }else {
            for (var i in data.project) {
                //alert(data.project[i].name);
                $('#project-list').append('<li><a href="#" data-id="' + data.project[i].id + '" onclick="alert(\'' + data.project[i].id + '\');$.event.trigger(\'selected-project\', $(this).attr(\'data-id\'))">' + data.project[i].name + '</a></li>');
            }
        }
    }
    
    // reload projects
    $("#redmineLoadProjects").click(function(){
        $(this).addClass("disabled").attr("disabled", true);
        //Show loader
        $('.preloader').addClass('visible');
        getProjects();
        $(this).removeClass("disabled").attr("disabled", false);
    })
    
    //Swiper
    var holdPosition = 0;
    var mySwiper = new Swiper('.swiper-container',{
        slidesPerView:'auto',
        mode:'vertical',
        watchActiveIndex: true,
        onTouchStart: function() {
            holdPosition = 0;
        },
        onResistanceBefore: function(s, pos){
            holdPosition = pos;
        },
        onTouchEnd: function(){
            if (holdPosition>100) {
                // Hold Swiper in required position
                mySwiper.setWrapperTranslate(0,100,0)

                // Dissalow futher interactions
                mySwiper.params.onlyExternal=true

                // disable button
                $("#redmineLoadProjects").addClass("disabled").attr("disabled", true);
                // Show loader
                $('.preloader').addClass('visible');

                // Load projects
                getProjects();
            
                // Release interactions and set wrapper
                mySwiper.setWrapperTranslate(0,0,0)
                mySwiper.params.onlyExternal=false;
            
                // Update active slide
                mySwiper.updateActiveSlide(0);

                slideNumber++;                
            }
        }
    })
    var slideNumber = 0;
});

function getProjects(){
    $.ajax({ 
        type: "GET",
        dataType: "json",
        url: "http://localhost/projects/Visions/web/app_dev.php/api/redmine/projects.json?limit=2",
        success: function(data){            
            localStorage.setItem('redmine_projects', JSON.stringify(data));
            $('#project-list').empty();
            if (typeof(data.project) == 'undefined'){
                $('#project-list').append('<li>' + data.Message + '</li>');
            }else {
                for (var i in data.project) {
                    //alert(data.project[i].name);
                    $('#project-list').append('<li><a href="#" data-id="' + data.project[i].id + '" onclick="alert(\'' + data.project[i].id + '\');$.event.trigger(\'selected-project\', $(this).attr(\'data-id\'))">' + data.project[i].name + '</a></li>');
                }
            }            

            // enable button
            $("#redmineLoadProjects").removeClass("disabled").attr("disabled", false);            
            //Hide loader
            $('.preloader').removeClass('visible');
        }
    });            
}