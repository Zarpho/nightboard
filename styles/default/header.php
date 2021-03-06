<?php

/* :: Nightboard ::
 * 
 * FILENAME:    styles/default/header.php
 * AUTHOR(S):   Joey Miller ("Zarpho")
 * DESCRIPTION: Contains data for the header portion of the "Default" style.
 */

/* Variables */
$links      = generatelinks($links_array);
$stylesheet = $this->directory;

if (isset($currentuser->username))
	$message = "You are logged in as <a href=\"memberlist.php?id=$currentuser->id\">$currentuser->username</a>.";
else
	$message = "You are not logged in.";

/* Functions */
function generatelinks($array)
{
	$generatedlinks; // Link HTML data
	
	foreach ($array as $link)
	{
		$name        = $link[name];
		$destination = $link[destination];
	
		$generatedlinks .= "								<a title=\"$name\" href=\"$destination\">$name</a> -" . "\n";
	}
	
	$generatedlinks = ltrim($generatedlinks);        // Trim whitespace from beginning of $generatedlinks so HTML looks normal
	$generatedlinks = rtrim($generatedlinks, "-\n"); // Trim " -" from end of $generatedlinks so there isn't a trailing dash
	
	return $generatedlinks;
}

/* HTML */
echo <<<_END
<!DOCTYPE html>
<html>
	<head>
		<title>{$boardtitle} - Index page</title>
		<link rel="Stylesheet" type="text/css" href="styles/{$stylesheet}.css" />
		<meta charset="UTF-8" />
	</head>
	<body>
		<div id="header">
			<table id="header-table">
				<tbody>
					<tr>
						<td>
							<p class="title">Nightboard</p>
							<p class="subtitle">Version  -1</p>
						</td>
					</tr>
					<tr>
						<td>
							<p class="links">
								{$links}
							</p>
							<p class="links">{$message}</p>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
_END;

?>