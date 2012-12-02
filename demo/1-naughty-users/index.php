<?php

session_start();

if( isset($_POST['action']) ) {

	$db = new PDO('mysql:host=localhost;dbname=understanding', 'root', 'root');

	switch( $_POST['action'] ) {
		case 'join':
			$sql = "INSERT INTO user (username, password, admin) VALUES ('{$_POST['username']}', '{$_POST['password']}', 0)";
			$db->exec($sql);
			break;
		case 'login':
			$sql = "SELECT * FROM user WHERE username='{$_POST['username']}' AND password='{$_POST['password']}' LIMIT 1";
			echo $sql;
			$results = $db->query($sql, PDO::FETCH_ASSOC);
			foreach( $results as $row ) {
				$user = $row;
			}
			
			break;
	}
}

?><html>
<body>

<h1>Naughty Users</h1>

<?php if( isset($user) ) : ?>
	<p>Hello <?php echo $user['username'] ?>. You are <?php if( !$user['admin'] ) echo 'not' ?> an admin.</p>
<?php endif; ?>

<h2>Create Account</h2>
<form action="index.php" method="post">
	<input type="hidden" name="action" value="join"/>
	<div>Username <input type="text" name="username" value="<?php echo @$_POST['username'] ?>"/></div>
	<div>Password <input type="text" name="password" value="<?php echo @$_POST['password'] ?>"/></div>
	<div><input type="submit"/></div>
</form>

<h2>Login Account</h2>
<form action="index.php" method="post">
	<input type="hidden" name="action" value="login"/>
	<div>Username <input type="text" name="username" value="<?php echo @$_POST['username'] ?>"/></div>
	<div>Password <input type="text" name="password" value="<?php echo @$_POST['password'] ?>"/></div>
	<div><input type="submit"/></div>
</form>

</body>
</html>
