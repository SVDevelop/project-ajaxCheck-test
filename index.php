<?php 

$errors = array();
$success = array();
require "config.php";
require "db.php";
require ROOT . "libs/function.php";

session_start();

/* ..........................................

РОУТЕР

............................................. */

$uri =  $_SERVER["REQUEST_URI"];
$uri = rtrim($uri, "/"); 
$uri = filter_var($uri, FILTER_SANITIZE_URL);
$uri = substr($uri, 1);
$uri = explode('?', $uri);

switch ( $uri[0]) {
	case '':
		require ROOT . "modules/main/index.php";
		break;
	//====================== Users ====================	
	case 'login':
		require ROOT . "modules/login/login.php";
		break;
	case 'registration':
		require ROOT . "modules/login/registration.php";
		break;
	case 'logout':
		require ROOT . "modules/login/logout.php";
		break;
	case 'lost-password':
		require ROOT . "modules/login/lost-password.php";
		break;
	case 'set-new-password':
		require ROOT . "modules/login/set-new-password.php";
		break;
	case 'profile':
		require ROOT . "modules/profile/index.php";
		break;
	case 'profile-edit':
		require ROOT . "modules/profile/edit.php";
		break;
	default:
		require ROOT . "modules/main/index.php";
		break;
}

?>