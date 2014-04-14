<?php
require_once('class.database.php');
require_once('class.tournament.php');
require_once('class.fixture.php');
require_once('class.date.php');
class Scheduler extends Database
{
	
	/** create a tournament with the given name. (DB) **/
	public function create_tournament($name, $sport, $type)
	{
		$sql = "INSERT INTO `tournament` (tournamentName, sportID, typeID, stage) VALUES ('$name', '$sport', '$type', '0')"; // NOW()
		$res = mysql_query($sql, $this->link) or trigger_error(mysql_error());
		return ($res != NULL);
	}
	
	/** get a tournmanent object from its id. (DB) **/
	public function tournament_from_id($tournamentid)
	{
		$sql = "SELECT tournamentName, sportID, typeID, stage FROM `tournament` where tournamentID = '$tournamentid' LIMIT 1";
		$res = mysql_query($sql, $this->link) or trigger_error(mysql_error());
		if(mysql_num_rows($res) == 1)
		{
			$row = mysql_fetch_assoc($res);
			$tournament = new Tournament(
				$tournamentid, 
				$row['tournamentName'], 
				$row['sportID'],
				$row['typeID'],
				$row['stage']);
			return $tournament;
		}
		else return NULL;
	}
	
	public function fixtures_for_tournament($tournamentid)
	{
		$sql = "SELECT tournamentfixture.fixtureID, teamID, date, location FROM tournamentfixture LEFT JOIN fixture 
		ON tournamentfixture.fixtureID = fixture.fixtureID
		AND tournamentfixture.tournamentID = '{$tournamentid}'";
		$res = mysql_query($sql, $this->link) or trigger_error(mysql_error());
		
		$fixtures = array();
		while($row = mysql_fetch_assoc($res))
		{
			$fid = $row['fixtureID'];
			if(!array_key_exists($fid, $fixtures))
			{
				$f = new Fixture($fid, $tournamentid, new Date($row['date']), $row['location']);
				$fixtures[$fid]= $f;
			}
			$fixtures[$fid]->add_team($row['teamID']);
		}
		
		return $fixtures;
	}
	
		/** create a tournament with the given name. (DB) **/
	public function create_fixture($date, $location)
	{
		$sql = "INSERT INTO `tournament` (tournamentName, sportID, typeID, stage) VALUES ('$name', '$sport', '$type', '0')"; // NOW()
		$res = mysql_query($sql, $this->link) or trigger_error(mysql_error());
		return ($res != NULL);
	}
	
	/** debug function to create tournament table. **/
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
		$res = mysql_query($sql) or trigger_error(mysql_error());
	}
	
	/** debug function to insert test rows into tournament table. **/
	protected function create_test_data()
	{
		$sql = "INSERT INTO `user` (`userid`, `username`, `forename`, `surname`, `password`, `role`) VALUES
				(1, 'perry', NULL, 'Perry', '$2y$11$Vr5dPT41hbTGitPRx6Q4XeJP0DM9SkFGipnR9dHXYYeKuQsv8ohu2', 1);";		
		$res = mysql_query($sql) or trigger_error(mysql_error());
	}
}
?>