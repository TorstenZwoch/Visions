/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

$( document ).ready(function() {
    $.ajax({
        cache: false,
        type: "GET",
        async: false,
        Accept: "application/json", 
        dataType: "json",
        url: '/projects/Libetto/web/app_dev.php/api/users',
        success: function (users) {
            console.log( "JSON Data: " + users.users[0].id );
        },
        error: function (xhr) {
            alert(xhr.responseText);
        }
    });
});  