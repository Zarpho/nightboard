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
	
	/* Constructor method, takes result of mysql_fetch_assoc */
	function __construct($user)
	{
		$this->id       = $user["id"];
		$this->username = $user["username"];
		$this->password = $user["password"];
		$this->realname = $user["realname"];
		$this->website  = $user["website"];
	}
	
	function update()
	{
		// Connect to MySQL
		// Set all other variables based on $id
	}
}

?>