<?php

/* :: Nightboard ::
 * 
 * FILENAME:    styles/default/main.login.php
 * AUTHOR(S):   Joey Miller ("Zarpho")
 * DESCRIPTION: Contains data for the login page portion of the "Default" template.
 */

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
							<form method="post" action="login.php">
								Username: <input type="text" name="username" size="15" maxlength="15" /><br />
								Password: <input type="password" name="password" size="15" maxlength="15" /><br />
								<br />
								<input type="submit" value="Login" />
							</form>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
_END;

?>