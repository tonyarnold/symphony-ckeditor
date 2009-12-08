jQuery(document).ready(function () {
  
    jQuery('textarea.ckeditor').each(function(index) {
        var objectName = jQuery(this).attr('name');
        jQuery(this).attr('id', objectName);
        
        CKEDITOR.replace( 
            objectName,
            {
                height: this.offsetHeight,
                removePlugins : 'font',
                extraPlugins : 'uicolor',
                uiColor : '#d6d6c7',
                replaceByClassEnabled : false,
                entities_processNumerical : true,
                startupOutlineBlocks: true,
                toolbar :
                [
                    ['Format'],
                    ['Bold','Italic','Strike','-','Subscript','Superscript'],
                    ['NumberedList','BulletedList','-','Outdent','Indent','Blockquote'],
                    ['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'],
                    ['Link','Unlink','Anchor'],
                    '/',
                    ['Image','Table','HorizontalRule','SpecialChar'],
                    ['PasteText','PasteFromWord','RemoveFormat'],
                    ['Source','Maximize', 'ShowBlocks','-','About']
                ]
            }
        );
    });
    
});