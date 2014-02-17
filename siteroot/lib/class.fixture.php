<?php
require_once('class.date.php');

class Fixture
{
	public $FixtureID;
	public $Teams = array();
	public $Date;
	public $Location;
	
	public function __construct($id, array $teams, Date $date, $location)
	{
		$this->FixtureID = $id;
		$this->Teams = $teams;
		$this->Date = $date;
		$this->Location = $location;
	}
}
?>