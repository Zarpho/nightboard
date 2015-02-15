<?php

/* :: Nightboard ::
 * 
 * FILENAME:    index.php
 * AUTHOR(S):   Joey Miller ("Zarpho")
 * DESCRIPTION: The index page of the board, which displays all forums.
 */

/* Welcome to Nightboard! This board software is meant to be simple and reminiscent of classic
 * messageboards of the past.
 * 
 * Here are some useful links:
 * http://board.midnightreality.net/       - The main website for Nightboard
 * http://www.github.com/Zarpho/nightboard - Source code repository
 */

require("etc/index.php");
require("lib/index.php");

$db = new Database($hostname, $username, $password, $database);

if (!mysqli_connect($db->hostname, $db->username, $db->password, $db->database))
{
	die("Could not connect to MySQL database. Please make sure etc/db.php is configured correctly." . mysql_errno());
}

?>