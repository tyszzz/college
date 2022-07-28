<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>註冊</title>
    
</head>
<body>
<div style="position:absolute ;top:15px;left:1700px;widght:60px ;height:15px;font-size:20px">
        <a href=login.php? target="_top" style="text-decoration:none;color:black;" >返回登入畫面</a>
</div>
<form method="get" action='successorfail.php?'>


<p align="center"><font size="7" color="black" style="font-size:50px;" > 註冊
</p>
<hr>

<TT>
<div style="font-size:25px">
<center>
<table border="0" width="40%" cellpadding="2">
	<tr bgcolor="#FFEEDD">
	<td align="right">帳號:</td>
	<td align="left"><input type=text maxLength="20" size="25" name="b_account" required="required" style="font-size:25px">(中、英文皆可)</td>
	</tr>

	<tr bgcolor="#FFDCB9">
	<td align="right">密碼:</td>
	<td align="left"><input type=text maxLength="20" size="25" name="pwd" required="required" style="font-size:25px"></td>
	</tr>

	<tr bgcolor=#FFC78E>
	<td align="right">使用者名稱:</td>
	<td align="left"><input type=text maxLength="20" size="25" name="name" required="required" style="font-size:25px"></td>
	</tr>

	<tr bgcolor=#FFAF60>
	<td align="right">E-Mail:</td>
	<td align="left"><input type=email  maxLength="30" size="25" name="email" required="required" style="font-size:25px"></td>

	<tr bgcolor=#FF9224>
	<td align="right">電話:</td>
	<td align="left"><input type=text maxLength="2" size="2" name="tel1" required="required" style="font-size:25px;width:50px">-<input type=text maxLength="13" size="15" name="tel2" required="required" style="font-size:25px"></td>
	</tr>

	<tr bgcolor=#EA7500>
	<td align="right">地址:</td>
	<td align="left"><input type=text maxLength="50" size="25" name="address" required="required" style="font-size:25px"></td>
	</tr>

	<tr bgcolor=#BB5E00>
	<td align="right">安全問題:</td>
	<td align="left"><input type=text maxLength="30" size="25" name="sqution" required="required" style="font-size:25px">(密碼丟失時使用)</td>
	</tr>
	
</table>
<p>
<input type="submit" value="註冊" style="width:250px; height:40px; font-size:20px;color:yellow; background-color:orange;" >
<input type="reset" value="清除" style="width:250px; height:40px; font-size:20px;color:yellow; background-color:orange;" >
</div>
</form>

</body>
</html>