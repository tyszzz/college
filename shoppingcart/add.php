<?
	session_start();
	
	include("connection.php");
	$I_number=$_GET["I_number"];
	$number=$_GET["number"];
	$sql_query ="select * from shoppingcart where b_account='".$_SESSION['account']."'";
	$result=mysql_query($sql_query);
	$row=mysql_fetch_array($result);
	$s_number=$row[1];

	$sql_query ="select * from item where I_number='".$I_number."'";
	$result=mysql_query($sql_query);
	$row=mysql_fetch_array($result);
	$price=$row[2]*$number;
	$sql_query ="insert into cart_and_item values('".$I_number."','".$s_number."','".$row[1]."','".$number."','".$price."')";
	$result=mysql_query($sql_query);
	header('Location:main.php');

?>