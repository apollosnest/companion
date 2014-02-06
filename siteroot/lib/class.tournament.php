<?php
require_once('class.object.php');

class Tournament extends Object
{
	public $TournamentId;
	public $Name;
	public $DateScheduled;
	public $DateCreated;
	
	public function __construct($id, $name, $date_scheduled, $date_created)
	{
		$this->TournamentId = $id;
		$this->Name = $name;
		$this->DateScheduled = $date_scheduled;
		$this->DateCreated = $date_created;
	}
}
?>