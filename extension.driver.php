<?php
	require_once(TOOLKIT . '/class.sectionmanager.php');
	
	Class extension_ckeditor extends Extension
	{	
		/**
		 * Extension information
		 */		 
		public function about() {
			return array(
				'name' => 'Text Formatter: CKEditor',
				'version' => '1.00',
				'release-date' => '2010-10-07',
				'author' => array(
					'name' => '<a href="http://thecocoabots.com">Tony Arnold</a> / <a href="http://www.gielberkers.com">Giel Berkers</a>'
				),
				'description' => 'Includes CKEditor, a web-based XHTML editor developed by Frederico Knabben. It also has an integrated file browser which uses Symphony sections to get it\'s files from.'
			);
		}
	
		/**
		 * Add callback functions to backend delegates
		 */	
		public function getSubscribedDelegates(){
			return array(
				array('page'		=>	'/backend/',
					  'delegate'	=>	'ModifyTextareaFieldPublishWidget',
					  'callback'	=>	'applyCKEditor'),
				      
				array('page'		=>	'/backend/',
					  'delegate'	=>	'ModifyTextBoxFullFieldPublishWidget',
					  'callback'	=>	'applyCKEditor'),
				
				array('page'		=> '/system/preferences/',
					  'delegate'	=> 'AddCustomPreferenceFieldsets',
					  'callback'	=> 'appendPresets'),
				
				array('page'		=> '/system/preferences/',
					  'delegate'	=> 'Save',
					  'callback'	=> 'savePresets')
			);
		}
		
		/**
		 * Append presets
		 */
		public function appendPresets($context)
		{
			$wrapper = $context['wrapper'];
			
			$fieldset = new XMLElement('fieldset', '', array('class'=>'settings'));
			$fieldset->appendChild(new XMLElement('legend', __('CKEditor')));
			$fieldset->appendChild(new XMLElement('p', __('The following sections are allowed in the file manager of CKEditor:')));
			
			$sectionManager = new SectionManager($this);
			$sections = $sectionManager->fetch();
			
			// Check which sections are allowed:
			$data = @file_get_contents(MANIFEST.'/ckeditor_sections');
			$checkedSections = $data != false ? explode(',', $data) : array();
			
			foreach($sections as $section)
			{
				$label = new XMLElement('label');
				$attributes = array('type'=>'checkbox', 'name'=>'ckeditor_sections[]', 'value'=>$section->get('id'));
				if(in_array($section->get('id'), $checkedSections)) {
					$attributes['checked'] = 'checked';
				}
				$label->appendChild(new XMLElement('input', $section->get('name'), $attributes));
				$fieldset->appendChild($label);
			}
			
			$wrapper->appendChild($fieldset);
		}
		
		/**
		 * Save the presets
		 */
		public function savePresets($context)
		{
			if(isset($_POST['ckeditor_sections'])) {				
				$sectionStr = implode(',', $_POST['ckeditor_sections']);
				file_put_contents(MANIFEST.'/ckeditor_sections', $sectionStr);
			} else {
				// If no sections are selected, delete the file:
				$this->uninstall();
			}
		}
		
		/**
		 * On uninstall, delete the ckeditor_sections-file
		 */
		public function uninstall()
		{
			if(file_exists(MANIFEST.'/ckeditor_sections'))
			{
				unlink(MANIFEST.'/ckeditor_sections');
			}
		}
		
		/**
		 * Load and apply CKEditor
		 */		 
 		protected $addedCKEditorHeaders = false;
	
		public function applyCKEditor($context) {		
			if($context['field']->get('formatter') != 'ckeditor') return;
			
			if(!$this->addedCKEditorHeaders){
				Administration::instance()->Page->addScriptToHead(URL . '/extensions/ckeditor/lib/ckeditor/ckeditor.js', 200, false);
				Administration::instance()->Page->addScriptToHead(URL . '/extensions/ckeditor/assets/symphony.ckeditor.js', 210, false);
				Administration::instance()->Page->addStylesheetToHead(URL . '/extensions/ckeditor/assets/symphony.ckeditor.css', 'screen', 30);
				
				$this->addedCKEditorHeaders = true;
			}
		}
		
	}

?>