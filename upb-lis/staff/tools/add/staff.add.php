<?php

	include 'functions.php';
	require 'config.php';

	$uid = $_POST['uid'];
	$first = $_POST['first'];
	$last = $_POST['last'];
	$pwd = $_POST['pwd'];

	// for staff:
		$info = [
			"staff_username" => $uid,
			"staff_firstname" => $first,
			"staff_lastname" => $last,
			"staff_password" => $pwd
		];
		add($conn, "STAFF", $info);

	header("Location: ../upb-lis/functions.php?add_staff=success");
?>

