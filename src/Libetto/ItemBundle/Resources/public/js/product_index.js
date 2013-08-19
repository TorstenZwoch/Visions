/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

$( document ).ready(function() {

    w2utils.settings.RESTfull = true

    $('#grid').w2grid({ 
        dataType: "json",    
        name: 'grid', 
        recordsPerPage: 8,
	show: {
		header 		: false,
		toolbar 	: true,
		footer		: true,
		lineNumbers	: true,
		selectColumn: true,
		expandColumn: false
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
            caption: 'Name', 
            size: '80%', 
            sortable: true
        },
        {
            field: 'c_shortname', 
            caption: 'Kurzname', 
            size: '20%', 
            sortable: true
        },
        {
            field: 'c_description', 
            caption: 'Beschreibung', 
            size: '80%', 
            sortable: true
        }, 
        {
            field: 'category.c_name', 
            caption: 'Kategorie', 
            size: '20%', 
            sortable: true
        },
        {
            field: 'productsgroup', 
            caption: 'Produktgruppe', 
            size: '80%', 
            sortable: true
        },            
        ]
    });	
    w2ui['grid'].load('/projects/Libetto/web/app_dev.php/api/products.json');
});  