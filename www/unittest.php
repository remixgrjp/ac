<?php
error_reporting(E_ALL);
require_once dirname(__FILE__) . '/../app/Ac_Controller.php';

Ac_Controller::main('Ac_Controller', array(
    '__ethna_unittest__',
    )
);
?>
