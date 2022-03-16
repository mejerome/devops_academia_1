<?php

$dbhost = 'localhost';
$dbuser = 'admin';
$dbpass = 'password';
$dbname = 'test';

$conn = mysql_connect($dbhost, $dbuser, $dbpass, $dbname) or die('Error connecting to mysql');

?>