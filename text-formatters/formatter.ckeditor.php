<?php

	Class formatterCKEditor extends TextFormatter{
  	const NAME = 'CKEditor';
				
		function run($string) {
			return $string;
		}

	}
	
	return "formatterCKEditor";