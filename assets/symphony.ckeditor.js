jQuery(document).ready(function () {
    var count = 0;
    
    jQuery('label > textarea.ckeditor').each(function(index) {
        var objectName = jQuery(this).attr('name');    
        var configurationData = {
            language : 'en',            
            height : this.offsetHeight,
            extraPlugins : 'uicolor,xmlentities',
            removePlugins : 'font,entities,styles',
            uiColor : '#d6d6c7',
            startupOutlineBlocks : true,
            replaceByClassEnabled : false,
            xmlentities : true,
            toolbar : 
            [
                ['Format'],
                ['Bold', 'Italic', 'Strike', '-', 'Subscript', 'Superscript'],
                ['NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', 'Blockquote'],
                ['Image'],['Link', 'Unlink'],
                ['HorizontalRule'],
                ['Source', 'Maximize']
            ],
            forcePasteAsPlainText: true,
            format_tags: 'p;h1;h2;h3',
            filebrowserBrowseUrl: '/symphony/extension/ckeditor/filebrowser/'
        };
        CKEDITOR.replaceByClassEnabled = false;
        CKEDITOR.replace(objectName, configurationData);
    });
});