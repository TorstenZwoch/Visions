/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

$( document ).ready(function() {
    //    $.ajax({
    //        cache: false,
    //        type: "GET",
    //        async: false,
    //        Accept: "application/json", 
    //        dataType: "json",
    //        url: '/projects/Libetto/web/app_dev.php/api/customers',
    //        success: function (users) {
    //            console.log( "JSON Data: " + users.users[0].id );
    //            fillUsers(users);
    //        },
    //        error: function (xhr) {
    //            alert(xhr.responseText);
    //        }
    //    });   

    w2utils.settings.RESTfull = true

    $('#grid').w2grid({ 
        dataType: "json",    
        name: 'grid', 
        recordsPerPage: 8,
        show: {
            footer: true
        },
        columns: [				
        {
            field: 'c_number', 
            caption: 'Nummer', 
            size: '20%', 
            sortable: true
        },
        {
            field: 'c_name', 
            caption: 'Bezeichnung', 
            size: '80%', 
            sortable: true
        },
        ]
    });	
    w2ui['grid'].load('/projects/Libetto/web/app_dev.php/api/customers.json');
});  

function fillUsers(users){
    $('#grid').w2grid({ 
        accept: "application/json", 
        dataType: "json",    
        name: 'grid', 
        recordsPerPage: 8,
        show: {
            footer: true
        },
        columns: [				
        {
            field: 'c_number', 
            caption: 'Nummer', 
            size: '30%', 
            sortable: true
        },
        {
            field: 'c_name', 
            caption: 'Bezeichnung', 
            size: '30%', 
            sortable: true
        },        
        ]
    });	
    w2ui['grid'].load('/projects/Libetto/web/app_dev.php/api/customers.json');
   
}