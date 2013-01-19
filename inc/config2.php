<?php
/**
 * Krijome lidhje ne databazen
 */
define('HOST', 'localhost');
define('USER', 'root');
define('PASS', '');
define('DB', 'farmacia');

$db = mysql_connect( HOST, USER, PASS ) or die('Cannot Connect');
		mysql_select_db( DB );

// Fillojme sesionin
session_start();

define('SITENAME' , 'Farmaci'); 
define('BASEURL', 'http://localhost/ervin1');
?>