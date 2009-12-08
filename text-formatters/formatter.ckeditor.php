<?php

	Class formatterckeditor extends TextFormatter{
		
		function about(){
			return array(
				'name' => 'CKEditor',
				'version' => '0.2',
				'release-date' => '2009-09-14',
				'author' => array(
					'name' => 'Tony Arnold',
					'website' => 'http://www.tonyarnold.com',
					'email' => 'tony@tonyarnold.com'
				),
				'description' => 'Includes CKEditor, a web-based XHTML editor developed by Frederico Knabben.'
			);
		}
		
		function run($string) {
			return $string;
		}

	}

?>