<?php
	include("connection.php");
	$I_name=$_GET['I_name'];
	$sql_query="DELETE FROM cart_and_item where I_name='".$I_name."'";
	mysql_query($sql_query);
	header('Location:cart.php');
	
?>