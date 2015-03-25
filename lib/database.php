<?php

/* :: Nightboard ::
 * 
 * FILENAME:    lib/database.php
 * AUTHOR(S):   Joey Miller ("Zarpho")
 * DESCRIPTION: Contains data for the Database class.
 */

class Database
{
	public $hostname;
	public $username;
	public $password;
	public $database;
	
	/* Constructor method */
	function __construct($host, $user, $pass, $db)
	{
		$this->hostname = $host;
		$this->username = $user;
		$this->password = $pass;
		$this->database = $db;
	}
	
	/* Connects to database and returns connection */
	function connect()
	{
		return mysqli_connect($this->hostname, $this->username, $this->password, $this->database);
	}
	
	/* Generates query string for links, takes user's powerlevel */
	function linkquerystring($powerlevel)
	{
		if (isset($powerlevel))
			return "SELECT * FROM links WHERE (minlevel > 0 AND minlevel <= '$powerlevel') OR minlevel IS NULL";
		else
			return "SELECT * FROM links WHERE minlevel = 0 OR minlevel IS NULL";
	}
}

?>