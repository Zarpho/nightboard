<?php

/* :: Nightboard ::
 * 
 * FILENAME:    styles/default/main.memberlist.php
 * AUTHOR(S):   Joey Miller ("Zarpho")
 * DESCRIPTION: Contains data for the memberlist page portion of the "Default" template.
 */

/* Variables */
$memberlist  = generatememberlist($templatedata[memberlist]); // HTML data for memberlist displayed
$currentuser = $templatedata[currentuser];                    // Data for current user

/* Functions */
function generatememberlist($array)
{	
	$generatedmemberlist; // HTML data for memberlist
	
	foreach($array as $user)
	{
		$id         = $user[id];
		$username   = $user[username];
		$email      = $user[email];
		$powerlevel = $user[powerlevel];
		$website    = $user[website];
	
		include("snippets/main.memberlist.generatedmemberlist.php");
	}
	
	$generatedmemberlist = ltrim($generatedmemberlist); // Trim whitespace from beginning of $generatedforums so HTML looks normal
	
	return $generatedmemberlist;
}

/* HTML */
echo <<<_END

		<div id="main">
			<table id="main-table">
				<tbody>
					<tr>
						<td class="table-heading" colspan="4">Members</td>
					</tr>
					{$memberlist}
				</tbody>
			</table>
		</div>
_END;

?>