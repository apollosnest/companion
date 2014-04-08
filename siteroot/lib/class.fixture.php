<?php
require_once('class.date.php');

class Fixture
{
	public $FixtureID;
	public $TournamentID;
	public $Location;
	public $Date;
	
	public $Teams = array();
	
	public function __construct($fixtureid, $tournamentid, Date $date, $location)
	{
		$this->FixtureID = $fixtureid;
		$this->TournamentID = $tournamentid;
		$this->Date = $date->get_string();
		$this->Location = $location;
	}
	
	public function add_team($teamid)
	{
		array_push($this->Teams, $teamid);
	}
}
?>