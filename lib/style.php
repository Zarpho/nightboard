<?php

/* :: Nightboard ::
 * 
 * FILENAME:    lib/style.php
 * AUTHOR(S):   Joey Miller ("Zarpho")
 * DESCRIPTION: Contains data for the Style class.
 */

class Style
{
	/* Style information */
	public $name;      // The style's name
	public $directory; // The style's directory
	
	/* Constructor method, takes result of query */
	function __construct($style)
	{
		$this->name      = $style[name];
		$this->directory = $style[directory];
	}
	
	/* Generates page header, takes various arguments for different parts of the header */
	function header($boardtitle, $links_array, $currentuser)
	{
		include("styles/$this->directory/header.php");
	}
	
	/* Generates main part of the page */
	function main($type, $styledata)
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