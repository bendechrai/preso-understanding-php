<?php
session_start();
?>
<html>
<head>
	<script src="jquery-1.8.1.min.js" type="text/javascript"></script>
	<script type="text/javascript"><!--
		$(document).ready( function() {
			$('a.ajax').bind('click', function(a){
				a.originalEvent.preventDefault();
				$.ajax({
					url: a.currentTarget.href
				}).done(function( data ) { 
					if( data != '' ) {
						alert(data);
					}
					location.href = location.href;
				});
			});
		});
	// --></script>
</head>
<body>
<h1>Awesome shopping site</h1>
Session:
<pre><?php print_r($_SESSION); ?></pre>
<ul>
	<li><a href="good.php">refresh</a></li>
	<li><a href="api/login" class="ajax">login</a></li>
	<li><a href="api/logout" class="ajax">logout</a></li>
	<li><a href="api/addToCart" class="ajax">add something to the cart</a></li>
	<li><a href="api/setAddress?address=My+Real+Address" class="ajax">set address</a></li>
	<li><a href="api/payment" class="ajax">pay</a></li>
</ul>
