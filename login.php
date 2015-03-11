<?php

/* :: Nightboard ::
 * 
 * FILENAME:    login.php
 * AUTHOR(S):   Joey Miller ("Zarpho")
 * DESCRIPTION: The page of the board where users can log in.
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

$boardtitle   = "Nightboard";
$currentstyle = "default";

$template = new Template(array(name => "default")); // NOT final, just temporary replacement for query

$query = mysqli_query($mysqli, "SELECT * FROM links");
$template->header($boardtitle, mysqli_fetch_all($query, MYSQL_ASSOC));

/* Check to see if the user entered all fields */
if (isset($_POST[username]) and isset($_POST[password]))
{
	$entered = TRUE;
}
else
{
	$entered = FALSE;
}

if ($entered == TRUE)
{
	$userquery = mysqli_query($mysqli, "SELECT * FROM users WHERE username=\"" . $_POST[username] . "\"");
	$passquery = mysqli_query($mysqli, "SELECT * FROM users WHERE password=\"" . $_POST[password] . "\"");
	
	$userarray = mysqli_fetch_assoc($userquery);
	$passarray = mysqli_fetch_assoc($passquery);
	
	if ($userarray['username'] == NULL or $passarray['password'] == NULL)
		$message = "You have specified an incorrect username or password. Please try again.";
	else
		$message = "You have successfully logged in.";
}

$template->main("login", $templatedata);

$template->footer();

?>