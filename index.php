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

$db     = new Database($hostname, $username, $password, $database);                   // Create a database object
$mysqli = mysqli_connect($db->hostname, $db->username, $db->password, $db->database); // Connect to that database

if (!$mysqli)
{
	die("Could not connect to MySQL database. Please make sure etc/db.php is configured correctly. ~ " . mysqli_error());
}

mysqli_select_db($db->database);

$boardtitle   = "Nightboard";
$currentstyle = "default";

$template = new Template(array(name => "default")); // NOT final, just temporary replacement for query

$query = mysqli_query($mysqli, "SELECT * FROM links");
$template->header($boardtitle, mysqli_fetch_all($query, MYSQL_ASSOC));

$query = mysqli_query($mysqli, "SELECT * FROM forums");
$template->main("index", mysqli_fetch_all($query, MYSQL_ASSOC));

$template->footer();

?>