<?php
	require_once(TOOLKIT . '/class.administrationpage.php');
	require_once(TOOLKIT . '/class.sectionmanager.php');
	require_once(TOOLKIT . '/class.entrymanager.php');

	Class contentExtensionCkeditorFilebrowserajax extends AdministrationPage
	{
		function __construct(&$parent){
			parent::__construct($parent);
			$this->setTitle('Symphony - File Browser for CKEditor');
		}
		
		function build()
		{
			$this->_context = $context;
			
			if(!$this->canAccessPage()){
				$this->_Parent->customError(E_USER_ERROR, __('Access Denied'), __('You are not authorised to access this page.'));
				exit();
			}
			
			$this->Html->setDTD('<!DOCTYPE html>');
			$this->Html->setAttribute('lang', Symphony::lang());
			$this->addElementToHead(new XMLElement('meta', NULL, array('http-equiv' => 'Content-Type', 'content' => 'text/html; charset=UTF-8')), 0);
			$this->addHeaderToPage('Content-Type', 'text/html; charset=UTF-8');
			
			## Build the form
			$this->Form = Widget::Form($this->_Parent->getCurrentPageURL(), 'post');
			
			// Get the section:
			if(isset($_GET['id'])) {
				$sectionID = intval($_GET['id']);
				$sectionManager = new SectionManager($this);
				$section = $sectionManager->fetch($sectionID);
				if($section != false)
				{
					$this->Form->appendChild(new XMLElement('h3', $section->get('name')));
					$table = new XMLElement('table');
					
					// Show the entries of this section:
					$columns = $section->fetchVisibleColumns();
					$headers = new XMLElement('tr');
					$fieldIDs = array();
					foreach($columns as $column)
					{
						array_push($fieldIDs, $column->get('id'));
						$headers->appendChild(new XMLElement('th', $column->get('label')));
					}
					$table->appendChild($headers);
					
					// Add rows:
					$entryManager = new EntryManager($this);
					$entries = $entryManager->fetch(null, $sectionID);
					foreach($entries as $entry)
					{
						$fileFound = false;
						$row = new XMLElement('tr');
						$data = $entry->getData();
						foreach($data as $id => $info)
						{
							if(in_array($id, $fieldIDs)) {
								$attributes = array();
								if(isset($info['file'])) {
									$value = '<a href="/workspace'.$info['file'].'">/workspace'.$info['file'].'</a>';
									// check mime:
									if($info['mimetype'] == 'image/jpeg' ||
									   $info['mimetype'] == 'image/jpg' ||
									   $info['mimetype'] == 'image/png' ||
									   $info['mimetype'] == 'image/gif')
									{
										$attributes['class'] = 'image';
									}									
									$fileFound = true;
								} elseif(isset($info['value'])) {
									$value = $info['value'];
								} elseif(isset($info['handle'])) {
									$value = $info['handle'];
								} else {
									$value = '<em>no value found</em>';
								}
								$row->appendChild(new XMLElement('td', $value, $attributes));
							}
						}
						if($fileFound) {
							$table->appendChild($row);
						}
					}
					
					$this->Form->appendChild($table);
					$this->Form->appendChild(new XMLElement('a', __('create new'), array('href'=>'/symphony/publish/'.$section->get('handle').'/new/', 'class'=>'create button')));
					$this->Form->appendChild(new XMLElement('div', '', array('id'=>'thumb')));
				}
			}
			
			$this->_Parent->Profiler->sample('Page content created', PROFILE_LAP);
			
		}
	}
?>