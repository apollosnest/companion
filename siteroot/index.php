<?php
require_once("core.php");
// account testing
$acc = new Account;
//if($acc->authenticate('perry', '@pollo')) echo "success"; else echo "failure";
$user = $acc->user_from_id(1);

// scheduler testing
$scheduler = new Scheduler;
//$scheduler->create_tournament('Apollo Ping Pong');
$t = $scheduler->tournament_from_id(1);

$smarty->assign('user', $user);

$homepage = $smarty->fetch('template/home.html');

$smarty->assign('content', $homepage);
$smarty->display('template/index.html');

?>
