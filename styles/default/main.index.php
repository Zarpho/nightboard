<?php

/* :: Nightboard ::
 * 
 * FILENAME:    styles/default/main.index.php
 * AUTHOR(S):   Joey Miller ("Zarpho")
 * DESCRIPTION: Contains data for the index page portion of the "Default" template.
 */

/* Variables */
$forums      = generateforums($templatedata[forums]); // HTML data for forums displayed
$currentuser = $templatedata[currentuser];            // Data for current user

/* Functions */
function generateforums($array)
{	
	$generatedforums; // HTML data for forumlist
	
	foreach($array as $forum)
	{
		$id          = $forum[id];
		$name        = $forum[name];
		$description = $forum[description];
		$categoryid  = $forum[categoryid];
		$threads     = $forum[threads];
		$posts       = $forum[posts];
		$latestid    = $forum[latestid];
	
		include("snippets/main.index.generatedforums.php");
	}
	
	$generatedforums = ltrim($generatedforums); // Trim whitespace from beginning of $generatedforums so HTML looks normal
	
	return $generatedforums;
}

/* HTML */
echo <<<_END

		<div id="main">
			<table id="main-table">
				<tbody>
					{$forums}
				</tbody>
			</table>
		</div>
_END;

?>