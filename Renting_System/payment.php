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
?><title>繳交費用</title>
</head>
<body>
		<br>
		<br>
		<div align="center" style="max-height:600px;overflow:auto;">
			<b><font face="標楷體" size="6" color="#0000FF">繳交費用</font></b><br>
			<br>
			<br>
			<table cellspacing="2" cellpadding="0" width="550px" bgcolor="006666">
					<tr>
					<td>
					<form method="get" action="paycomplete.php">
						<div align="center" style="max-height:400px;overflow:auto;">
						<table border="0" width="100%" bgcolor="#FFFFFF" cellspacing="2" cellpadding="0">
								<?php
									$select_db=@mysql_select_db("rent_database");//選擇資料庫
									if(!$select_db)
									{
										echo'<br>error';
									}
									else
									{		
										$sql_query="select rentStartTime,rentOverTime,deposit,fee from rent_rcd where r_account='".$_COOKIE["id"]."'";//下sql語法
										$result=mysql_query($sql_query);//執行sql語法，執行完會丟給result
										$r_num=$_GET["r_num"];
										$d_type=$_GET["d_type"];
										$f_type=$_GET["f_type"];
										setcookie("r_num",$r_num);
										echo'
										<table border="0" width="100%" bgcolor="#FFFFFF" cellspacing="2" cellpadding="0">
											<tr>';
											
											
											if($d_type==2)
											{
												?>
												<td align=center bgcolor="#C4E1FF" width="45%" height="40">保證金：
												<td align=center width="55%"><input type=number name="deposit" size=20>
												<?php
											}
											else
											{
												?>
												<tr>
												<td align=center bgcolor="#C4E1FF" height="40">租借費用：
												<td align=center><input type=number name="fee" size=20>
												<?php
											}
											?>
										</table>
										
										<tr>
										<td align=center>
										<table border="0" width="100%" bgcolor="#FFFFFF" cellspacing="2" cellpadding="0">
											<tr>
											<td align=center height=35>
										<p><input type="submit" value="繳      交">
										<input type="reset" value="重新設定">
										</table>
										
										<?php
									}
									
								?>
						</table>
						</div>
					</form>
						
			</table>
			<br>
		</div>
		<?php
	}
	?>
</body>
</html>