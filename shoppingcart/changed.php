<?php
	session_start();
	include("connection.php");
	$I_number=$_GET["I_numb"];
	$number=$_GET["numb"];
	$temp=$_GET["I_temp"];
	$sql_query ="select * from shoppingcart where b_account='".$_SESSION['account']."'";
	$result=mysql_query($sql_query);
	$row=mysql_fetch_array($result);
	$s_number=$row[1];
	$sql_query ="select * from item where I_number='".$I_number."'";
	$result=mysql_query($sql_query);
	$row=mysql_fetch_array($result);
	$price=$row[2]*$number;
	$sql_query ="update cart_and_item set I_number='".$I_number."',I_name='".$row[1]."',number='".$number."',price='".$price."' where I_number='".$temp."' and s_number='".$s_number."'";
	mysql_query($sql_query);
	header('Location:cart.php');


?>