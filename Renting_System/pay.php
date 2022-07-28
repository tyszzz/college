<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
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

	$select_db=@mysql_select_db("rent_database");
    if(!$select_db)
    {
        echo"<h1><center>error</h1>";
    }
    else
    {
		
?>
<a href="entered.php?id=<?echo $_COOKIE["id"]?>&pwd=<?echo $_COOKIE["pwd"]?>&cnt=-1">返回</a>
<title>繳費系統</title>
</head>
<body>
		<br>
		<br>
		<div align="center" style="max-height:600px;overflow:auto;">
			<b><font face="標楷體" size="6" color="#0000FF">繳費系統</font></b><br>
			<br>
			<br>
			<table cellspacing="2" cellpadding="0" width="550px" bgcolor="006666">
					<tr>
					<td>
						<table border="0" width="100%" bgcolor="#FFFFFF" cellspacing="2" cellpadding="0">
							<tr>
								<td align=center bgcolor="#C4E1FF" width="100%" height="40"><h2>費用繳交狀態:</h2>
								<?php
									$select_db=@mysql_select_db("rent_database");//選擇資料庫
									if(!$select_db)
									{
										echo'<br>error';
									}
									else
									{		
										$sql_query="select r_number,rentStartTime,rentOverTime,deposit,fee from rent_rcd where r_account='".$_COOKIE["id"]."'";//下sql語法
										$result=mysql_query($sql_query);//執行sql語法，執行完會丟給result
										echo'<table border=1 width=100%>';
										echo'<tr>';
										echo'<td align=center bgcolor="#C4E1FF" height="40">租借開始時間';
										echo'<td align=center bgcolor="#C4E1FF" height="40">租借結束時間';
										echo'<td align=center bgcolor="#C4E1FF" height="40">保證金繳交狀態';
										echo'<td align=center bgcolor="#C4E1FF" height="40">費用繳交狀態';
										
										while($row=mysql_fetch_array($result))
										{
											echo'<tr>';
											echo'<td align=center bgcolor="#C4E1FF" height="40">'.$row[1];
											echo'<td align=center bgcolor="#C4E1FF" height="40">'.$row[2];
											echo'<td align=center bgcolor="#C4E1FF" height="40">';
											if($row[3]==0)
											{
												?>
												<button><a href="payment.php?r_num=<?echo $row[0]?>&d_type=2" style="text-decoration:none;color:black">繳費</a></button>
												<?php
											}
												
											else
												echo'已繳';
											echo'<td align=center bgcolor="#C4E1FF" height="40">';
											if($row[4]==0)
											{
												?>
												<button><a href="payment.php?r_num=<?echo $row[0]?>" style="text-decoration:none;color:black">繳費</a></button>
												<?php
											}
											else
												echo'已繳';		
										}
										echo'</table>';
									}
								?>
						</table>
						
			</table>
			<br>
			
		</div>
		<?php
			$r_account=$_GET["r_acc"];
			$r_pwd=$_GET["r_pwd"];
		
	}?>
</body>

</html>