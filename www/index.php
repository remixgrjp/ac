<?php
define('BASE', '/var/www/cgi-bin/ac/radiko/ac');
require_once BASE.'/app/Ac_Controller.php';

Ac_Controller::main('Ac_Controller', 'index');
?>
