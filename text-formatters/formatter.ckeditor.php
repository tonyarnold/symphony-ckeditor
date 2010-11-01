<?php

	Class formatterckeditor extends TextFormatter{
		
		function about(){
			return array(
				'name' => 'CKEditor',
				'version' => '1.0',
				'release-date' => '2010-11-01',
				'author' => array(
					'name' => 'Tony Arnold',
					'website' => 'http://thecocoabots.com',
					'email' => 'tony@thecocoabots.com'
				),
				'description' => 'Includes CKEditor, a web-based XHTML editor developed by Frederico Knabben.'
			);
		}
		
		function run($string) {
			return $string;
		}

	}

?>