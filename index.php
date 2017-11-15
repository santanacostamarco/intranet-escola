<?php include('header.php'); 

	$db = connection_checker();
	if ( $db != false ) {
		header('Location: login.php');
	}
	
include('footer.php'); ?>
