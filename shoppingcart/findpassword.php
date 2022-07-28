<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>找回密碼</title>
</head>
<body>
<?php
include("connection.php");
        $account=$_GET["account"];
        $squestion=$_GET["squestion"];
        $sql_query="select * from buyer where b_account='".$account."' and security='".$squestion."'";
        $result=mysql_query($sql_query);
        $row=mysql_fetch_array($result);
        if($row<=0)
        {
            echo "<script>alert('帳號錯誤或安全問題錯誤');</script>";
            ?>
            <h5>網頁將在10秒跳回找回密碼畫面<br>若不想等待，請<a href="forgetpassword.php">點擊此處</a></h5>      
            <meta http-equiv="refresh" content="10; url=forgetpassword.php">
            <img src="picture\logo(ng).png" width=200px hight=200px>  
           
            <?php
        }
        else
        {
            echo "<h1><center>你的密碼是:".$row[4]."</center></h1>";
            ?><div style="position:absolute ;top:15px;right:10%;widght:60px ;height:15px;font-size:20px">
        <a href=login.php? target="_top" style="text-decoration:none;color:black;" >返回登入畫面</a>
        </div><?
        }
?>
</body>
</html>