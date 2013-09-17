/* 
 * 
 * and open the template in the editor.
 */



$(function(){
    function initToolbarBootstrapBindings(editor, voiceBtn) {
        var fonts = ['Serif', 'Sans', 'Arial', 'Arial Black', 'Courier', 
        'Courier New', 'Comic Sans MS', 'Helvetica', 'Impact', 'Lucida Grande', 'Lucida Sans', 'Tahoma', 'Times',
        'Times New Roman', 'Verdana'],
        fontTarget = $('[title=Font]').siblings('.dropdown-menu');
        $.each(fonts, function (idx, fontName) {
            fontTarget.append($('<li><a data-edit="fontName ' + fontName +'" style="font-family:\''+ fontName +'\'">'+fontName + '</a></li>'));
        });
        $('a[title]').tooltip({
            container:'body'
        });
        $('.dropdown-menu input').click(function() {
            return false;
        })
        .change(function () {
            $(this).parent('.dropdown-menu').siblings('.dropdown-toggle').dropdown('toggle');
        })
        .keydown('esc', function () {
            this.value='';
            $(this).change();
        });

        $('[data-role=magic-overlay]').each(function () { 
            var overlay = $(this), target = $(overlay.data('target')); 
            overlay.css('opacity', 0).css('position', 'absolute').offset(target.offset()).width(target.outerWidth()).height(target.outerHeight());
        });
        if ("onwebkitspeechchange"  in document.createElement("input")) {
            var editorOffset = $(editor).offset();
            $(voiceBtn).css('position','absolute').offset({
                top: editorOffset.top, 
                left: editorOffset.left+$(editor).innerWidth()-35
            });
        } else {
            $(voiceBtn).hide();
        }
    };
    function showErrorAlert (reason, detail) {
        var msg='';
        if (reason==='unsupported-file-type') {
            msg = "Unsupported format " +detail;
        }
        else {
            console.log("error uploading file", reason, detail);
        }
        $('<div class="alert"> <button type="button" class="close" data-dismiss="alert">&times;</button>'+ 
            '<strong>File upload error</strong> '+msg+' </div>').prependTo('#alerts');
    };
    
    
    $("textarea[data-htmlEditor]").each(function () {
        initToolbarBootstrapBindings('#editor-' + $(this).attr("data-htmlEditor"), '#voiceBtn-' + $(this).attr("data-htmlEditor"));

        $('#editor-' + $(this).attr("data-htmlEditor")).wysiwyg({
            fileUploadError: showErrorAlert
        } );
        
        //copy Values after load in the editor an after each keydown back to the Textarea
        $('#editor-' + $(this).attr("data-htmlEditor")).html(
            $("#" + $(this).attr("data-htmlEditor")).val()
            )
        .keyup( function() {
            $('#' + $(this).attr("data-htmlEditor")).val(
                $('#editor-' + $(this).attr("data-htmlEditor")).html()
                );
        });
    });
    
    window.prettyPrint && prettyPrint();
});


$(function() {
    $('form.form').submit(function (){  
        //each div.editor copy content to textarea
        $(".editor").each(function (){
            $('#' + $(this).attr("data-htmlEditor")).val(
                $(this).html()    
                );
        });
    });
    
    $( "#resizeon" ).click( function (){
        //$('.editor img').draggable();
        $('.editor img').resizable();   
	//$('.ui-wrapper').draggable();
    });
    
    $( "#resizeoff" ).click( function (){
        $('.editor img').resizable("destroy").css('display','');
    });
    
    $( "#readcontent" ).click( function (){
        alert($('#editor-visions_docbundle_contenttype_text').html());
    });  
        
//    $(".editor img").on({
//    //  click: function(){
//    //    $(this).toggleClass("active");
//    //  },
//      mouseenter: function(){
//        $(this).resizable();
//      },
//      mouseleave: function(){
//        $(this).resizable("destroy").removeAttr('style.display');
//      }
//    });
//    $( ".editor img" ).one("click", function() {
//
//        $(this).resizable();
//    });


//$(".editor img").on({
//  click: function(){
//      alert($(this).resizable('option'));
//    //$(this).resizable('option', 'disabled', !$(this).resizable('option', 'disabled'));
//  }
//});

//
//$(".editor img").mouseover(function() {
//    $(this).resizable();
//  }).mouseout(function(){
//    $(this).resizable("destroy");
//  });
});
