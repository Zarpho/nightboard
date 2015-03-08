<?php

/* :: Nightboard ::
 * 
 * 
 */

$generatedforums .= <<<_END

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

?>