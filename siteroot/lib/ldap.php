<?php
/*******************************************************************************
** LDAP lookup                                                                **
********************************************************************************
** lookupUser takes a BUCS username and returns an array. Always check        **
** 'found' first to find out whether the user has been found or not. If they  **
** have been found, the user's details are available.                         **
*******************************************************************************/

function lookupUser($uid) {
	$host = "ldap.bath.ac.uk";
	$dn = "o=bath.ac.uk";
	$con = ldap_connect($host);
	// anonymous login
	ldap_bind($con);
	$results = ldap_search($con, $dn, "uid=" . $uid);
	// get array from search results
	$entries = ldap_get_entries($con, $results);
	// ensure a user has been found
	if ($entries["count"] > 0) {
		return Array (
			"found" => 1,
			"uidnumber" => $entries[0]["uidnumber"][0],
			"accountstate" => $entries[0]["accountstate"][0],
			"displayname" => $entries[0]["displayname"][0],
			"mail" => $entries[0]["mail"][0]
		);
	}
	else {
		return Array ("found" => 0);
	}
}
?>