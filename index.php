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

error_reporting(E_ALL);

$db     = new Database($hostname, $username, $password, $database); // Create a database object
$mysqli = $db->connect();                                           // Connect to that database

if (!$mysqli)
{
	die("Could not connect to MySQL database. Please make sure etc/db.php is configured correctly. ~ " . mysqli_error());
}

mysqli_select_db($mysqli, $db->database);

$boardtitle   = "Nightboard";
$currentstyle = "default";

if (isset($_COOKIE["user"]))
{
	$query = mysqli_query($mysqli, "SELECT * FROM users WHERE id=\"" . $_COOKIE["user"] . "\"");
	$currentuser = new User(mysqli_fetch_assoc($query));
	$querystring = mysqli_fetch_assoc($query);
}

$template = new Template(array(name => "default")); // NOT final, just temporary replacement for query

$query = mysqli_query($mysqli, "SELECT * FROM links");
$template->header($boardtitle, mysqli_fetch_all($query, MYSQL_ASSOC), $currentuser);

print_r($querystring);

$query        = mysqli_query($mysqli, "SELECT * FROM forums");
$templatedata = array("forums" => mysqli_fetch_all($query, MYSQL_ASSOC));
$template->main("index", $templatedata);

$template->footer();

?>