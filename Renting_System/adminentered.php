
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
		
		$cnt=$_GET['cnt'];
		session_start();
		if($cnt>=0){
		$_SESSION['id']=$_GET['id'];
		$_SESSION['pwd']=$_GET['pwd'];
		echo$cnt;
		echo" ";
			$cnt--;
		}
		$id=$_SESSION['id'];
		$pwd=$_SESSION['pwd'];
		$sql_query="select * from employee where e_account='".$id."' and password='".$pwd."'";
		$result=mysql_query($sql_query);
		
		if(mysql_num_rows($result)!=1){
			echo"登入失敗";
			
			?>
			<meta http-equiv="refresh" content="10; url=login.php">
        	<h5>網頁將在10秒跳登入畫面</h5> 
         	<img src="\database\pic\22128.gif" width=200px hight=200px>  
			<?php

		}else{
		
?>
		<title>系統界面</title>
	</head>
	<body>	
		<button><a href='login.php?cnt=0'  style='text-decoration:none;color:black ; left:10%'>登出</a></button>
		<br>
		<br>
	
		<div align="center" style="max-height:400px;overflow:auto;">
    	
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
								<td align=center bgcolor="#C4E1FF" height="40"><a href="adminBBQ.php">租借管理</a>
                            
							<tr>
								<td align=center bgcolor="#C4E1FF" height="40"><a href="adminChangeEmpolyee.php">更改會員資料</a>
						</table>
				</table>
		</div>
		<?php
			
		
		}
	}?>
	</body>

</html>