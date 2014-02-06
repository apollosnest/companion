<?php
/** Autoloads classes so only this file needs to be
	required/included in other scripts. **/
function __autoload($class_name)  
{  
    include_once 'lib/class.' . strtolower($class_name) . '.php';  
}

?>  
