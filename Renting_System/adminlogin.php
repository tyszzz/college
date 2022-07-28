<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>管理員登錄畫面</title>
</head>
<?php
unset($_SESSION['id']);
unset($_SESSION['pwd']);
//連結資料庫
$location="127.0.0.1"; //連到本機
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
<body>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<center>
			<b><font face="標楷體" size="6" color="#0000FF"> 烤 肉 區 管 理 系 統</font></b> 
			<br>
			<br>
			<br>
			<br>
			<form method="get" action="adminentered.php">
				<div align="center" style="max-height:400px;overflow:auto;">
			
				<table cellspacing="2" cellpadding="0" width="45%" bgcolor="006666">
					<tr>
					<td>
						<table border="0" width="100%" bgcolor="#FFFFFF" cellspacing="2" cellpadding="0">
							<tr>
								<td align=center bgcolor="#C4E1FF" width="45%" height="40">管理員ID：
								<td align=center width="55%"><input type=text name="id" size=20>
							<tr>
								<td align=center bgcolor="#C4E1FF" height="40">密碼：
								<td align=center><input type=text name="pwd" size=20>
						</table>
					<tr>
					<td align=center>
						<table border="0" width="100%" bgcolor="#FFFFFF" cellspacing="2" cellpadding="0">
							<tr>
							<td align=center height=35>
								<p><input type="submit" value="登      入">
								<input type="reset" value="重新設定"></p>
						</table>
				</table>
				</form>
				<a href="login.php">租借人登入</a><p>
				
				</div>
		</center>
</body>
</html>