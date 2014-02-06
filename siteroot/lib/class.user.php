<?php  
 require_once('class.name.php');
  
class User  
{
    public $ID;
	public $Name;
	public $Username;
	// not going to store hash for security, just check it
	private $role = 0;
	
	public function __construct($userid, $username, $forename, $surname, $role)
	{
		$this->ID = $userid;
		$this->Username = $username;
		$this->Name = new Name($forename, $surname);
		$this->role = $role;
	}
	
	
	// TODO: remove, debug function
	public function quick_dump()
	{
		var_dump($this);	
	}
}  
  
?>  
