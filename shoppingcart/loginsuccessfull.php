<?php
	session_start();
	$_SESSION['account']=$_GET['account'];
	$_SESSION['pwd']=$_GET['pwd'];
	$_SESSION['login']=$_GET['login'];
	header('Location:home.php');

?>