<?php
require_once('class.database.php');
require_once('class.team.php');
class Teams extends Database
{
	public function team_from_id($id)
	{
		$sql = "SELECT teamName, ownerID, sportID FROM team WHERE teamID = '{$id}'";
		$res = mysql_query($sql, $this->link) or trigger_error(mysql_error());
		if(mysql_num_rows($res) == 1)
		{
			$row = mysql_fetch_assoc($res);
			$team = new Team($id, $row['teamName'], $row['ownerID'], $row['sportID']);
			return $team;
		}
		else return NULL;
	}
	
	
	/** return all teams user is a member of **/
	public function teams_for_user($userid)
	{
		$sql = "SELECT teamroster.teamID, team.teamName, team.ownerID, team.sportID
				FROM team
				INNER JOIN teamroster ON team.teamID = teamroster.teamID
				AND teamroster.userID = '$userid'";
		$res = mysql_query($sql, $this->link) or trigger_error(mysql_error());
		$teams = array();
		while($row = mysql_fetch_assoc($res))
		{
			array_push($teams, new Team($row['teamID'], $row['teamName'], $row['ownerID'], $row['sportID']));
		}
		return $teams;
	}
	
	public function teams_owned_by_user($userid)
	{
		$sql = "SELECT team.teamID, team.teamName, team.ownerID, team.sportID
				FROM team
				WHERE team.ownerID = '$userid'";
		$res = mysql_query($sql, $this->link) or trigger_error(mysql_error());
		$teams = array();
		while($row = mysql_fetch_assoc($res))
		{
			array_push($teams, new Team($row['teamID'], $row['teamName'], $row['ownerID'], $row['sportID']));
		}
		return $teams;
	}
	
	/** create a team, initially with 0 members. **/
	public function create_team($name, $owner, $sport)
	{
		$sql = "INSERT INTO team (teamName, ownerID, sportID) VALUES ('{$name}', '{$owner}', '{$sport}')";
		$res = mysql_query($sql, $this->link) or trigger_error(mysql_error());
		return ($res != NULL);
	}
}
?>