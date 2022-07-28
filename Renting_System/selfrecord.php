<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>個人租借紀錄查詢</title>
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
</head>
<body>
<a href="entered.php?id=<?echo $_COOKIE["id"]?>&pwd=<?echo $_COOKIE["pwd"]?>&cnt=-1">返回</a>
<?php
$r_account=$_GET["r_acc"];
$value=$_GET['value'];
$select_db=@mysql_select_db("rent_database");
    if(!$select_db)
    {
        echo"<h1><center>error</h1>";
    }
    else
    {
        if($value==1)
        {
            echo "<script>alert('警告：將在按下確定之後刪除');</script>";
            $number=$_GET['number'];
          
            $sql_query="DELETE FROM rent_rcd WHERE r_number='".$number."' ";
            $result=mysql_query($sql_query);
            $value=0;
            //echo "<meta http-equiv='refresh' content='0; url=selfrecord.php?value=0'>";

        }
        $sql_query="select * from rent_rcd where r_account='".$r_account."' ";
        $result=mysql_query($sql_query);
        //echo "<p>資料筆數: ".mysql_num_rows($result);
        //echo $row[2];

        echo "<table border=1>";
		echo "<tr>";
		echo "<td>租借人數";
        echo "<td>開始時段";
        echo "<td>結束時段";
        echo "<td>保證金繳交於否";
        echo "<td>費用繳交於否";
        echo "<td>租借區域編號(B開頭為烤肉區、C開頭為露營區";
        echo "<td>變更";

        while($row=mysql_fetch_array($result))
        {
            $sql_query1="select * from rent_rcd_and_site where r_number='".$row[0]."' ";
            $result1=mysql_query($sql_query1);
           
			echo"<tr>";
			echo"<td>".$row[1];
            echo"<td>".$row[2];
            echo"<td>".$row[3];
            if($row[5]==false)
            {
                echo"<td>尚未繳交";
            }
            else if($row[5]==true)
            {
                echo"<td>已繳交";
            }
            if($row[6]==false)
            {
                echo"<td>尚未繳交";
            }
            else if($row[6]==true)
            {
                echo"<td>已繳交";
            }
            //echo"<td>".$row[8];
            echo"<td>";
            for($i=0;$i<mysql_num_rows($result1);$i++)
            {
                $row1=mysql_fetch_array($result1);
                echo $row1[1]." ";
            }
            $bbqorcamp=2;
            $sitenumber=$row[9];
            if($row[8]>0)
            {
                //是烤肉區
                $bbqorcamp=1;
                $sitenumber=$row[8];
            }
            
            echo"<td>";
            if($row[7]==0)
            {
				echo "<button><a href='change.php?sitenumber=$sitenumber&bbqorcamp=$bbqorcamp&number=$row[0]&r_acc=$r_account' style='text-decoration:none;color:black'>變更</a></button>";
				echo "<button><a href='selfrecord.php?number=$row[0]&value=1&r_acc=$r_account' style='text-decoration:none;color:black'>刪除</a></button>";
			}
			else
			{
				echo "已核准，不能更改";
			}
            //onclick="window.open('網址','視窗名稱 ',config='height=高,width=寬')" 
		}
		echo"</table>";
    }
?>
</body>
</html>