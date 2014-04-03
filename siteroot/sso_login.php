<?php
/*******************************************************************************
** Login system                                                               **
********************************************************************************
** The University of Bath Single Sign-On system uses the Jasig CAS protocol.  **
** The University website has a brief non-technical overview:                 **
**     http://www.bath.ac.uk/web/tools/sso/                                   **
** A full protocol specification is laid out here:                            **
**     http://www.jasig.org/cas/protocol                                      **
*******************************************************************************/

$casEndpoint = "https://auth.bath.ac.uk"; // root URL of CAS endpoint
$loginURL = "http://people.bath.ac.uk/ldjb20/auth/login.php"; // likely the current URL

// check to see if a login ticket has been received
if ($_GET["ticket"]) {
	// validate ticket
	$response = file_get_contents($casEndpoint . "/validate?service=" .
						   urlencode($loginURL) . "&ticket=" . $_GET["ticket"]);
	// parse response
	$response = explode("\n", $response);
	// login will almost always be successful
	if ($response[0] == "yes") {
		require_once("lib/ldap.php");
		$userData = lookupUser($response[1]);
		if ($userData["found"]) {
			// certain BUCS accounts shouldn't be allowed entry
			if ($userData["accountstate"] == "Full") {
				echo "Welcome, <strong>{$userData['displayname']}</strong>!";
			}
			else {
				echo "Error: Not full account.";
			}
		}
		else {
			echo "Error: Account not found.";
		}
	}
	else {
		echo "Error: Could not log in.";
	}
}
else {
	echo "<a href=\"$casEndpoint/login?service=",
						   urlencode($loginURL), '" target="_blank">Log in</a>';
}
?>
