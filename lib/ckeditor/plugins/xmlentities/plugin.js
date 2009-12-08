/*
Copyright (c) 2003-2009, CKSource - Frederico Knabben. All rights reserved.
For licensing, see LICENSE.html or http://ckeditor.com/license
*/

(function()
{
	CKEDITOR.plugins.add( 'xmlentities',
	{
		afterInit : function( editor )
		{
			var config = editor.config;

			if ( !config.xmlentities )
				return;

			var dataProcessor = editor.dataProcessor,
				htmlFilter = dataProcessor && dataProcessor.htmlFilter;

			if ( htmlFilter )
			{
				// Create the Regex used to find entities in the text.
				var entitiesRegex = '[^ -~]';
				    entitiesRegex = new RegExp( entitiesRegex, 'g' );

				function getChar( character )
				{
					return '&#' + character.charCodeAt(0) + ';';
				}

				htmlFilter.addRules(
				{
					text : function( text )
					{
						return text.replace( entitiesRegex, getChar );
					}
				});
			}
		}
	});
})();

/**
 * Whether to use HTML entities in the output.
 * @type Boolean
 * @default true
 * @example
 * config.entities = false;
 */
CKEDITOR.config.xmlentities = true;
