<?php
require("core.php");

$smarty = new Smarty;
//$smarty->force_compile = true;
$smarty->debugging = true;
$smarty->caching = true;
$smarty->cache_lifetime = 120;

// account testing
$acc = new Account;
//if($acc->authenticate('perry', '@pollo')) echo "success"; else echo "failure";
$user = $acc->user_from_id(1);

// scheduler testing
$scheduler = new Scheduler;
//$scheduler->create_tournament('Apollo Ping Pong');
$t = $scheduler->tournament_from_id(1);

$smarty->assign('content', "Hello {$user->Username}");
$smarty->display('template/main.html');

?>
