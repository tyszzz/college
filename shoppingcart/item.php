<html>
	<head>
		<title>購物車</title>
	</head>
	<body bgcolor=orange>
		<?php
		session_start();
			include("connection.php");
			$flag=$_GET['loginornot'];//flag用來判斷有無登入
			echo $flag;
			$I_number=$_GET['I_number'];
			$type=$_GET['type'];
			$sql_query ="select * from item where type='".$type."' order by I_number";
			$result=mysql_query($sql_query);
			echo '<center><table width=100% border=0>';
			$cnt=0;
			if(mysql_num_rows($result)!=1)//有套餐
			{
				echo "<tr align=center><td colspan=3><font size=7 face='標楷體' color=blue>請選擇你要的餐點及數量</font><br><br><br>";
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
				<form method="get" action="add.php">
				<select name="I_number"> 
					<?
					while($row=mysql_fetch_array($result))
					{
						echo "<option value=".$row[0]." selected><font size=6 face='標楷體'>".$row[1]."  NTD".$row[2]."</font></option>";
					}
					$sql_query ="select * from item where type='".$type."' order by I_number";
					?>
				</select>
					<font size=6 face='標楷體' color=blue >數量</font>
					<input type=text name="number" size=3 required="required">
					<input type=hidden name="loginornot" value="<?echo $flag?>">
					<input type=submit value="加入購物車">
				</form>
				<tr align=right>
				<td colspan=3><a href=main.php><font size=5 face='標楷體' color=blue>返回</font></a>
			
			<?}
			else//沒有套餐
			{
				$row=mysql_fetch_array($result);
				echo "<tr align=center><td><font size=7 face='標楷體' color=blue>請選擇你要的餐點的數量</font>";
				echo '<tr><td width=20%><center><img src='.$row[3].' width=200 hight=200><br>';
				echo "<font size=5 face='標楷體' color=blue>".$row[1]."  NTD_".$row[2]."</font>";
				?>
				<tr align=right>
				<td colspan=3>
				<form method="GET" action="add.php">
					<font size=6 face='標楷體' color=blue>數量</font>
					<input type=text name='number' size=3 required="required">
					<input type=hidden name="loginornot" value="<?echo $flag?>">
					<input type=submit value="加入購物車">
					<input type=hidden value=<?echo $I_number?> name="I_number">
				</form>
				<tr align=right>
				<td colspan=3><a href=main.php><font size=5 face='標楷體' color=blue>返回</font></a>
			<?}?>
		
	</body>
</html>