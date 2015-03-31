<?php

/* :: Nightboard ::
 * 
 * FILENAME:    login.php
 * AUTHOR(S):   Joey Miller ("Zarpho")
 * DESCRIPTION: The page of the board where users can log in.
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

/* Check to see if the user entered all fields */
if ($_POST[username] == "" xor $_POST[password] == "")
{
	$submitted   = TRUE;  // Has the form been submitted?
	$allfields   = FALSE; // Have all required fields been filled out?
	$credentials = FALSE; // Are login credentials correct?
}
elseif (isset($_POST[username]) and isset($_POST[password]))
{
	$submitted = TRUE;
	$allfields = TRUE;
	
	$userquery = mysqli_query($mysqli, "SELECT * FROM users WHERE username=\"" . $_POST[username] . "\"");
	$userarray = mysqli_fetch_assoc($userquery);
	
	if ($userarray['username'] == NULL or $userarray['password'] != $_POST[password])
		$credentials = FALSE;
	else
		$credentials = TRUE;
	
	if ($credentials == TRUE)
	{
		header("Refresh: 5; URL=index.php");
		
		$_SESSION[user] = $userarray[id];
	}
}
else
{
	$submitted   = FALSE;
	$allfields   = FALSE;
	$credentials = FALSE;
}

/* Check to see if user is already logged in */
if (isset($_SESSION[user]))
{
	$query = mysqli_query($mysqli, "SELECT * FROM users WHERE id=\"" . $_SESSION[user] . "\"");
	$array = mysqli_fetch_assoc($query);
	
	$currentuser = new User($array);
}

$boardtitle = "Nightboard";

$styledata = array("submitted" => $submitted, "allfields" => $allfields, "credentials" => $credentials);

/* Generate page */
if (isset($currentuser))
	$query = mysqli_query($mysqli, 'SELECT * FROM styles WHERE name="' . $currentuser->style . '"');
else
	$query = mysqli_query($mysqli, 'SELECT * FROM styles WHERE name="default"');
	
$style = new Style(mysqli_fetch_assoc($query));

$query = mysqli_query($mysqli, $db->linkquerystring($currentuser->powerlevel));
$style->header($boardtitle, mysqli_fetch_all($query, MYSQL_ASSOC), $currentuser);

$style->main("login", $styledata);

$style->footer();

?>