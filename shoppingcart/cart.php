<html>
	<head>
		<title>購物車</title>
	</head>
	<body bgcolor=orange>
		<?php
			session_start();
			include("connection.php");
			$sql_query ="select * from shoppingcart where b_account='".$_SESSION['account']."'";
			$result=mysql_query($sql_query);
			$row=mysql_fetch_array($result);
			$s_number=$row[1];
			$sql_query ="select * from cart_and_item where s_number='".$s_number."'";
			$result=mysql_query($sql_query);
			$i=1;
		?>
		<table width=60% border=0 align=center bgcolor=#006666 cellspacing=2 cellpadding=0>
			<tr align=center>
				<td colspan=2>
					<table border="0" width="100%" bgcolor="#FFFFFF" cellspacing="2" cellpadding="0">
						<tr>
							<td bgcolor=#C4E1FF align=center width=70%><b><font size=6 color=black>我的訂單</font></b>
							<td bgcolor=#C4E1FF align=center><b><font size=6 color=black>訂單總計</font></b>
					</table>
			<tr>
				<td align=center width=70%>
					<table width=100% border=0 bgcolor=#FFFFFF cellspacing=2 cellpadding=0>
						<tr align=center>
							<td width=15% bgcolor=#C4E1FF><b><font size=4 >商品編號</font></b>
							<td width=40% bgcolor=#C4E1FF><b><font size=4 >商品名稱</font></b>
							<td width=15% bgcolor=#C4E1FF><b><font size=4 >商品數量</font></b>
							<td width=15% bgcolor=#C4E1FF><b><font size=4 >商品價格</font></b>
							<td width=15% bgcolor=#C4E1FF><b><font size=4 >商品變更</font></b>
							<?
								while($row=mysql_fetch_array($result))
								{
									echo '<tr align=right>';
									echo "<td bgcolor=#C4E1FF><font size=3  >".$i;
									echo "<td align=center><font size=3 color=blue>".$row[2]."</font>";
									echo "<td align=center><font size=3 >".$row[3]."</font>";
									echo "<td align=center><font size=3 color=darkgreen>".$row[4]."</font>";?>
									<td align=center><a href=change.php?I_num=<?echo $row[0]?>>變更</a>
									<a href=delete.php?I_name=<?echo $row[2]?>>刪除</a><?
									$i++;
								}	
							?>
					</table>
				<?
					$sql_query ="select *,sum(price) from cart_and_item where s_number='".$s_number."'";
					$result=mysql_query($sql_query);
					$row=mysql_fetch_array($result);
					$totalprice=$row[5];
					$sql_query ="select * from buyer where b_account='".$_SESSION['account']."'";
					$result=mysql_query($sql_query);
					$row=mysql_fetch_array($result);
				?>
				<form method="get" action="finish.php?">
				<td align=center>
					<table width=100% border=0 cellspacing=2 cellpadding=0 bgcolor=#FFFFFF>
						<tr align=center>
							<td align=left width=20% bgcolor=#C4E1FF><b><font size=4 color=darkgray>送餐至:</font></b>
							<td><input name="address" type="text" value="<?echo $row[5]?>" style="width:100%;height:100%;font-size:20px"  required="required">
						<tr>
							<td align=left bgcolor=#C4E1FF><b><font size=4 color=darkgray>小計:</font></b>
							<td align=right><font size=4 >NT$<?echo $totalprice?></font>
						<tr>
							<td align=left bgcolor=#C4E1FF><b><font size=4 color=darkgray>外送費:</font></b>
							<td align=right><font size=4 >NT$39</font>
						<tr>
							<td align=left bgcolor=#C4E1FF><b><font size=4 color=darkgray>總計:</font></b>
							<td align=right><font size=4 color=darkgreen>NT$
							<?
								$totalprice+=39;
								echo $totalprice;
								$address=123;
							?></font>
					</table>
				<font size=4><input type="submit" style='text-decoration:none;color:black' value="結賬"></font></a>
				</form>
		</table>
		<br>
		<br>
		<center>
			<button>
				<a href="main.php" style='text-decoration:none;color:black'><font size=4>繼續訂餐</font></a>
			</button>
			
		</center>
	</body>
</html>