<?php
require('../core.php');
$scheduler = new Scheduler;
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
			} else { echo "error 1"; }
		break;
		case 'fixture':
			if(isset($_GET['fixtureid']))
			{
				$fid = $_GET['fixtureid'];
				echo json_encode("not implemented");
			} else { echo "error, fixtureid not set"; }
	}
}
?>