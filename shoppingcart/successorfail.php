<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
</head>
<body>
<?php
include("connection.php");
    $b_account=$_GET["b_account"];
    $passwd=$_GET["pwd"];
    $name=$_GET["name"];
    $email=$_GET["email"];
    $tel=$_GET["tel1"];
    $tel2=$_GET["tel2"];
    $telreal=$tel1+$tel2;
    $address=$_GET["address"];
    $securityqution=$_GET["sqution"];
	$sql_query ="SELECT max(s_number) FROM shoppingcart";
	$result=mysql_query($sql_query);
	$row=mysql_fetch_array($result);
	if($row[0]==NULL)
	{
		$s_number=mysql_num_rows($result);
	}
	else
	{
		$s_number=mysql_num_rows($result)+1;
	}
    $sql_query="insert into buyer values('".$b_account."','".$email."','".$name."','".$telreal."','".$passwd."','".$address."','".$securityqution."')";
    if(!mysql_query($sql_query))
    {
        echo "<script>alert('帳號重複或email重複');</script>";
        ?>
        <h5>網頁將在10秒跳回註冊畫面<br>若不想等待，請<a href="register.php">點擊此處</a></h5>      
        <meta http-equiv="refresh" content="10; url=login.php">
        <img src="picture\logo(ng).png" width=200px hight=200px>  
       
        <?php
    }
    else
    {
		$sql_query ="insert into shoppingcart values('".$b_account."','".$s_number."')";
		mysql_query($sql_query);
        echo"創建成功";
        ?>
        <h5>網頁將在10秒跳回登入畫面<br>若不想等待，請<a href="login.php">點擊此處</a></h5>      
        <meta http-equiv="refresh" content="10; url=login.php">
        <img src="picture\logo(ng).png" width=200px hight=200px>  
       
        <?php
    }
?>
    
</body>
</html>