<?php
require_once('lib/password.php');
class Encrypt
{
	public static function get_hash($password)
	{
		return password_hash($password, PASSWORD_BCRYPT, array('cost' => 11));
	}
	
	public static function check_hash($password, $hash)
	{
		return password_verify($password, $hash);	
	}
}
?>