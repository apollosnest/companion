<?php
class Permissions
{
	public $bitfield;
	public function Permissions($bitfield)
	{
		$this->bitfield = $bitfield;
	}

	public function give_permission($permission)
	{
		$this->bitfield |= $permission;
		return $this;
	}
	
	public function has_permission($permission)
	{
		return 	$this->bitfield & permission;
	}
}
?>