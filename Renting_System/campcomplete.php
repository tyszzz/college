<html>
	<head>
		<title>烤肉區租借</title>
		<?php
		//連結資料庫
		$location="localhost"; //連到本機
		$account="root";
		$password="12345678";
		if(isset($location) && isset($account) && isset($password)){
			$link=mysql_pconnect($location,$account,$password);
			mysql_query("SET NAMES 'utf8'");
			if(!$link){
				echo"<h1><center>error</h1>";
				exit();
			}
		}
		
		?>
	</head>
	<body>
		<div align="center" style="max-height:700px;overflow:auto;">
		<?
		$temp=0;//0沒人借，1有人借
		$cnt=0;//露營區數量
		$rentStartTime=$_GET["B_date"];
		$rentOverTime=$_GET["E_date"];
		$r_account=$_GET["r_acc"];
		$r_pwd=$_GET["r_pwd"];
		$sql_query="select * from rent_rcd";
		$result=mysql_query($sql_query);
		while($row = mysql_fetch_array($result))
		{
			$r_number=$row[0]+1;
		}
		$sql_query="select * from rent_rcd where rentStartTime>='".str_replace('-','',$rentStartTime)."'170000 and rentStartTime<='".str_replace('-','',$rentOverTime)."'090000";
		$result=mysql_query($sql_query);
		while($row = mysql_fetch_array($result))
		{
			if($temp==1)
				{
					break;
				}
			if(mysql_num_rows($result)!=0 and $row[9]!=0)
			{
				$sql_query2="select * from rent_rcd_and_site where r_number='".$row[0]."'";
				$result2=mysql_query($sql_query2);
				while($row2=mysql_fetch_array($result2))
				{
					if($temp==1)
					{
						break;
					}
					if(isset($_GET['camp']))//get會更改網址的值，post的不會
					{
						foreach($_GET['camp']as$key=>$value)
						{
					
							if($row2[1]==$value)
							{
								?><center>
								<?
								echo "此時段已有人使用";
								$temp=1;
								?>
								<meta http-equiv="refresh" content="10; url=entered.php?id=<?echo $r_account?>&?pwd=<?echo $r_pwd?>&cnt=-1">
								<h5>網頁將在10秒跳系統畫面<br>若不想等待，請<a href="entered.php?id=<?echo $r_account?>&?pwd=<?echo $r_pwd?>&cnt=-1">點擊此</a></h5> 
								<img src="\database\pic\22128.gif" width=200px hight=200px>
								</center>
								<?
								break;
							}
						}
					}
				}		
			}
		}
		$sql_query="select * from rent_rcd where rentStartTime<='".str_replace('-','',$rentStartTime)."'170000 and rentOverTime>='".str_replace('-','',$rentStartTime)."'170000";
		$result=mysql_query($sql_query);
		while($row = mysql_fetch_array($result))
		{
			if($temp==1)
				{
					break;
				}
			if(mysql_num_rows($result)!=0 and $row[9]!=0)
			{
				$sql_query2="select * from rent_rcd_and_site where r_number='".$row[0]."'";
				$result2=mysql_query($sql_query2);
				while($row2=mysql_fetch_array($result2))
				{
					if($temp==1)
					{
						break;
					}
					if(isset($_GET['camp']))//get會更改網址的值，post的不會
					{
						foreach($_GET['camp']as$key=>$value)
						{
					
							if($row2[1]==$value)
							{
								?><center>
								<?
								echo "此時段已有人使用";
								$temp=1;
								?>
								<meta http-equiv="refresh" content="10; url=entered.php?id=<?echo $r_account?>&?pwd=<?echo $r_pwd?>&cnt=-1">
								<h5>網頁將在10秒跳系統畫面<br>若不想等待，請<a href="entered.php?id=<?echo $r_account?>&?pwd=<?echo $r_pwd?>&cnt=-1">點擊此</a></h5> 
								<img src="\database\pic\22128.gif" width=200px hight=200px>
								</center>
								<?
								break;
							}
						}
					}
				}		
			}
		}
		if($temp==0)
		{
			if(isset($_GET['camp']))//get會更改網址的值，post的不會
			{
				foreach($_GET['camp']as$key=>$value)
				{
					$cnt++;
				}
			}
			$price=$cnt*500;
			$sql_query="select * from bill";
			$result=mysql_query($sql_query);
			while($row = mysql_fetch_array($result))
			{
				$b_number=$row[0]+1;
			}
			$sql_query="insert into rent_rcd values('".$r_number."','".$numberOfRenters."','".str_replace('-','',$rentStartTime)."170000','".str_replace('-','',$rentOverTime)."090000',CURRENT_TIMESTAMP,'0','0','0','0','".$cnt."','".$r_account."')";
			mysql_query($sql_query);
			if(isset($_GET['camp']))//get會更改網址的值，post的不會
			{
				foreach($_GET['camp']as$key=>$value)
				{
					$sql_query="insert into rent_rcd_and_site values('".$r_number."','".$value."')";
					mysql_query($sql_query);
				}
			}
			
			$sql_query="insert into bill values('".$b_number."','".$r_number."','".$price."')";
			mysql_query($sql_query);
		?>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>		
			<b><font face="標楷體" size="8" color="#0000FF">租 借 成 功 ！</font></b> <br>
			<a href="entered.php?id=<?echo $r_account?>&?pwd=<?echo $r_pwd?>">返回</a><br>
			<a href="download.php?no=<?echo $b_number?>">下載</a>繳費單
		<?
		}
		?>
		</div>
	</body>

</html>