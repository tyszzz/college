<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>找回密碼</title>
</head>
<body>

<center>
<div width=100% hight=100% back>
<h2>找回密碼</h2>
<form method="get" action="findpassword.php">
<table border="0" width="23%">
<tr>
	<td align="right">會員帳號:</td>
	<td align="left"><input type=text maxLength="10" size="10" name="account" required="required"></td>
	</tr>

 <tr>
	<td align="right">安全問題:</td>
	<td align="left"><input type=text maxLength="30" size="10" name="squestion" required="required"></td>
	</tr>
</table>
	<p><center><input type="submit" value="送出">
	<input type="reset" value="重新設定"></p>
</form>
</div>

</body>
</html>