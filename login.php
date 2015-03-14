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
		setcookie("user", $userarray[id], time() + 60);
	}
}
else
{
	$submitted   = FALSE;
	$allfields   = FALSE;
	$credentials = FALSE;
}

$templatedata = array("submitted" => $submitted, "allfields" => $allfields, "credentials" => $credentials);

$template = new Template(array(name => "default")); // NOT final, just temporary replacement for query

$query = mysqli_query($mysqli, "SELECT * FROM links");
$template->header($boardtitle, mysqli_fetch_all($query, MYSQL_ASSOC));

$template->main("login", $templatedata);

$template->footer();

?>