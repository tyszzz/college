
</html>
	<head>
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
		$id=$_GET["id"];
		$pwd=$_GET["pwd"];
		$sql_query="select * from renter where r_account='".$id."' and r_password='".$pwd."'";
		$result=mysql_query($sql_query);
		
		if(mysql_num_rows($result)!=1&$_COOKIE["id"]==NULL){
			echo"登入失敗";
			?>
			<meta http-equiv="refresh" content="10; url=login.php">
        	<h5>網頁將在10秒跳登入畫面<br>若不想等待，請<a href="login.php">點擊此</a></h5> 
         	<img src="\database\pic\22128.gif" width=200px hight=200px>  
			<?php

		}else{
			setcookie("id",$id);
			setcookie("pwd",$pwd);
?>
		<title>系統界面</title>
	</head>
	<body>
		<button><a href='login.php?cnt=0'  style='text-decoration:none;color:black ; left:10%'>登出</a></button>
		<br>
		<br>
		<div align="center" style="max-height:600px;overflow:auto;">
			<marquee bgcolor="#0000FF" width=20% height=57><b><font face="標楷體" size="8" color=skyblue> 歡迎蒞臨國立高雄大學烤肉區租借系統</font></b></marquee><br>
			<br>
			<br>
			<br>
			<br>
			<b><font face="標楷體" size="6" color="#0000FF"> 烤 肉 區 租 借 系 統</font></b><br>
			<br>
			<br>
			<table cellspacing="2" cellpadding="0" width="35%" bgcolor="006666">
					<tr>
					<td>
						<table border="0" width="100%" bgcolor="#FFFFFF" cellspacing="2" cellpadding="0">
							<tr>
								<td align=center bgcolor="#C4E1FF" width="45%" height="40"><a href="bbqrent.php?r_acc=<?echo $id?>&r_pwd=<?echo $pwd?>">烤肉區租借</a>
							<tr>
								<td align=center bgcolor="#C4E1FF" height="40"><a href="camprent.php?r_acc=<?echo $id?>&r_pwd=<?echo $pwd?>">露營區租借</a>
							<tr>
								<td align=center bgcolor="#C4E1FF" height="40"><a href="selfrecord.php?r_acc=<?echo $id?>">個人租借記錄</a>
							<tr>
								<td align=center bgcolor="#C4E1FF" height="40"><a href="pay.php?r_acc=<?echo $id?>">繳費系統</a>
								
						</table>
						<form  align=center method="get" action="search.php" style="background-color: #C4E1FF;margin: 0;height: 40;">
									<select name="type">
										<option selected value="露營區">露營區</option>
										<option selected value="烤肉區">烤肉區</option>
									</select>
									<input type="submit" value="查詢">
								</form>
				</table>
		</div>
		<?php
			$id=$_GET["id"];
			$pwd=$_GET["pwd"];
		
		}
	}?>
	</body>

</html>