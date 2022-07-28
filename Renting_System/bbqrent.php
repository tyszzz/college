<html>
	<head>
		<title>烤肉區租借</title>
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
	<?php
	$select_db=@mysql_select_db("rent_database");
    if(!$select_db)
    {
        echo"<h1><center>error</h1>";
    }
    else
    {
		$r_acc=$_GET["r_acc"];
		$r_pwd=$_GET["r_pwd"];
		$sql_query="select * from renter where r_account='".$r_acc."'";
		$result=mysql_query($sql_query);
		$row = mysql_fetch_array($result);
		?>
		<a href="entered.php?id=<?echo $_COOKIE["id"]?>&pwd=<?echo $_COOKIE["pwd"]?>&cnt=-1">返回</a>
		<div align="center" style="max-height:700px;overflow:auto;">
			<b><font face="標楷體" size="6" color="#0000FF">欲租借烤肉區請填以下表格！</font></b> 
			<form method="get" action="bbqcomplete.php">
			<table bgcolor="#6A6AFF" cellspacing="0" cellpadding="0" width=90% align=center>
				<tr>
				<td>
					<table border="0" width="100%"  cellspacing="2" cellpadding="0">
						<tr bgcolor="#DDDDFF" align=center>
						<td width=15%>借用空間
						<td>國立高雄大學烤肉區
						<td width=15%>借用人
						<td><?echo $row[2]?>
						<tr bgcolor="#DDDDFF" align=center>
						<td width=15%>借用費用
						<td>一爐300NTD
						<td width=15%>借用數量
						<td><?//<input type=text name="N_bbq" size=20 required="required">?>
						<tr bgcolor="#DDDDFF" align=center>
						<td>借用爐子
						<td colspan=3>
						<input type="checkbox" value="B01" name="BBQ[]">爐子一
						<input type="checkbox" value="B02" name="BBQ[]">爐子二
						<input type="checkbox" value="B03" name="BBQ[]">爐子三
						<input type="checkbox" value="B04" name="BBQ[]">爐子四
						<input type="checkbox" value="B05" name="BBQ[]">爐子五
						<input type="checkbox" value="B06" name="BBQ[]">爐子六
						<input type="checkbox" value="B07" name="BBQ[]">爐子七
						<input type="checkbox" value="B08" name="BBQ[]">爐子八
						<input type="checkbox" value="B09" name="BBQ[]">爐子九
						<input type="checkbox" value="B10" name="BBQ[]">爐子十
						<tr bgcolor="#DDDDFF" align=center>
						<td width=15%>借用人數
						<td><input type=text name="N_ppl" size=20 required="required">
						<td width=15%>借用日期
						<td><input type=date name="R_date" size=20 required="required">
						<tr bgcolor="#DDDDFF" align=center>
						<td width=15%>開始時段
						<td><input type=time name="B_time" size=20 required="required">
						<td width=15%>結束時段
						<td><input type=time name="E_time" size=20 required="required">
						<input type=hidden name="r_acc" value=<?echo $row[0]?>>
						<input type=hidden name="r_pwd" value=<?echo $row[1]?>>
					</table>
					
			</table>
			<br>
			<input type=submit value="確定送出">
			</form>
		</div>
	<?
	
	}
	?>
	</body>

</html>