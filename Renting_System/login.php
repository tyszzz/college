<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>登錄畫面</title>
		
</head>
<?php
unset($_SESSION['id']);
unset($_SESSION['pwd']);
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
<body>
	
	 <div  style="max-width:device-width;overflow:auto; position:absolute;width:100% ;height:100% ;top:10% ">
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<center>
			<b><font face="標楷體" size="6" color="#0000FF"> 烤 肉 區 租 借 系 統</font></b>
		
			<br>
			<br>
			<br>
			<br>
			
			<form method="get" action="entered.php">
				
			
				<table cellspacing="2" cellpadding="0" width="45%" bgcolor="006666">
					<tr>
					<td>
						<table border="0" width="100%" bgcolor="#FFFFFF" cellspacing="2" cellpadding="0">
							<tr>
								<td align=center bgcolor="#C4E1FF" width="45%" height="40">會員ID：
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
								<input type="reset" value="重新設定">
								</form>
						
						</table>
				</table>
				
				
					<p>你還不是會員?點這裡註冊
			
				<div style="position:relative ; left:20% ;bottom:75px">
					<a href="forgetpassword.php">忘記密碼</a>
				</div>
				<div style="position:relative  ;bottom:40px"> 
				<a href="registeredin.php">校內</a>
				<a href="registeredout.php">校外</a>
				<a href="adminlogin.php">管理員登入</a><p>
				</div>
	
				
		</center>
			</div>
</body>
</html>