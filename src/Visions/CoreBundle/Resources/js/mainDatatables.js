/* 
 * Generelle Funktionen für die jQuery Erweiterung Datatables
 */

/* Erweitern der JSON Daten um die Edit und Delete Buttons */
function showDatatableButtons(json, bundleAndEntity, showViewButton, enableViewButton, showEditButton, enableEditButton, showDeleteButton, enableDeleteButton){
    /* set deafult values if not set */
    showViewButton   = (typeof(showViewButton) !== "undefiend" ? showViewButton : true);
    showEditButton   = (typeof(showEditButton) !== "undefiend" ? showEditButton : true);
    showDeleteButton = (typeof(showDeleteButton) !== "undefiend" ? showDeleteButton : true);
    enableViewButton   = (typeof(enableViewButton) !== "undefiend" ? enableViewButton : true);
    enableEditButton   = (typeof(enableEditButton) !== "undefiend" ? enableEditButton : true);
    enableDeleteButton = (typeof(enableDeleteButton) !== "undefiend" ? enableDeleteButton : true);
    bundleAndEntity = (typeof(bundleAndEntity) !== "undefiend" ? bundleAndEntity : "");
    
    
    json.aoColumns.push( {
        'sTitle' : 'Aktion', 
        "aTargets": [ ],
        "mData": "id",
        "mRender": function ( data, type, full ) { 
            var buttons = new Array();

            if (showViewButton){
                buttons.push(viewButton(data, enableViewButton, bundleAndEntity));
            }
            if (showEditButton){
                buttons.push(editButton(data, enableEditButton, bundleAndEntity));
            }
            if (showDeleteButton){
                buttons.push(deleteButton(data, enableDeleteButton, bundleAndEntity));
            }
            
            var output = "<ul>";            
            for (var i = 0; i < buttons.length; ++i)
                output += buttons[i];      
            output += "</ul>";
            
            return output;
        }
    });
    return json;
}

/* Aussehen des Show-Buttons */
function viewButton(data, enable, bundleAndEntity){
    var enabledClass = (enable == true ? "" : getDisabledClass());
    var dataEvent = (enable == true ? 'data-event-click="'+bundleAndEntity+'.show"' : "");  
    var link = getDisabledLink();  
    
    return '<a href="'+link+'" class="btn btn-small btn-action' + enabledClass + '"  ' + dataEvent + '  data-id="'+data+'">Anzeigen</a>';
}

/* Aussehen des Edit-Buttons */
function editButton(data, enable, bundleAndEntity){
    var enabledClass = (enable == true ? "" : getDisabledClass()); 
    var dataEvent = (enable == true ? 'data-event-click="edit"' : "");  
    var link = getDisabledLink();      
    
    return '<a href="'+link+'" class="btn btn-small btn-action' + enabledClass + '"  ' + dataEvent + '  data-id="'+data+'">Bearbeiten</a>';
}

/* Aussehen des -Buttons */
function deleteButton(data, enable, bundleAndEntity){
    var enabledClass = (enable == true ? "" : getDisabledClass());  
    var dataEvent = (enable == true ? 'data-event-click="'+bundleAndEntity+'.delete"' : "");  
    var link = getDisabledLink();  
    
    return '<a href="'+link+'" class="btn btn-small btn-action' + enabledClass + '"  ' + dataEvent + '  data-id="'+data+'">Löschen</a>';
}

/* Klasse um einen Button als disabled anzuzeigen */
function getDisabledClass(){
    return " disabled";
}

/* Deaktivieren von Links */
function getDisabledLink(){
    return "javascript:void(0)";
}