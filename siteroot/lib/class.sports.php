<?php
require_once('class.database.php');
require_once('class.sport.php');
class Sports extends Database
{
	public function sport_from_id($id)
	{
		$sql = "SELECT sportName FROM sport WHERE sportID = '{$id}'";
		$res = mysql_query($sql, $this->link) or trigger_error(mysql_error());
		if(mysql_num_rows($res) == 1)
		{
			$row = mysql_fetch_assoc($res);
			$sport = new Sport($id, $row['sportName']);
			return $sport;
		}
		else return NULL;
	}
	
	/** create a new sport by just passing the name of it. **/
	public function create_sport($name)
	{
		$sql = "INSERT INTO sport (sportName) VALUES ('{$name}')";
		$res = mysql_query($sql, $this->link) or trigger_error(mysql_error());
		return ($res != NULL);
	}
}
?>