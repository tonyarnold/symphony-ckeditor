jQuery(document).ready(function () {
    var count = 0;
    
    jQuery('textarea.ckeditor').each(function(index) {
        var objectName = jQuery(this).attr('name');    
        var configurationData = {
            height : this.offsetHeight,
            extraPlugins : 'uicolor,xmlentities',
            removePlugins : 'font,entities',
            uiColor : '#d6d6c7',
            startupOutlineBlocks : true,
            replaceByClassEnabled : false,
            xmlentities : true,
            toolbar : 
            [
                ['Format'],
                ['Bold', 'Italic', 'Strike', '-', 'Subscript', 'Superscript'],
                ['NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', 'Blockquote'],
                ['Link', 'Unlink'],
                ['HorizontalRule'],
                ['Source', 'Maximize']
            ],
            forcePasteAsPlainText: true
        };
        CKEDITOR.replace(objectName, configurationData);
    });
});