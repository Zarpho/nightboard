<?php

/* :: Nightboard ::
 * 
 * FILENAME:    logout.php
 * AUTHOR(S):   Joey Miller ("Zarpho")
 * DESCRIPTION: The page of the board where users can log out.
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
	$loggedin = TRUE;
	
	session_destroy();
}
else
{
	$loggedin = FALSE;
}

header("Refresh: 5; URL=index.php");

$boardtitle = "Nightboard";

$styledata = array("loggedin" => $loggedin);

/* Generate page */
if (isset($currentuser))
	$query = mysqli_query($mysqli, 'SELECT * FROM styles WHERE name="' . $currentuser->style . '"');
else
	$query = mysqli_query($mysqli, 'SELECT * FROM styles WHERE name="default"');
	
$style = new Style(mysqli_fetch_assoc($query));

$query = mysqli_query($mysqli, $db->linkquerystring($currentuser->powerlevel));
$style->header($boardtitle, mysqli_fetch_all($query, MYSQL_ASSOC), $currentuser);

$style->main("logout", $styledata);

$style->footer();

?>