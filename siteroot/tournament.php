<?php
require_once('core.php');
$acc = new Account;
$user = $acc->user_from_id(1);
$smarty->assign('user', $user);


$scheduler = new Scheduler;
$t = $scheduler->tournament_from_id(1);


//$smarty->assign('content', join_templates($latest_tournaments, $latest_fixtures, $latest_results));
$smarty->display('template/tournaments.html');
?>