<?php

include_once 'class.Database.php';

$dbdetails = array('default' => array(
    'host' => 'localhost',
    'database' => 'calendar',
    'user' => 'root',
    'password' => ''
));

$_db = Database::Instance('default');