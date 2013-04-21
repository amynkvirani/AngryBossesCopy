<?php
$db_server		='localhost';
$db_username	='root';
$db_database	='angry_bosses';
$connection=mysql_connect($db_server,$db_username) or die ('Could not connect to server!');
mysql_select_db($db_database,$connection) or die ('Database not found!');
?>