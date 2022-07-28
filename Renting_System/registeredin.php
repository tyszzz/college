<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>會員註冊</title>
</head>
<body>

<form method="get" action='successorfail.php?'>


<p align="center"><font size="4" face="標楷體" color=blue>會員註冊</p>
<hr>

<TT>

<center>
<table border="0" width="23%">
	<tr bgcolor=red>
	<td align="right">會員帳號:</td>
	<td align="left"><input type=text maxLength="10" size="10" name="usrid" required="required">(中、英文皆可)</td>
	</tr>

	<tr bgcolor=orange>
	<td align="right">密碼:</td>
	<td align="left"><input type=text maxLength="20" size="20" name="passwd" required="required"></td>
	</tr>

	<tr bgcolor=orange>
	<td align="right">姓名:</td>
	<td align="left"><input type=text maxLength="20" size="20" name="renter" required="required"></td>
	</tr>


	<tr bgcolor=orange>
	<td align="right">學號:</td>
	<td align="left"><input type=text maxLength="20" size="20" name="sid" required="required"></td>
	</tr>

	<tr bgcolor=yellow>
	<td align="right">E-Mail:</td>
	<td align="left"><input type=text size="20" name="EMail" required="required"></td>

	<tr bgcolor=#808080>
	<td align="right">電話:</td>
	<td align="left"><input type=text maxLength="15" size="15" name="phone" required="required"></td>
	</tr>

	<tr bgcolor=#808080>
	<td align="right">地址:</td>
	<td align="left"><input type=text maxLength="15" size="15" name="address" required="required"></td>
	</tr>

	<tr bgcolor=#808080>
	<td align="right">安全問題:</td>
	<td align="left"><input type=text maxLength="15" size="15" name="sqution" required="required">(密碼丟失時使用)</td>
	</tr>
	
</table>

<p><input value=" 線上註冊 "type="submit" >
<input value="    清除    "type="reset"></p>

</form>

</body>
</html>