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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>會員修改系統</title>
</head>
<body>
<button><a href='adminentered.php?cnt=-1'  style='text-decoration:none;color:black ; left:0%'>返回管理頁面</a></button>
    <button><a href='login.php?cnt=0'  style='text-decoration:none;color:black ; left:10%'>登出</a></button>
            <div align="center" style="max-height:400px;overflow:auto;">
            <b><font face="標楷體" size="6" color=black>會員資料修改系統(請善用crtl+F)</font></b><br>
           <?php
            $sql_query="select * from renter";
            $result=mysql_query($sql_query);
            echo"<table border=1 bgcolor=white >";
            echo"<tr bgcolor=yellow>";
            echo"<td>會員帳號";
            echo"<td>密碼";
            echo"<td>姓名";
            echo"<td>聯絡電話";
            echo"<td>E-Mail";
            echo"<td>地址";
            echo"<td>選擇更改帳戶";
            while($row = mysql_fetch_array($result)){
                echo"<tr bgcolor=white align='center'>";
                echo"<td>".$row[0];
                echo"<td>".$row[1];
                echo"<td>".$row[2];
                echo"<td>".$row[3];
                echo"<td>".$row[4];
                echo"<td>".$row[5];
                echo"<td><button><a href='adminfix.php?number=$row[0]&value=1'  style='text-decoration:none;color:black'>選擇</a></button>";

            };
            echo"</table>";
?>  



</body>
</html>
<?php
    }
?>