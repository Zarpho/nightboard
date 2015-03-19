<?php

/* :: Nightboard ::
 * 
 * FILENAME:    styles/default/main.login.php
 * AUTHOR(S):   Joey Miller ("Zarpho")
 * DESCRIPTION: Contains data for the login page portion of the "Default" template.
 */

/* Variables */
$submitted   = $templatedata[submitted];   // Has the form been submitted?
$allfields   = $templatedata[allfields];   // Have all required fields been filled out?
$credentials = $templatedata[credentials]; // Are login credentials correct?

if ($submitted == TRUE)
{
	if ($credentials == TRUE)
		$message = "You have successfully logged in.";
	elseif ($allfields == FALSE)
		$message = "Please fill out all of the fields.";
	else
		$message = "You have specified an incorrect username or password.";
}
else
{
	$message = NULL;
}

/* HTML */
echo <<<_END

		<div id="main">
			<table id="main-table">
				<tbody>
					<tr>
						<td class="table-heading">Login</td>
					</tr>
					<tr>
						<td>
							<p>{$message}</p>
							<form method="post" action="login.php">
								<table id="form-table">
									<tbody>
										<tr>
											<td>Username:</td>
											<td><input type="text" name="username" size="15" maxlength="15" /></td>
										</tr>
										<tr>
											<td>Password:</td>
											<td><input type="password" name="password" size="15" maxlength="15" /></td>
										</tr>
										<tr>
											<td class="center" colspan="2"><input type="submit" value="Login" /></td>
										</tr>
									</tbody>
								</table>
							</form>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
_END;

?>