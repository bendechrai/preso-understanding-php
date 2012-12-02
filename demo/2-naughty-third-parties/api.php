<?php

session_start();

$task = trim($_SERVER['PATH_INFO'],'/');

switch($task) {
	case 'login':
		$_SESSION['logged_in'] = true;
		$_SESSION['cart'] = array();
		$_SESSION['address'] = '';
		break;
	case 'logout';
		session_destroy();
		break;
	case 'addToCart':
		if( isset($_SESSION['logged_in']) ) {
			$_SESSION['cart'][] = 'item'.mt_rand(1,255);
		}
		break;
	case 'setAddress':
		if( isset($_SESSION['logged_in']) ) {
			parse_str( $_SERVER['QUERY_STRING'], $params );
			$_SESSION['address'] = $params['address'];
		}
		break;
	case 'payment':
		if( isset($_SESSION['logged_in']) ) {
			echo json_encode( array(
				'orderid' => mt_rand(1234,12345),
				'products' => $_SESSION['cart'],
				'delivery' => $_SESSION['address']
			));
			$_SESSION['cart'] = array();
		}
		break;
}
