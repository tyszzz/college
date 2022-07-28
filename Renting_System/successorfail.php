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
    $usrid=$_GET["usrid"];
    $passwd=$_GET["passwd"];
    $renter=$_GET["renter"];
    $sid=$_GET["sid"];
    $EMail=$_GET["EMail"];
    $phone=$_GET["phone"];
    $address=$_GET["address"];
    $sqution=$_GET["sqution"];
    $type=1;
    $taxid=$_GET["taxid"];
    if($sid==NULL)$type=0;
    $sql_query="insert into renter values('".$usrid."','".$passwd."','".$renter."','".$phone."','".$EMail."','".$address."','".$sqution."',0,'".$type."')";
    if(!mysql_query($sql_query))
    {
        echo "<p>帳號重複</p>";
       
        ?>  
		<meta http-equiv="refresh" content="10; url=registeredin.php">
        <h5>網頁將在10秒跳回註冊畫面<br>若不想等待，請<a href="registeredin.php">點擊此</a></h5>
        <img src="\database\pic\22128.gif" width=200px hight=200px>  
       
       
        <?php
        
    }
    else
    {
        echo"創建成功";
        if($type==1){
        $sql_query="insert into renterinschool values('".$usrid."','".$sid."')";
        mysql_query($sql_query);
        }else{
            $sql_query="insert into renteroutschool values('".$usrid."','".$taxid."')";
            mysql_query($sql_query);


        }

        ?>
        <h5>網頁將在10秒跳回登入畫面<br>若不想等待，請<a href="login.php">點擊此</a></h5>      
        <meta http-equiv="refresh" content="10; url=login.php">
        <img src="\database\pic\22128.gif" width=200px hight=200px>  
       
        <?php
    }

    }
    

    
?>
    </body>
</html>