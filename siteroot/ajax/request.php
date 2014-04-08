<?php
require('../core.php');
$scheduler = new Scheduler;
$teams = new Teams;

function class2json($object)
{
	return json_encode(get_object_vars($object));	
}

function error2json($msg)
{
	return json_encode("Error: " . $msg);	
}

if(isset($_GET['for']))
{
	switch($_GET['for'])
	{
		case 'tournament':
			$tid = $_GET['tournamentid'];
			if(isset($tid))
			{
				$t = $scheduler->tournament_from_id($tid);
				echo json_encode(get_object_vars($t));
			} else { echo error2json("tournamentid not set."); }
		break;
		case 'fixtures':
			if(isset($_GET['tournamentid']))
			{
				$tid = $_GET['tournamentid'];
				$fixtures = $scheduler->fixtures_for_tournament($tid);
				echo json_encode($fixtures);
			} else { echo error2json("fixtureid not set."); }
		case 'team':
			if(isset($_GET['teamid']))
			{
				$tid = $_GET['teamid'];
				echo class2json($teams->team_from_id($tid));
			} else { echo error2json("teamid not set."); }
		break;
	}
}
?>