<?php 
if ( isLoggedIn() ) {
	header("Location: ". HOST."profile");
	exit();
} else {
	header("Location: ". HOST."login");
	exit();
}
?>