<?php

	Class extension_CKEditor implements iExtension {
	
		/**
		 * Extension information
		 */
		 
		public function about() {
			return (object)array(
				'name' => 'CKEditor',
				'version' => '0.81',
				'release-date' => '2010-06-26',
				'author' => (object)array(
					'name' => 'Tony Arnold',
					'website' => 'http://thecocoabots.com',
					'email' => 'tony@thecocoabots.com'
				),
				'description' => 'Includes CKEditor, a web-based XHTML editor developed by Frederico Knabben.',
				'type' => array(
				  'Text Formatter', 
				  'WYSIWYG'
				)
			);
		}
	
		/**
		 * Add callback functions to backend delegates
		 */
	
		public function getSubscribedDelegates(){
			return array(
				array('page'			=>	'/administration/',
							'delegate'	=>	'ModifyTextareaFieldPublishWidget',
							'callback'	=>	'applyCKEditor'),
				      
				array('page'			=>	'/administration/',
							'delegate'	=>	'ModifyTextBoxFullFieldPublishWidget',
							'callback'	=>	'applyCKEditor'),
			);
		}
	
		/**
		 * Load and apply CKEditor
		 */
		 
	
		public function applyCKEditor(array $context=NULL) {				
			if($context['field']->{'text-formatter'} != 'formatter.ckeditor') return;
			
		  $page = Administration::instance()->Page;
		  
		  $ckeditor_js_url = URL . '/extensions/formatter_ckeditor/lib/ckeditor/ckeditor.js';
		  $sym_ckeditor_js_url = URL . '/extensions/formatter_ckeditor/assets/symphony.ckeditor.js';
		  $sym_ckeditor_css_url = URL . '/extensions/formatter_ckeditor/assets/symphony.ckeditor.css';
		  
	  	if($page->isElementInHead('script', 'src', $ckeditor_js_url) == false) {
			  $page->insertNodeIntoHead(
			  	$page->createScriptElement($ckeditor_js_url), 200
			  );
		  }
		  
	  	if($page->isElementInHead('script', 'src', $sym_ckeditor_js_url) == false) {
			  $page->insertNodeIntoHead(
			  	$page->createScriptElement($sym_ckeditor_js_url), 210
			  );
			}
		  
	  	if($page->isElementInHead('link', 'href', $sym_ckeditor_css_url) == false) {
			  $page->insertNodeIntoHead(
			  	$page->createStylesheetElement($sym_ckeditor_css_url), 'screen'
			  );
		  }
		}
				
	}
	
	return "extension_CKEditor";
	