<?php
$hostname='localhost';
$dbname='saidb';
$username='root';
$password='';
$db=mysql_connect($hostname,$username,$password) or die('connection to host failed,perhap the service is down!');
mysql_select_db($dbname,$db) or DIE(mysql_error($dbname));
?>
