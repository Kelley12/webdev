<?php 
$config = array(
	'host'		=> 'us-cdbr-east-04.cleardb.com',
	'username' 	=> 'b1e7a4e9a70259',
	'password' 	=> '5c382a86',
	'dbname' 	=> 'heroku_90331fcecc40268'
);

$db = new PDO('mysql:host=' . $config['host'] . ';dbname=' . $config['dbname'], $config['username'], $config['password']);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);