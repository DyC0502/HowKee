<?php 
	include '../_base.php';
	
	$userID = $_SESSION['userId'];
	$status = "Offline now";

	date_default_timezone_set("Asia/Kuala_Lumpur");
	$dateTimeNow = date("Y-m-d H:i");

	$stm = $db->prepare("UPDATE user SET status = :status, lastOnline = :lastOnline WHERE userId = :userId");
	$stm->execute([':status' => $status, ':lastOnline' => $dateTimeNow, ':userId' => $userID]);


	session_unset();
	session_destroy();

	setcookie('id', '', time() - 60*60*24*30, '/'); 
	setcookie('sess', '', time() - 60*60*24*30, '/');
	session_start();
    temp('info', 'Logout Successful');
	
    redirect('/');
	die();
?>