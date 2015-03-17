<?php

/* :: Nightboard ::
 * 
 * FILENAME:    logout.php
 * AUTHOR(S):   Joey Miller ("Zarpho")
 * DESCRIPTION: The page of the board where users can log out.
 */

require("etc/index.php");
require("lib/index.php");

$db     = new Database($hostname, $username, $password, $database); // Create a database object
$mysqli = $db->connect();                                           // Connect to that database

if (!$mysqli)
{
	die("Could not connect to MySQL database. Please make sure etc/db.php is configured correctly. ~ " . mysqli_error());
}

mysqli_select_db($mysqli, $db->database);

session_start();

if (isset($_SESSION[user]))
{
	$query = mysqli_query($mysqli, "SELECT * FROM users WHERE id=\"" . $_SESSION[user] . "\"");
	$array = mysqli_fetch_assoc($query);
	
	$currentuser = new User($array);
	
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

if (isset($currentuser))
	$linkquerystring = "SELECT * FROM links WHERE (minlevel > 0 AND minlevel <= \"" . $currentuser->powerlevel . "\") OR minlevel IS NULL";
else
	$linkquerystring = "SELECT * FROM links WHERE minlevel = 0 OR minlevel IS NULL";

$query = mysqli_query($mysqli, $linkquerystring);
$template->header($boardtitle, mysqli_fetch_all($query, MYSQL_ASSOC), $currentuser);

$template->main("logout", $templatedata);

$template->footer();

?>