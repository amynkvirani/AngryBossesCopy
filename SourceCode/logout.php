<?php
include('./sessions.php');
if (isset($_POST['logout'])){
	logout();
	$status=logged_in();
	echo !$status;
	}
?>