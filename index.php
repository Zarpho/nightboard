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

/* Connect to database, test connection, select database */
$db     = new Database($hostname, $username, $password, $database); // Create a database object
$mysqli = $db->connect();                                           // Connect to that database

if (!$mysqli)
{
	die("Could not connect to MySQL database. Please make sure etc/db.php is configured correctly. ~ " . mysqli_error());
}

mysqli_select_db($mysqli, $db->database);

/* Handle sessions/users */
session_start();

if (isset($_SESSION[user]))
{
	$query = mysqli_query($mysqli, "SELECT * FROM users WHERE id=\"" . $_SESSION[user] . "\"");
	$array = mysqli_fetch_assoc($query);
	
	$currentuser = new User($array);
}

$boardtitle   = "Nightboard";
$currentstyle = "default";

$template = new Template(array(name => "default")); // NOT final, just temporary replacement for query

/* Make SQL query for link section based on user's powerlevel */
if (isset($currentuser))
	$linkquerystring = "SELECT * FROM links WHERE (minlevel > 0 AND minlevel <= \"" . $currentuser->powerlevel . "\") OR minlevel IS NULL";
else
	$linkquerystring = "SELECT * FROM links WHERE minlevel = 0 OR minlevel IS NULL";

/* Generate page */
$query = mysqli_query($mysqli, $linkquerystring);
$template->header($boardtitle, mysqli_fetch_all($query, MYSQL_ASSOC), $currentuser);

$query        = mysqli_query($mysqli, "SELECT * FROM forums");
$templatedata = array("forums" => mysqli_fetch_all($query, MYSQL_ASSOC));
$template->main("index", $templatedata);

$template->footer();

?>