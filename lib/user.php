<?php

/* :: Nightboard ::
 * 
 * FILENAME:    lib/user.php
 * AUTHOR(S):   Joey Miller ("Zarpho")
 * DESCRIPTION: Contains data for the User class.
 */

class User
{
	/* General account info */
	private $id;       // User ID number
	private $username; // Username
	private $password; // User password
	
	/* Personal info (optional) */
	private $realname; // User's real name
	private $website;  // User's website
	
	function __construct($userid)
	{
		$this->id = $userid;
		$this->update();
	}
	
	function update()
	{
		// Connect to MySQL
		// Set all other variables based on $id
	}
}

?>