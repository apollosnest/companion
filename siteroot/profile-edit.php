<?php
session_start();

if (!isset($_SESSION['user'])) {
	header("Location: login.php");
	die();
}

require_once('core.php');
$acc = new Account;
$user = $acc->user_from_id(1);
$smarty->assign('user', $user);
$smarty->assign('name', $_SESSION['user']['displayname']);

$scheduler = new Scheduler;
$t = $scheduler->tournament_from_id(1);


//$smarty->assign('content', join_templates($latest_tournaments, $latest_fixtures, $latest_results));
$smarty->display('template/profile-edit.html');
?>