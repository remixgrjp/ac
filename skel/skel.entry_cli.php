<?php
/**	ＵＴＦ８
*	{$action_name}.php
*
*	@author	 {$author}
*	@package	Ac
*	@version	$Id$
*/
chdir(dirname(__FILE__));
require_once '{$dir_app}/Ac_Controller.php';

ini_set('max_execution_time', 0);

Ac_Controller::main_CLI('Ac_Controller', '{$action_name}');
?>
