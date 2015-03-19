<?php

/* :: Nightboard ::
 * 
 * FILENAME:    styles/default/snippets/main.memberlist.generatedmemberlist.php
 * AUTHOR(S):   Joey Miller ("Zarpho")
 * DESCRIPTION: Contains HTML snippet for the "generatedmemberlist" variable used by
 *              main.memberlist.php of the "Default" template.
 */

/* This snippet contains data to generate a single row (user) in a memberlist table. The variables
 * used come from main.memberlist.php and are as follows:
 * 
 * $id         - The user's ID #
 * $username   - The username
 * $email      - The user's email address
 * $powerlevel - The user's powerlevel (see documentation for more info)
 * $website    - The user's website
 */

$generatedmemberlist .= <<<_END

						<tr>
							<td class="cell-05">{$id}</td>
							<td>{$username}</td>
							<td class="cell-15"><a href="mailto:{$email}">Email</a></td>
							<td class="cell-15"><a href="{$website}">Website</a></td>
						</tr>
_END;

?>