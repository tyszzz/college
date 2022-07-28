<html>
	<head>
		<title>購物車</title>
	</head>
	<body bgcolor=orange>
		<?php
			session_start();
			include("connection.php");
			
			$sql_query ="select * from o_rder where b_account='".$_SESSION['account']."'";
			$result=mysql_query($sql_query);
		?>
		<div style="height:595px;overflow-y:auto">
		<table width=60% border=0 align=center bgcolor=#006666 cellspacing=2 cellpadding=0>
			<tr align=center>
				<td colspan=2>
					<table border="0" width="100%" bgcolor="#FFFFFF" cellspacing="2" cellpadding="0">
						<tr>
							<td bgcolor=#C4E1FF align=center width=70%><b><font size=6 color=black>我的訂單</font></b>
					</table>
			<tr>
				<td align=center width=70%>
					<table width=100% border=0 bgcolor=#FFFFFF cellspacing=2 cellpadding=0>
						<tr align=center>
							<td width=10% bgcolor=#C4E1FF><b><font size=4 >訂單編號</font></b>
							<td width=25% bgcolor=#C4E1FF><b><font size=4 >商品名稱</font></b>
							<td width=10% bgcolor=#C4E1FF><b><font size=4 >商品數量</font></b>
							<td width=10% bgcolor=#C4E1FF><b><font size=4 >商品價格</font></b>
							<td width=15% bgcolor=#C4E1FF><b><font size=4 >目前狀況</font></b>
							<td width=15% bgcolor=#C4E1FF><b><font size=4 >送餐地址</font></b>
							<td width=15% bgcolor=#C4E1FF><b><font size=4 >總價格(含運費)</font></b>
							<?
								while($row=mysql_fetch_array($result))
								{
									
									echo '<tr align=right>';
									//echo "<td bgcolor=#C4E1FF><font size=3  >".$row[0];
									if($temp!=$row[0])
									{
										echo "<td bgcolor=#C4E1FF><font size=3  >".$row[0];
										
									}
									else
									{
										echo "<td bgcolor=#C4E1FF>";
									}	
									echo "<td align=center><font size=3 color=blue>".$row[2]."</font>";
									echo "<td align=center><font size=3 >".$row[3]."</font>";
									echo "<td align=center><font size=3 color=darkgreen>".$row[4]."</font>";
									if($temp!=$row[0])
									{
										if(!$row[6])
										{
											echo "<td align=center>已付款，製作中";
										}
										else
										{
											echo "<td align=center>已送出";
										}
										echo "<td align=center><font size=3 color=black>".$row[7]."</font>";
									}
									else
									{
										echo "<td>";
										echo "<td>";
									}
									
									if($temp!=$row[0])
									{
										$sql_query1 ="select sum(price) from o_rder where O_no='".$row[0]."' group by O_no";
										$result1=mysql_query($sql_query1);
										$row1=mysql_fetch_array($result1);
										$total=$row1[0]+39;
											echo "<td>".$total;
										
									}
									$temp=$row[0];
								}	
							?>
					</table>
				<?
					$sql_query ="select *,sum(price) from cart_and_item where s_number='".$s_number."'";
					$result=mysql_query($sql_query);
					$row=mysql_fetch_array($result);
					$totalprice=$row[5];
					$sql_query ="select * from buyer where b_account='".$account."'";
					$result=mysql_query($sql_query);
					$row=mysql_fetch_array($result);
				?>
		</table>
		<br>
		<br>
		<center>
			<button>
				<a href="main.php" style='text-decoration:none;color:black'><font size=4>返回菜單</font></a>
			</button>
		</center>
		</div>
	</body>
</html>