<?php
class Sport
{
	public $SportID;
	public $SportName;
	
	public function __construct($id, $name)
	{
		$this->SportID = $id;
		$this->SportName = $name;
	}
}
?>