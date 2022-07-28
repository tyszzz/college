<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>查詢</title>
		
</head>

<?php
$type=$_GET["type"];
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
	else
	{
		?><a href="entered.php?id=<?echo $_COOKIE["id"]?>&pwd=<?echo $_COOKIE["pwd"]?>&cnt=-1">返回</a><?php
		if($type=='露營區')
			echo"<h1><center>露營區</h1>";
		else
			echo"<h1><center>烤肉區</h1>";
	}
		
}
?>

<body>

<?php
$select_db=@mysql_select_db("rent_database");//選擇資料庫
	if(!$select_db)
	{
		echo'<br>error';
	}
	else
	{		
		$sql_query="select * from site where type='".$type."'";//下sql語法
		$result=mysql_query($sql_query);//執行sql語法，執行完會丟給result
		
		echo'<center><table border=0 cellspacing="0" cellpadding="0" width=40%>';
		echo'<tr>';
		
		while($row=mysql_fetch_array($result))
		{
			$cnt++;
			if($cnt==3)
			{
				echo'<tr>';
				$cnt=1;
			}
				
			echo'<td width=20%><center><img src=../database/pic/'.$row[0].'.png style="border:0px #ccc solid;padding:20px;" width=300 hight=200></center>';
			echo'　 '.$row[0].'區　　　　　　　　　　　　　NT $'.$row[2];
		} 
		
		echo'</table>';
		
		if($type=='露營區')
		{
			$sql_query="select r_number,rentStartTime,rentOverTime from rent_rcd where BBQSiteNumber=0 order by rentStartTime";//查詢特定資料
			$result=mysql_query($sql_query);//執行sql語法，執行完會丟給result
		}
		else
		{
			$sql_query="select r_number,rentStartTime,rentOverTime from rent_rcd where campSiteNumber=0 order by rentStartTime";//查詢特定資料
			$result=mysql_query($sql_query);//執行sql語法，執行完會丟給result
		}
		
		//echo'<p>資料筆數:'.mysql_num_rows($result).'<hr>';
		echo'<br><br><br>';
		echo'<table border=1 width=50%>';
		echo'<tr>';
		echo'<td>租借區域';
		echo'<td>租借開始時間';
		echo'<td>租借結束時間';
		
		while($row=mysql_fetch_array($result))
		{
			echo'<tr>';
			echo'<td>';
			$sql_query="select s_number from rent_rcd_and_site where r_number='".$row[0]."'";//查詢特定資料
			$result1=mysql_query($sql_query);//執行sql語法，執行完會丟給result
			while($row1=mysql_fetch_array($result1))
				echo $row1[0].' ';
			echo'<td>'.$row[1];
			echo'<td>'.$row[2];
		}
	}
?>

</body>

</html>