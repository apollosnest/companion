<?php
require_once('class.object.php');

class Tournament extends Object
{
	public $TournamentId;
	public $Name;
	public $SportID;
	public $TypeID;
	public $Stage;
	
	public function __construct($id, $name, $sportid, $typeid, $stage)
	{
		$this->TournamentId = $id;
		$this->Name = $name;
		$this->SportID = $sportid;
		$this->TypeID = $typeid;
		$this->Stage = $stage;
	}
}
?>