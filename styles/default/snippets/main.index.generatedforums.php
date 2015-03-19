<?php

/* :: Nightboard ::
 * 
 * FILENAME:    styles/default/snippets/main.index.generatedforums.php
 * AUTHOR(S):   Joey Miller ("Zarpho")
 * DESCRIPTION: Contains HTML snippet for the "generatedforums" variable used by main.index.php of
 *              the "Default" template.
 */

/* This snippet contains data to generate a single row (forum) in a forumlist table. The variables
 * used come from main.index.php and are as follows:
 * 
 * $id          - The forum's ID #
 * $name        - The forum's name
 * $description - The forum's description
 * $categoryid  - The ID # of the category the forum is in
 * $threads     - The amount of threads in the forum
 * $posts       - The amount of posts in the forum
 * $latestid    - The ID # of the latest post made in the forum
 */

$generatedforums .= <<<_END

						<tr>
							<td class="forumname"><a title="{$name}" href="thread.php?id={$id}">{$name}</a></td>
							<td class="threadcount">Threads</td>
							<td class="postcount">Posts</td>
							<td class="latestpost">Latest post</td>
						</tr>
						<tr>
							<td class="forumname">{$description}</td>
							<td class="threadcount">{$threads}</td>
							<td class="postcount">{$posts}</td>
							<td class="latestpost">{$latestid}</td>
						</tr>
_END;

?>