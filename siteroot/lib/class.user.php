<?php  
require_once('class.object.php');
require_once('class.name.php');
  
class User extends Object
{
    public $ID;
	public $Name;
	public $Username;
	// not going to store hash for security, just check it
	private $role = 0;
	
	public function __construct($userid, $username, $role)
	{
		$this->ID = $userid;
		$this->Username = $username;
		//$this->Name = new Name($forename, $surname);
		$this->role = $role;
	}
}  
  
?>  
