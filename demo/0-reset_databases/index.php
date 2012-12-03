<?php

if( isset($_POST['submit']) ) {

	error_reporting(E_ALL);
	ini_set('display_errors',1);

	$db = new PDO('mysql:host=localhost;dbname=understanding', 'root', 'root');

	$db->exec("DROP  TABLE user");
	$db->exec("CREATE TABLE user (
		id integer primary key auto_increment,
		username text,
		password text,
		admin integer
	)");

	$db->exec("INSERT INTO user (username, password, admin) VALUES ('ben', 'password', 0)");
	$db->exec("INSERT INTO user (username, password, admin) VALUES ('administrator', 'complex', 1)");

}
?>
<form action="#" method="post"><input type="submit" name="submit" value="Reset Databases"/></form>
