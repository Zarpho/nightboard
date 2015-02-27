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

$db     = new Database($hostname, $username, $password, $database);                   // Create a database object
$mysqli = mysqli_connect($db->hostname, $db->username, $db->password, $db->database); // Connect to that database

if (!$mysqli)
{
	die("Could not connect to MySQL database. Please make sure etc/db.php is configured correctly. ~ " . mysqli_error());
}

mysqli_select_db($db->database);

$boardtitle   = "Nightboard";
$currentstyle = "default";

$template = new Template(array(name => "default")); // NOT final, just temporary replacement for query

$query = mysqli_query($mysqli, "SELECT * FROM links");
$template->header($boardtitle, mysqli_fetch_all($query, MYSQL_ASSOC));

echo <<<_END

		<div id="main">
			<table id="main-table">
				<tbody>
_END;

$query  = mysqli_query($mysqli, "SELECT * FROM forums");
$forums = mysqli_fetch_all($query, MYSQL_ASSOC);

foreach($forums as $forum)
{	
	$id          = $forum[id];
	$name        = $forum[name];
	$description = $forum[description];
	$categoryid  = $forum[categoryid];
	$threads     = $forum[threads];
	$posts       = $forum[posts];
	$latestid    = $forum[latestid];
	
	/* Begin preformatted section */
	echo <<<_END

					<tr>
						<td class="forumname"><a title="$name" href="thread.php?id=$id">$name</a></td>
						<td class="threadcount">Threads</td>
						<td class="postcount">Posts</td>
						<td class="latestpost">Latest post</td>
					</tr>
					<tr>
						<td class="forumname">$description</td>
						<td class="threadcount">$threads</td>
						<td class="postcount">$posts</td>
						<td class="latestpost">$latestid</td>
					</tr>
_END;
	/* End preformatted section */
}

echo <<<_END

				</tbody>
			</table>
		</div>
	</body>
</html>
_END;

?>