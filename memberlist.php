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

$query        = mysqli_query($mysqli, "SELECT id, username, email, powerlevel, website FROM users");
$templatedata = array("memberlist" => mysqli_fetch_all($query, MYSQL_ASSOC));
$template->main("memberlist", $templatedata);

$template->footer();

?>