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
		$BBQSiteNumber=$_GET["N_bbq"];
		$numberOfRenters=$_GET["N_ppl"];
		$rentStartTime=$_GET["B_time"];
		$rentOverTime=$_GET["E_time"];
		$applyDate=$_GET["R_date"];
		$r_account=$_GET["r_acc"];
		$r_pwd=$_GET["r_pwd"];
		$rnu=$_GET["number"];
		$sitenumber=$_GET["sitenumber"];
		$sql_query="select * from rent_rcd";
		$result=mysql_query($sql_query);
		$r_number=mysql_num_rows($result)+1;
		$price=$BBQSiteNumber*300;
		if($rnu<=0){
			$sql_query="select * from rent_rcd where rentStartTime>='".str_replace('-','',$applyDate).str_replace(':','',$rentStartTime)."00' and  rentStartTime<='".str_replace('-','',$applyDate).str_replace(':','',$rentOverTime)."00'";
			$result=mysql_query($sql_query);
			while($row = mysql_fetch_array($result))
			{
				if($temp==1)
					{
						break;
					}
				if(mysql_num_rows($result)!=0 and $row[8]!=0)
				{
					$sql_query2="select * from rent_rcd_and_site where r_number='".$row[0]."'";
					$result2=mysql_query($sql_query2);
					while($row2=mysql_fetch_array($result2))
					{
						if($temp==1)
						{
							break;
						}
						if(isset($_GET['BBQ']))//get會更改網址的值，post的不會
						{
							foreach($_GET['BBQ']as$key=>$value)
							{
						
								if($row2[1]==$value)
								{
									?><center>
									<?
									echo "此時段已有人使用";
									$temp=1;
									?>
									<meta http-equiv="refresh" content="10; url=bbqrent.php?r_acc=<?echo $r_account?>">
									<h5>網頁將在10秒跳租借畫面</h5> 
									<img src="22128.gif" width=200px hight=200px>
									</center>
									<?
									break;
								}
							}
						}
					}		
				}
			}
			$sql_query="select * from rent_rcd where rentStartTime<='".str_replace('-','',$applyDate).str_replace(':','',$rentStartTime)."00' and  rentOverTime>='".str_replace('-','',$applyDate).str_replace(':','',$rentStartTime)."00'";
			$result=mysql_query($sql_query);
			while($row = mysql_fetch_array($result))
			{
				if($temp==1)
					{
						break;
					}
				if(mysql_num_rows($result)!=0 and $row[8]!=0)
				{
					$sql_query2="select * from rent_rcd_and_site where r_number='".$row[0]."'";
					$result2=mysql_query($sql_query2);
					while($row2=mysql_fetch_array($result2))
					{
						if($temp==1)
						{
							break;
						}
						if(isset($_GET['BBQ']))//get會更改網址的值，post的不會
						{
							foreach($_GET['BBQ']as$key=>$value)
							{
						
								if($row2[1]==$value)
								{
									?><center>
									<?
									echo "此時段已有人使用";
									$temp=1;
									?>
									<meta http-equiv="refresh" content="10; url=bbqrent.php?r_acc=<?echo $r_account?>">
									<h5>網頁將在10秒跳租借畫面</h5> 
									<img src="22128.gif" width=200px hight=200px>
									</center>
									<?
									break;
								}
							}
						}
					}		
				}
			}}
			if($rnu>0)
			{
				$sql_query="select * from rent_rcd where rentStartTime>='".str_replace('-','',$applyDate).str_replace(':','',$rentStartTime)."00' and  rentStartTime<='".str_replace('-','',$applyDate).str_replace(':','',$rentOverTime)."00' and r_number!='".$rnu."'";
			$result=mysql_query($sql_query);
			while($row = mysql_fetch_array($result))
			{
				if($temp==1)
					{
						break;
					}
				if(mysql_num_rows($result)!=0 and $row[8]!=0)
				{
					$sql_query2="select * from rent_rcd_and_site where r_number='".$row[0]."'";
					$result2=mysql_query($sql_query2);
					while($row2=mysql_fetch_array($result2))
					{
						if($temp==1)
						{
							break;
						}
						if(isset($_GET['BBQ']))//get會更改網址的值，post的不會
						{
							foreach($_GET['BBQ']as$key=>$value)
							{
						
								if($row2[1]==$value)
								{
									?><center>
									<?
									echo "此時段已有人使用";
									$temp=1;
									?>
									<meta http-equiv="refresh" content="10; url=bbqrent.php?r_acc=<?echo $r_account?>">
									<h5>網頁將在10秒跳租借畫面</h5> 
									<img src="22128.gif" width=200px hight=200px>
									</center>
									<?
									break;
								}
							}
						}
					}		
				}
			}
			$sql_query="select * from rent_rcd where rentStartTime<='".str_replace('-','',$applyDate).str_replace(':','',$rentStartTime)."00' and  rentOverTime>='".str_replace('-','',$applyDate).str_replace(':','',$rentOverTime)."00' and r_number!='".$rnu."'";
			$result=mysql_query($sql_query);
			while($row = mysql_fetch_array($result))
			{
				if($temp==1)
					{
						break;
					}
				if(mysql_num_rows($result)!=0 and $row[8]!=0)
				{
					$sql_query2="select * from rent_rcd_and_site where r_number='".$row[0]."'";
					$result2=mysql_query($sql_query2);
					while($row2=mysql_fetch_array($result2))
					{
						if($temp==1)
						{
							break;
						}
						if(isset($_GET['BBQ']))//get會更改網址的值，post的不會
						{
							foreach($_GET['BBQ']as$key=>$value)
							{
						
								if($row2[1]==$value)
								{
									?><center>
									<?
									echo "此時段已有人使用";
									$temp=1;
									?>
									<meta http-equiv="refresh" content="10; url=bbqrent.php?r_acc=<?echo $r_account?>">
									<h5>網頁將在10秒跳租借畫面</h5> 
									<img src="22128.gif" width=200px hight=200px>
									</center>
									<?
									break;
								}
							}
						}
					}		
				}
			}
				for($i;$i<$sitenumber;$i++)
				{
					$sql_query="DELETE FROM rent_rcd_and_site WHERE r_number='".$rnu."'";
					mysql_query($sql_query);
				}
				$sql_query="update rent_rcd set numberOfRenters='".$numberOfRenters."',rentstarttime='".str_replace('-','',$applyDate).str_replace(':','',$rentStartTime)."00',rentovertime='".str_replace('-','',$applyDate).str_replace(':','',$rentOverTime)."00',applydate=CURRENT_TIMESTAMP,bbqsitenumber='".$BBQSiteNumber."' where r_number='".$rnu."'";
				mysql_query($sql_query);
				if(isset($_GET['BBQ']))//get會更改網址的值，post的不會
				{
					foreach($_GET['BBQ']as$key=>$value)
					{
						$sql_query="insert into rent_rcd_and_site values('".$rnu."','".$value."')";
						mysql_query($sql_query);
					}
				}
				$sql_query="select * from bill";
				$result=mysql_query($sql_query);
				$b_number=mysql_num_rows($result)+1;
				$sql_query="update bill set price='".$price."'where r_number='".$rnu."'";
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
			<a href="adminBBQ.php?id=<?echo $r_account?>&?pwd=<?echo $r_pwd?>&cnt=-1">返回</a>
		<?
		
		}
		else if($temp==0)
		{
			$sql_query="update rent_rcd set numberOfRenters='".$numberOfRenters."',rentstarttime='".str_replace('-','',$applyDate).str_replace(':','',$rentStartTime)."00',rentovertime='".str_replace('-','',$applyDate).str_replace(':','',$rentOverTime)."00',applydate=CURRENT_TIMESTAMP,bbqsitenumber='".$BBQSiteNumber."' where r_number='".$rnu."'";
			mysql_query($sql_query);
			if(isset($_GET['BBQ']))//get會更改網址的值，post的不會
			{
				foreach($_GET['BBQ']as$key=>$value)
				{
					
					$sql_query="insert into rent_rcd_and_site values('".$r_number."','".$value."')";
					mysql_query($sql_query);
				}
			}
			$sql_query="select * from bill";
			$result=mysql_query($sql_query);
			$b_number=mysql_num_rows($result)+1;
			$sql_query="update bill set price='".$price."'where r_number='".$rnu."'";
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
			<a href="adminBBQ.php?id=<?echo $r_account?>&?pwd=<?echo $r_pwd?>&cnt=-1">返回</a><br>
		<?
		
		}
		?>
		</div>
	</body>

</html>