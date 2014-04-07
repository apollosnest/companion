<?php
require_once('class.teammember.php');

class Team
{
	public $TeamID;
	public $TeamName;
	public $OwnerID;
	public $SportID;
	
	public function __construct($id, $name, $owner, $sport)
	{
		$this->TeamID = $id;
		$this->TeamName = $name;
		$this->OwnerID = $owner;
		$this->SportID = $sport;
	}
	
	public function team_size()
	{
		return count($this->members);
	}
}

?>