<?php

/* :: Nightboard ::
 * 
 * FILENAME:    lib/template.php
 * AUTHOR(S):   Joey Miller ("Zarpho")
 * DESCRIPTION: Contains data for the Template class.
 */

class Template
{
	/* Template information */
	public $name;      // The template's name
	public $directory; // The template's directory
	
	/* Constructor method, takes result of query */
	function __construct($template)
	{
		$this->name      = $template[name];
		$this->directory = strtolower($template[name]);
		
		/* Set the directory name if it's different from the template name */
		if (isset($template[directory]))
		{
			$this->directory = $template[directory];
		}
	}
	
	/* Generates page header, takes various arguments for different parts of the header */
	function header($boardtitle, $links_array)
	{
		include("styles/$this->directory/header.php");
	}
	
	/* Generates main part of the page */
	function main($type, $forums_array)
	{
		include("styles/$this->directory/main.$type.php");
	}
	
	/* Generates page footer */
	function footer()
	{
		include("styles/$this->directory/footer.php");
	}
}

?>