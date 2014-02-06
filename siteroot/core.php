<?php
require_once('lib/smarty/Smarty.class.php');
/** Autoloads classes so only this file needs to be
	required/included in other scripts. **/
function __autoload($class_name)  
{
    include_once 'lib/class.' . strtolower($class_name) . '.php';  
}
spl_autoload_register("__autoload"); // needed to stop smarty breaking

?>  
