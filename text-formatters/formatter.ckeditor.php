<?php

	Class formatterckeditor extends TextFormatter{
		
		function about(){
			return array(
				'name' => 'CKEditor',
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
		
		function run($string) {
			return $string;
		}

	}

?>