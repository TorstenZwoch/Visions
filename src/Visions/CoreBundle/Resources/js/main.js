/* Default settings */
$.fn.dataTable.defaults.bJQueryUI = false;
$.fn.dataTable.defaults.sDom = 'R<"H"lfr>t<"F"ip>';
$.fn.dataTable.defaults.sPaginationType = "full_numbers";
$.fn.dataTable.defaults.bDestroy = true;
$.fn.dataTable.defaults.bAutoWidth = true;
$.fn.dataTable.defaults.bProcessing = true;
$.fn.dataTable.defaults.bServerSide = true;
$.fn.dataTable.defaults.fnServerData = function( sUrl, aoData, fnCallback, oSettings ) {
    oSettings.jqXHR = $.ajax( {
        "url": sUrl,
        "data": aoData,
        "success": fnCallback,
        "dataType": "json",
        "cache": false
    } );                    
};
$.fn.dataTable.defaults.iDisplayLength = 10;

//$.fn.dataTable.defaults.bPaginate = false;
/* Twitter Bootstrap Style */
//$.fn.dataTable.defaults.sDom = "<'row'<'span6'l><'span6'f>r>t<'row'<'span6'i><'span6 pull-right'p>>";
//$.extend( $.fn.dataTableExt.oStdClasses, {
//    "sWrapper": "dataTables_wrapper form-inline"
//} );
//$.fn.DataTable.defaults.sDom = "<'row-fluid'<'span6'l><'span6'f>r>t<'row-fluid'<'span6'i><'span6'p>>";


/* API method to get paging information */
$.fn.dataTableExt.oApi.fnPagingInfo = function ( oSettings )
{
    return {
        "iStart":         oSettings._iDisplayStart,
        "iEnd":           oSettings.fnDisplayEnd(),
        "iLength":        oSettings._iDisplayLength,
        "iTotal":         oSettings.fnRecordsTotal(),
        "iFilteredTotal": oSettings.fnRecordsDisplay(),
        "iPage":          oSettings._iDisplayLength === -1 ?
        0 : Math.ceil( oSettings._iDisplayStart / oSettings._iDisplayLength ),
        "iTotalPages":    oSettings._iDisplayLength === -1 ?
        0 : Math.ceil( oSettings.fnRecordsDisplay() / oSettings._iDisplayLength )
    };
}

/* Bootstrap style pagination control */
$.extend( $.fn.dataTableExt.oPagination, {
    "bootstrap": {
        "fnInit": function( oSettings, nPaging, fnDraw ) {
            var oLang = oSettings.oLanguage.oPaginate;
            var fnClickHandler = function ( e ) {
                e.preventDefault();
                if ( oSettings.oApi._fnPageChange(oSettings, e.data.action) ) {
                    fnDraw( oSettings );
                }
            };

            $(nPaging).addClass('pagination').append(
                '<ul>'+
                '<li class="prev disabled"><a href="#">&larr; '+oLang.sPrevious+'</a></li>'+
                '<li class="next disabled"><a href="#">'+oLang.sNext+' &rarr; </a></li>'+
                '</ul>'
                );
            var els = $('a', nPaging);
            $(els[0]).bind( 'click.DT', {
                action: "previous"
            }, fnClickHandler );
            $(els[1]).bind( 'click.DT', {
                action: "next"
            }, fnClickHandler );
            refreshDataEventBinding();
            //alert(JSON.stringify(this));
            //console.log("test" ,oSettings.sTableId);
             //console.log("test" ,$($.table).data("url"));
        },

        "fnUpdate": function ( oSettings, fnDraw ) {
            var iListLength = 5;
            var oPaging = oSettings.oInstance.fnPagingInfo();
            var an = oSettings.aanFeatures.p;
            var i, j, sClass, iStart, iEnd, iHalf=Math.floor(iListLength/2);

            if ( oPaging.iTotalPages < iListLength) {
                iStart = 1;
                iEnd = oPaging.iTotalPages;
            }
            else if ( oPaging.iPage <= iHalf ) {
                iStart = 1;
                iEnd = iListLength;
            } else if ( oPaging.iPage >= (oPaging.iTotalPages-iHalf) ) {
                iStart = oPaging.iTotalPages - iListLength + 1;
                iEnd = oPaging.iTotalPages;
            } else {
                iStart = oPaging.iPage - iHalf + 1;
                iEnd = iStart + iListLength - 1;
            }

            for ( i=0, iLen=an.length ; i<iLen ; i++ ) {
                // Remove the middle elements
                $('li:gt(0)', an[i]).filter(':not(:last)').remove();

                // Add the new list items and their event handlers
                for ( j=iStart ; j<=iEnd ; j++ ) {
                    sClass = (j==oPaging.iPage+1) ? 'class="active"' : '';
                    $('<li '+sClass+'><a href="#">'+j+'</a></li>')
                    .insertBefore( $('li:last', an[i])[0] )
                    .bind('click', function (e) {
                        e.preventDefault();
                        oSettings._iDisplayStart = (parseInt($('a', this).text(),10)-1) * oPaging.iLength;
                        fnDraw( oSettings );
                    } );
                }

                // Add / remove disabled classes from the static elements
                if ( oPaging.iPage === 0 ) {
                    $('li:first', an[i]).addClass('disabled');
                } else {
                    $('li:first', an[i]).removeClass('disabled');
                }

                if ( oPaging.iPage === oPaging.iTotalPages-1 || oPaging.iTotalPages === 0 ) {
                    $('li:last', an[i]).addClass('disabled');
                } else {
                    $('li:last', an[i]).removeClass('disabled');
                }
            }
            refreshDataEventBinding();
        }
    }
} );
$.fn.dataTable.defaults.sPaginationType = "bootstrap";


/* Div rechts und links, welches augefahren werden kann */
var snapper = new Snap({
    element: document.getElementById('content')
}).disable();

/* Binden des aller Elemente mit data-event */
function refreshDataEventBinding(){
    $('a[data-event-click]').unbind('click');
    $('a[data-event-click]').bind('click', 
        function(event, argument){
            $('body').trigger($(this).data('event-click'), $(this).data('id'));
        });    
}

$(document).ready(function(){
    /* Binden aller Button mit data-event Attribut */
    refreshDataEventBinding();
});


/* AngularJS - change standard placeholder */
angular.module('visions', [])
  .config(['$interpolateProvider', function ($interpolateProvider) {
    $interpolateProvider.startSymbol('[[');
    $interpolateProvider.endSymbol(']]');
  }]);