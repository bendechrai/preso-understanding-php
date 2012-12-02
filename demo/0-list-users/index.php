<?php

error_reporting(E_ALL);
ini_set('display_errors',1);

$db = new PDO('mysql:host=localhost;dbname=understanding', 'root', 'root');

$sth = $db->prepare( 'SELECT * FROM user ORDER BY id DESC' );
$sth->execute();
$users = $sth->fetchAll( PDO::FETCH_ASSOC );
$sth->closeCursor();
?>
<table>
	<thead>
		<tr>
			<th>Username</th>
			<th>Password</th>
			<th>Admin</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach( $users as $user ): ?>
		<tr>
			<td><?php echo htmlspecialchars( $user['username'] ) ?></td>
			<td><?php echo htmlspecialchars( $user['password'] ) ?></td>
			<td><?php echo htmlspecialchars( $user['admin'] ) ?></td>
		</tr>
		<?php endforeach; ?>
	</tbody>
</table>
<script>
setTimeout( function() { location.reload() }, 1000 );
</script>
