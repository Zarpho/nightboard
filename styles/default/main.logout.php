<?php

/* :: Nightboard ::
 * 
 * FILENAME:    styles/default/main.logout.php
 * AUTHOR(S):   Joey Miller ("Zarpho")
 * DESCRIPTION: Contains data for the logout page portion of the "Default" template.
 */

/* Variables */
$loggedin = $templatedata[loggedin]; // Is the user logged in?

if ($loggedin == TRUE)
	$message = "You have successfully logged out.";
else
	$message = "You are not logged in.";

/* HTML */
echo <<<_END

		<div id="main">
			<table id="main-table">
				<tbody>
					<tr>
						<td class="table-heading">Logout</td>
					</tr>
					<tr>
						<td>
							<p>{$message}</p>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
_END;

?>