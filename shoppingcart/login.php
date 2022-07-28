
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>登錄畫面</title>
		
</head>
<body >
	<?php
	 include("connection.php");
	 ?>

	 <div  style="max-width:device-width; position:absolute ;width:100% ;height:100% ;overflow-x:hidden;overflow-y:hidden;">
		<center>
			<div style="position:absolute ; widght:20px ;height:10px ; left:20%; top:10%;font-size:60px">
				<a href=home.php target="_top" style="text-decoration:none;color:red;" >高大速食店</a>
			</div>
				<form method="get" action="loginsuccessfull.php">
					<div style="position:absolute ; widght:20px ;height:10px ; right:17%; top:35%;font-size:45px">
						登入<br>
						<input type="text" placeholder="帳號" style="width:300px; height:30px; font-size:20px;" name="account" ><br>
						<input type="password" placeholder="密碼" style="width:300px; height:30px; font-size:20px;" name="pwd"><br>
						<input type="submit" value="登入" style="width:300px; height:30px; font-size:20px;color:yellow; background-color:orange;" >
						<input type=hidden name="login" value=1>
						</div>
				</form>
				<div style="position:absolute ;widght:20px ;height:10px ; left:15%; top:25%;font-size:45px">
					<img src="picture/logo.png">
				</div>

				<div style="position:absolute ; right:21%;top:67%">
				<center>
					你還不是會員?點這裡註冊
				</div>
				<div style="position:absolute ; right:17%;top:62%">
				<center>
					<a href="forgetpassword.php">忘記密碼</a>
				</div>
				<div style="position:absolute  ; right:23%;top:70%"> 
				<a href="register.php">註冊新帳號</a>
				</div>
	</div>
</body>
</html>