<?php
require_once('class.date.php');

class Fixture
{
	public $FixtureID;
	public $TournamentID;
	public $Location;
	public $Date;
	
	public function __construct($fixtureid, $tournamentid, Date $date, $location)
	{
		$this->FixtureID = $id;
		$this->TournamentID = $tournamentid;
		$this->Date = $date;
		$this->Location = $location;
	}
}
?>