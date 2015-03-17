<?php

/* :: Nightboard ::
 * 
 * FILENAME:    styles/default/snippets/main.memberlist.generatedmemberlist.php
 * AUTHOR(S):   Joey Miller "Zarpho"
 * DESCRIPTION: Contains HTML snippet for the "generatedmemberlist" variable used by
 *              main.memberlist.php of the "Default" template
 */

$generatedmemberlist .= <<<_END

						<tr>
							<td>$id</td>
							<td>$username</td>
							<td><a href="mailto:$email">Email</a></td>
							<td><a href="$website">Website</a></td>
						</tr>
_END;

?>