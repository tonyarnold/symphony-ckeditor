<?php

	Class extension_ckeditor extends Extension{
	
		/**
		 * Extension information
		 */
		 
		public function about() {
			return array(
				'name' => 'Text Formatter: CKEditor',
				'version' => '0.6',
				'release-date' => '2009-12-08',
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
	
		public function applyCKEditor($context){
			if($context['field']->get('formatter') != 'ckeditor') return;
			if(!defined('_CKEDITOR_SCRIPTS_IN_HEAD_') || !_CKEDITOR_SCRIPTS_IN_HEAD_){
				define_safe('_CKEDITOR_SCRIPTS_IN_HEAD_', true);
				Administration::instance()->Page->addScriptToHead(URL . '/extensions/ckeditor/lib/ckeditor/ckeditor.js', 200, false);
				Administration::instance()->Page->addScriptToHead(URL . '/extensions/ckeditor/assets/symphony.ckeditor.js', 210, false);
				Administration::instance()->Page->addStylesheetToHead(URL . '/extensions/ckeditor/assets/symphony.ckeditor.css', 'screen', 30);
			}
		}
				
	}

?>