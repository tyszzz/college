<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
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



<body>
<?php
    $select_db=@mysql_select_db("rent_database");
    if(!$select_db)
    {
        echo"<h1><center>error</h1>";
    }
    else
    {
    $fee=$_GET["fee"];
    $deposit=$_GET["deposit"];
	$r_num=$_GET["r_num"];
	
	if($fee)
	{
		$sql_query="update rent_rcd set fee=1 where r_number='".$_COOKIE["r_num"]."'";
		mysql_query($sql_query);
	}
	if($deposit)
	{
		$sql_query="update rent_rcd set deposit=1 where r_number='".$_COOKIE["r_num"]."'";
		mysql_query($sql_query);
	}
    if(!mysql_query($sql_query))
        echo "<p>繳款失敗</p>";        
    else
        echo"繳款成功"; 
	?>
        <h5>網頁將在10秒跳回繳款畫面<br>若不想等待，請<a href="pay.php">點擊此</a></h5>      
        <meta http-equiv="refresh" content="10; url=pay.php">
        <img src="\database\pic\22128.gif" width=200px hight=200px>  
       
    <?php	
    }
    

    
?>
    </body>
</html>