<?
	session_start();
	include("connection.php");
	$address=$_GET['address'];
	$sql_query ="update o_rder set state=1 where state=0";
	mysql_query($sql_query);
	$sql_query ="SELECT max(O_no) FROM o_rder";
	$result=mysql_query($sql_query);
	$row=mysql_fetch_array($result);
	if($row[0]==NULL)
	{
		$O_no=1;
	}
	else
	{
		$O_no=$row[0]+1;
	}
	$sql_query ="select * from shoppingcart where b_account='".$_SESSION['account']."'";
	$result=mysql_query($sql_query);
	$row=mysql_fetch_array($result);
	$s_number=$row[1];
	$sql_query ="select * from cart_and_item where s_number='".$s_number."'";
	$result=mysql_query($sql_query);
	while($row=mysql_fetch_array($result))
	{
		$sql_query2 ="insert into o_rder values('".$O_no."','".$row[0]."','".$row[2]."','".$row[3]."','".$row[4]."','".$_SESSION['account']."',0,'".$address."') ";
		mysql_query($sql_query2);
	}
	$sql_query ="TRUNCATE TABLE cart_and_item";
	mysql_query($sql_query);
	header('Location:main.php');
?>