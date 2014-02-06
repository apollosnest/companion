<?php
require_once('class.database.php');
require_once('class.encrypt.php');

class Account extends Database
{
	/*public function Account()
	{
		parent::__construct(); // call parent constructor	
	}*/
	
	// TODO: validate data/strip
	public function authenticate($username, $pass)
	{
		$result = mysql_query("SELECT password FROM `user` WHERE username LIKE '$username' LIMIT 1", $this->link) or trigger_error(mysql_error());
		if(mysql_num_rows($result) == 0)
		{	
			echo "user does not exist";
			return false; // user doesn't exist
		}
		$hash = mysql_result($result, 0);
		return Encrypt::check_hash($pass, $hash);
	}
}
?>