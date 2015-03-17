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
	public $id;         // User ID number
	public $username;   // Username
	public $password;   // User password
	public $email;      // Email address
	public $powerlevel; // Powerlevel, see documentation for more info
	
	/* Personal info (optional) */
	public $realname; // User's real name
	public $website;  // User's website
	
	/* Constructor method, takes result of mysqli_fetch_assoc */
	function __construct($user)
	{
		$this->id         = $user[id];
		$this->username   = $user[username];
		$this->password   = $user[password];
		$this->email      = $user[email];
		$this->powerlevel = $user[powerlevel];
		$this->realname   = $user[realname];
		$this->website    = $user[website];
	}
	
	function update()
	{
		// Connect to MySQL
		// Set all other variables based on $id
	}
}

?>