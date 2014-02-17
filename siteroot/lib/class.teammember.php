<?php
require_once('class.user.php');

class TeamMember extends User
{
	public $TeamID;
	public function __construct($userid, $username, $forename, $surname, $role, $teamid)
	{
		parent::__construct($userid, $username, $forename, $surname, $role);
		$this->TeamID = $teamid;	
	}
}
?>