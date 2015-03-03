<?php

/* :: Nightboard ::
 * 
 * FILENAME:    styles/default/main.index.php
 * AUTHOR(S):   Joey Miller ("Zarpho")
 * DESCRIPTION: Contains data for the index page portion of the "Default" template.
 */

/* Variables */
$forums     = generateforums($forums_array); // HTML data for forums displayed
$forumshtml = <<<_END

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

/* Functions */
function generateforums($array)
{
	$generatedforums; // HTML data
	
	foreach($array as $forum)
	{	
		$id          = $forum[id];
		$name        = $forum[name];
		$description = $forum[description];
		$categoryid  = $forum[categoryid];
		$threads     = $forum[threads];
		$posts       = $forum[posts];
		$latestid    = $forum[latestid];
	
		$generatedforums .= $forumshtml;
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