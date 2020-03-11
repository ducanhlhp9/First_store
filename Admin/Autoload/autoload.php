<?php
	session_start();
	require_once __DIR__. "/../../libraries/Database.php"; 
	require_once __DIR__. "/../../libraries/function.php"; 
	$db = new Database;

	if( ! isset($_SESSION['admin_id']))
	  {
	    header("location:/PHP/login/");
	  }

	define("ROOT",$_SERVER['DOCUMENT_ROOT'] ."/php/Public/uploads/");
?>
