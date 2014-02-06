<?php
require_once('class.database.php');
require_once('class.encrypt.php');
require_once('class.user.php');

class Account extends Database
{
	/*public function Account()
	{
		parent::__construct(); // call parent constructor	
	}*/
 
	public function authenticate($username, $pass)
	{
		$username = strtolower($username);
		$result = mysql_query("SELECT password FROM `user` WHERE username LIKE '$username' LIMIT 1", $this->link) or trigger_error(mysql_error());
		if(mysql_num_rows($result) == 0)
		{	
			echo "user does not exist";
			return false; // user doesn't exist
		}
		$hash = mysql_result($result, 0);
		return Encrypt::check_hash($pass, $hash);
	}
	
	public function register_user(User $user)
	{
		
	}
	
	public function update_user(User $user)
	{
		
	}
	
	public function user_from_id($id)
	{
		$result = mysql_query("SELECT username, forename, surname, role FROM `user` WHERE userid = '$id'") or trigger_error(mysql_error());
		if(mysql_num_rows($result) == 0) return false; // no user with that id
		$row = mysql_fetch_assoc($result);
		return new User($id, $row['username'], $row['forename'], $row['surname'], $row['role']);
	}
}
?>