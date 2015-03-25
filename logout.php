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

$boardtitle   = "Nightboard";
$currentstyle = "default";

$templatedata = array("loggedin" => $loggedin);

$template = new Template(array(name => "default")); // NOT final, just temporary replacement for query

/* Generate page */
$query = mysqli_query($mysqli, $db->linkquerystring($currentuser->powerlevel));
$template->header($boardtitle, mysqli_fetch_all($query, MYSQL_ASSOC), $currentuser);

$template->main("logout", $templatedata);

$template->footer();

?>