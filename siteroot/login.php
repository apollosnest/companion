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

require_once("config.php");

$casEndpoint = "https://auth.bath.ac.uk"; // root URL of CAS endpoint
$loginURL = SITE_ROOT . "login.php"; // likely the current URL

// check to see if a login ticket has been received
if (isset($_GET["ticket"])) {
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
				session_start();
				$_SESSION['user']['username'] = $response[1];
				$_SESSION['user']['displayname'] = $userData['displayname'];
				$_SESSION['user']['uidnumber'] = $userData['uidnumber'];
				$_SESSION['user']['mail'] = $userData['mail'];
				$_SESSION['user']['loggedin'] = true;
				header("Location: " . SITE_ROOT);
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
	header("Location: " . $casEndpoint . "/login?service=" . urlencode(SITE_ROOT . "login.php"));
}
?>
