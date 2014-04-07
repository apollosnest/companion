<?php
require_once('core.php');
$acc = new Account;
$user = $acc->user_from_id(1);

// scheduler testing
$scheduler = new Scheduler;
//$scheduler->create_tournament('Apollo Ping Pong');
$t = $scheduler->tournament_from_id(1);

$smarty->assign('user', $user);

$latest_tournaments = $smarty->fetch('template/table/tournaments.html');

$fixtures = array(new Fixture(1, array('Red', 'Blue'), new Date('+1 day'), 'Blood Gulch'));
$smarty->assign('fixtures', $fixtures);
$latest_fixtures = $smarty->fetch('template/table/fixtures.html');


$latest_results = $smarty->fetch('template/table/results.html');

$smarty->assign('content', join_templates($latest_tournaments, $latest_fixtures, $latest_results));
$smarty->display('template/index.html');
?>