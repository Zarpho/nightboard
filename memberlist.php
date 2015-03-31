<?php

/* :: Nightboard ::
 * 
 * FILENAME:    memberlist.php
 * AUTHOR(S):   Joey Miller ("Zarpho")
 * DESCRIPTION: The memberlist page of the board, which displays all members.
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

$boardtitle = "Nightboard";

/* Generate page */
if (isset($currentuser))
	$query = mysqli_query($mysqli, 'SELECT * FROM styles WHERE name="' . $currentuser->style . '"');
else
	$query = mysqli_query($mysqli, 'SELECT * FROM styles WHERE name="default"');
	
$style = new Style(mysqli_fetch_assoc($query));

$query = mysqli_query($mysqli, $db->linkquerystring($currentuser->powerlevel));
$style->header($boardtitle, mysqli_fetch_all($query, MYSQL_ASSOC), $currentuser);

if (!isset($_GET[id]))
{
	$pagemode = "memberlist";
	$pagedata = mysqli_fetch_all(mysqli_query($mysqli, 'SELECT id, username, email, powerlevel, website FROM users'), MYSQL_ASSOC);
}
else
{
	$pagemode = "memberinfo";
	$pagedata = mysqli_fetch_assoc(mysqli_query($mysqli, 'SELECT * FROM users WHERE id="' . $_GET[id] . '"'));
}

$styledata = array("pagemode" => $pagemode, "pagedata" => $pagedata);
$style->main("memberlist", $styledata);

$style->footer();

?>