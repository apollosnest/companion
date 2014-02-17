<?php
require_once('class.teammember.php');

class Team
{
	public $TeamID;
	private $name;
	private $members;
	
	public function __construct($id, $name, $members)
	{
		$this->TeamID = $id;
		$this->TeamName = $name;
		$this->members = $members;
	}
	
	public function team_size()
	{
		return count($this->members);
	}
}

?>