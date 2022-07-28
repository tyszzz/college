<html>
	<head>
		<title>露營區租借</title>
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
		$sql_query="select * from renter where r_account='".$r_acc."'";
		$result=mysql_query($sql_query);
		$row = mysql_fetch_array($result);
		?>
		<a href="entered.php?id=<?echo $_COOKIE["id"]?>&pwd=<?echo $_COOKIE["pwd"]?>&cnt=-1">返回</a>
		<div align="center" style="max-height:700px;overflow:auto;">
			<b><font face="標楷體" size="6" color="#0000FF">欲租借露營區請填以下表格！</font></b> 
			<form method="get" action="campcomplete.php">
			<table bgcolor="#6A6AFF" cellspacing="0" cellpadding="0" width=60% align=center>
				<tr>
				<td>
					<table border="0" width="100%"  cellspacing="2" cellpadding="0">
						<tr bgcolor="#DDDDFF" align=center>
						<td width=15%>借用空間
						<td width=30%>國立高雄大學露營區
						<td width=15%>借用人
						<td><?echo $row[2]?>
						<tr bgcolor="#DDDDFF" align=center>
						<td width=15%>借用費用
						<td>一個營位500NTD
						<td>借用營位
						<td>
						<input type="checkbox" value="C01" name="camp[]" >營位一
						<input type="checkbox" value="C02" name="camp[]" >營位二
						<input type="checkbox" value="C03" name="camp[]" >營位三
						<input type="checkbox" value="C04" name="camp[]" >營位四
						<input type="checkbox" value="C05" name="camp[]" >營位五
						<tr bgcolor="#DDDDFF" align=center>
						<td width=15%>借用日期
						<td><input type=date name="B_date" size=20 required="required">
						<td width=15%>結束日期
						<td><input type=date name="E_date" size=20 required="required">
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