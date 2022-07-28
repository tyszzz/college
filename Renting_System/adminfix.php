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
            <div align="center" style="max-height:400px;overflow:auto;">
            <b><font face="標楷體" size="6" color=black>會員資料修改系統</font></b><br>
           <?php
           if($_GET['value1']==3){
              

            $sql_query="update renter set r_password='".$_GET['passwd']."', r_name='".$_GET['name1']."', email='".$_GET['Email']."', tel='".$_GET['phone']."', address='".$_GET['address']."'  where r_account='".$_GET['account']."'";
           
            mysql_query($sql_query);
                echo"修改完成";

           }
           else if($_GET['value1']==1){
               
                $sql_query="select * from renter where r_account='".$_GET['number']."'";
                $result=mysql_query($sql_query);
                $row=mysql_fetch_array($result);
                echo"

                <form action='adminfix.php?value1=3'>
                <table>
                <tr bgcolor=pink>
                <td align='center'>會員ID</td>
                <td align='left'>$row[0]</td>

                <tr bgcolor='cyan'>
                <td align='right'>密碼:</td>
                <td align='left'><input type=text maxLengh='10' name='passwd' value=$row[1]></td>

                <tr bgcolor='pink'>
                <td align='right'>姓名</td>
                <td align='left'><input type=text maxLengh='20' name='name1'  value=$row[2]></td>
                
                <tr bgcolor='cyan'>
                <td align='right'>E-mail</td>
                <td align='left'><input type=text maxLengh='20' name='Email'  value=$row[3]></td>

                <tr bgcolor='pink'>
                <td align=right'>電話</td>
                <td align='left'><input type=text maxLengh='20' name='phone'  value=$row[4]></td>
                <input type='hidden' name='value1' value=3>

                <tr bgcolor='cyan'>
                <td align=right'>地址</td>
                <td align='left'><input type=text maxLengh='20' name='address'  value=$row[5]></td>
                <input type='hidden' name='value1' value=3>
                <input type='hidden' name='account' value=$row[0]>
                </table> 
                <p><input value='修改' type='submit' >
                </form>
               
                ";

                
           }else if($_GET['value1']==2){    
            $sql_query="delete from renter where r_account='".$_GET['number']."'";
            mysql_query($sql_query);
                echo"已經刪除完成";

           }else{
            $sql_query="select * from renter where r_account='".$_GET['number']."'";
            $result=mysql_query($sql_query);
            echo"<table border=1 bgcolor=white >";
            echo"<tr bgcolor=yellow>";
            echo"<td>會員帳號";
            echo"<td>密碼";
            echo"<td>姓名";
            echo"<td>聯絡電話";
            echo"<td>E-Mail";
            echo"<td>地址";
            echo"<td>選擇更改內容";
            $row = mysql_fetch_array($result);
                echo"<tr bgcolor=white>";
                echo"<td>".$row[0];
                echo"<td>".$row[1];
                echo"<td>".$row[2];
                echo"<td>".$row[3];
                echo"<td>".$row[4];
                echo"<td>".$row[5];
                echo"<td><button><a href='adminfix.php?number=$row[0]&value1=1'  style='text-decoration:none;color:black'>修改</a></button>";
                echo"<button><a href='adminfix.php?number=$row[0]&value1=2'  style='text-decoration:none;color:black'>刪除</a></button>";

            
            echo"</table>";
           }
?>  



</body>
</html>
<?php
    }
?>