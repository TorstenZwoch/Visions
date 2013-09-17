$(document).ready(function () {
    $("textarea[data-liveEditor]").each(function () {
        $(this).liveEdit({
            height: 350,
            css: ['../../../../css/bootstrap.min.css', '../../../../webcssbootstrap_extend.css'] /* Apply bootstrap css into the editing area */,
            height: 530,
            toolbarMode: 3,
            groups: [
                    ["group1", "", ["Bold", "Italic", "Underline", "ForeColor", "RemoveFormat"]],
                    ["group2", "", ["Bullets", "Numbering", "Indent", "Outdent"]],
                    ["group3", "", ["Paragraph", "FontSize", "FontDialog", "TextDialog"]],
                    ["group4", "", ["LinkDialog", "ImageDialog", "YoutubeDialog", "TableDialog", "Emoticons"]],
                    ["group5", "", ["Undo", "Redo", "FullScreen", "SourceDialog"]]
                    ],
            enableFlickr: true,
            enableCssButtons: true,
            enableLightbox: true,
            enableTableAutoformat: true,
            returnKeyMode: 3,
            fileBrowser: '',
            arrCustomTag: [["First Name", "[%FIRSTNAME%]"], ["Last Name", "[%LASTNAME%]"], ["Email", "[%EMAIL%]"]],
            pasteTextOnCtrlV: true,
            mode: 'XHTMLBody',
            enableTableAutoformat: true
        });

        $(this).data('liveEdit').startedit();
    });
});


function save() {
    var sHtml = $('textarea[data-liveEditor]').data('liveEdit').getXHTMLBody(); //Use before finishedit()
    alert(sHtml); /*You can use the sHtml for any purpose, eg. saving the content to your database, etc, depend on you custom app */
}



        