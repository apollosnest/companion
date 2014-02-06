<?php
require_once('class.database.php');
require_once('class.encrypt.php');
require_once('class.user.php');

class Account extends Database
{
 	/** checks username and password combination match and nothing else,
		i.e. does not create a persistent session for the user. **/
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
	
	/** returns a user object from its id. (DB) **/
	public function user_from_id($id)
	{
		$result = mysql_query("SELECT username, forename, surname, role FROM `user` WHERE userid = '$id'") or trigger_error(mysql_error());
		if(mysql_num_rows($result) == 0) return false; // no user with that id
		$row = mysql_fetch_assoc($result);
		return new User($id, $row['username'], $row['forename'], $row['surname'], $row['role']);
	}
	
	/** debug function to create user table. **/
	protected function create_table()
	{
		$sql = "CREATE TABLE IF NOT EXISTS `user` (
			`userid` int(11) NOT NULL AUTO_INCREMENT COMMENT 'range large enough for userbase',
			`username` varchar(32) NOT NULL,
			`forename` varchar(32) DEFAULT NULL,
			`surname` varchar(32) NOT NULL,
			`password` char(60) NOT NULL COMMENT 'brcypt 60 char hash',
			`role` tinyint(4) NOT NULL COMMENT 'could use enum instead',
			PRIMARY KEY (`userid`)
			) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='minimal user account information' AUTO_INCREMENT=2 ;";
		$res = myqsql_query($sql, $this->link) or trigger_error(mysql_error());
	}
	
	/** debug funciton to insert test rows into the user table. **/
	protected function create_test_data()
	{
		$sql = "INSERT INTO `user` (`userid`, `username`, `forename`, `surname`, `password`, `role`) VALUES
			(1, 'perry', NULL, 'Perry', '$2y$11$Vr5dPT41hbTGitPRx6Q4XeJP0DM9SkFGipnR9dHXYYeKuQsv8ohu2', 1);";
		$res = mysql_query($sql, $this->link) or trigger_error(mysql_error());
	}
}
?>