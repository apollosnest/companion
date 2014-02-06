<?php
require("core.php");
/** the following will autoload lib/class.user.php **/
$acc = new Account;
if($acc->authenticate('perry', '@pollo')) echo "success"; else echo "failure";
$acc->user_from_id(1)->quick_dump();
?>
