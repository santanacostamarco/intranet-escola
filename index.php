<?php
	include('header.php');

	$db = connection_checker();
	if ( $db != false ) {
		session_start();
		if (isset($_SESSION["user_id"])){
			header('Location: home.php');
		} else {
			header('Location: login.php');
		}
	}

	include('footer.php');
?>
