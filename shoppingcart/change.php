<body bgcolor=orange>
<?php
	session_start();
	include("connection.php");
	$I_number=$_GET['I_num'];
	$sql_query="select * from item where I_number='".$I_number."'";
	$result=mysql_query($sql_query);
	$row=mysql_fetch_array($result);
	$type=$row[4];
	$sql_query ="select * from item where type='".$type."' order by I_number";
	$result=mysql_query($sql_query);
	echo '<center><table width=100% border=0>';
	$cnt=0;
	if(mysql_num_rows($result)!=1)//有套餐
	{
		echo "<tr align=center><td colspan=3><font size=7 face='標楷體' color=blue>請選擇你要變更的餐點及數量</font><br><br><br>";
		while($row=mysql_fetch_array($result))
		{
			if($cnt%3==0){echo'<tr>';}
			$cnt++;
			echo'<td width=20%><center><img src='.$row[3].' width=200 hight=200><br>';
			echo "<font size=5 face='標楷體' color=blue>".$row[1]."  NT$".$row[2]."</font>";
		}
		$sql_query ="select * from item where type='".$type."' order by I_number";
		$result=mysql_query($sql_query);
		?>
		<tr align=right>
		<td colspan=3>
		<form method="get" action="changed.php">
		<select name="I_numb"> 
		<?
		while($row=mysql_fetch_array($result))
		{
			echo "<option value=".$row[0]." selected><font size=6 face='標楷體'>".$row[1]."  NTD".$row[2]."</font></option>";
		}
		$sql_query ="select * from item where type='".$type."' order by I_number";
		?>
		</select>
			<font size=6 face='標楷體' color=blue >數量</font>
			<input type=text name="numb" size=3 required="required">
			<input type=submit value="變更訂單">
			<input type=hidden name="I_temp" value=<?echo $I_number?>>
		</form>
		<tr align=right>
			<td colspan=3><a href=cart.php><font size=5 face='標楷體' color=blue>返回</font></a>
			
		<?
	}
	else//沒有套餐
	{
		$row=mysql_fetch_array($result);
		echo "<tr align=center><td><font size=7 face='標楷體' color=blue>請選擇你要變更的餐點及數量</font>";
		echo '<tr><td width=20%><center><img src='.$row[3].' width=200 hight=200><br>';
		echo "<font size=5 face='標楷體' color=blue>".$row[1]."  NTD_".$row[2]."</font>";
		?>
		<tr align=right>
		<td colspan=3>
		<form method="GET" action="changed.php">
			<font size=6 face='標楷體' color=blue>數量</font>
			<input type=text name='numb' size=3 required="required">
			<input type=submit value="變更訂單">
			<input type=hidden name="I_numb" value=<?echo $row[0]?>>
			<input type=hidden name="I_temp" value=<?echo $I_number?>>
		</form>
		<tr align=right>
		<td colspan=3><a href=cart.php><font size=5 face='標楷體' color=blue>返回</font></a>
		<?
	}
	//header('Location:item.php');
?>
</body>