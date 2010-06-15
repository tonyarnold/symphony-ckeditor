<?php

	Class extension_ckeditor extends Extension{
	
		/**
		 * Extension information
		 */
		 
		public function about() {
			return array(
				'name' => 'Text Formatter: CKEditor',
				'version' => '0.7',
				'release-date' => '2010-06-15',
				'author' => array(
					'name' => 'Tony Arnold',
					'website' => 'http://thecocoabots.com',
					'email' => 'tony@thecocoabots.com'
				),
				'description' => 'Includes CKEditor, a web-based XHTML editor developed by Frederico Knabben.'
			);
		}
	
		/**
		 * Add callback functions to backend delegates
		 */
	
		public function getSubscribedDelegates(){
			return array(
				array('page'			=>	'/backend/',
							'delegate'	=>	'ModifyTextareaFieldPublishWidget',
							'callback'	=>	'applyCKEditor'),
				      
				array('page'			=>	'/backend/',
							'delegate'	=>	'ModifyTextBoxFullFieldPublishWidget',
							'callback'	=>	'applyCKEditor'),
			);
		}
	
		/**
		 * Load and apply CKEditor
		 */
		 
 		protected $addedCKEditorHeaders = false;
	
		public function applyCKEditor($context) {		
			if($context['field']->get('text_formatter') != 'ckeditor') return;
			
			if(!$this->addedCKEditorHeaders){
				Administration::instance()->Page->addScriptToHead(URL . '/extensions/ckeditor/lib/ckeditor/ckeditor.js', 200, false);
				Administration::instance()->Page->addScriptToHead(URL . '/extensions/ckeditor/assets/symphony.ckeditor.js', 210, false);
				Administration::instance()->Page->addStylesheetToHead(URL . '/extensions/ckeditor/assets/symphony.ckeditor.css', 'screen', 30);
				
				$this->addedCKEditorHeaders = true;
			}
		}
				
	}

?>