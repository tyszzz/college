<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
	session_start();
	include("connection.php");
?>
    <div style="position:relative ; widght:20px ;height:15px;left:40%; font-size:60px">
        <marquee  direction="right" scrollamount="10" behavior="alternate" width=500><img src="picture/logo(ng).png"  style="widght:200px ;height:160px" ></marquee>
    </div>
    <div style="position:relative ; widght:20px ;height:10px ; left:20%;font-size:60px">
       <div style="text-decoration:none;color:red;" >高大速食店</a></div>
    </div>
    <?php
    $sql_query="select * from buyer where b_account='".$_SESSION['account']."' and password='".$_SESSION['pwd']."'";
    $result=mysql_query($sql_query);
    if(mysql_num_rows($result)==1){
        $row=mysql_fetch_array($result);
?>
		<div style="position:absolute ; widght:20px ;height:15px; right:10px; top:50px; font-size:60px">
		<a href="receipt.php?" target=main><img src="picture/receipt.png"  style="widght:150px ;height:120px" ></a>
		</div>
        <div style="position:absolute ; widght:20px ;height:15px; right:250px; top:35px; font-size:60px">
        <a href="cart.php?" target=main><img src="picture/shoppingcart.png"  style="widght:150px ;height:120px" ></a>
		</div>
		
        <div style="text-decoration:none;color:black; font-size:30px;position:absolute ; top:15px;right:450px;widght:60px ;height:15px" >歡迎</div>
            
        <div style="position:absolute ;top:15px;right:250px;widght:60px ;height:15px;font-size:30px"><?php echo  " ".$row[2]; ?></div>
        <div style="position:absolute ;top:15px;right:150px;widght:60px ;height:15px;font-size:30px">
        <a href=logout.php	 target="_top" style="text-decoration:none;color:black;" >登出</a>
        </div>
<?php
    }
    else{
        if($_SESSION['login']==1){
        echo "<script>alert('帳號不存在或密碼錯誤');</script>";
  
        }
        ?>
    <div style="position:absolute ; top:10px;right:250px;widght:60px ;height:15px ;font-size:30px">
        <a href=login.php? target="_top" style="text-decoration:none;color:black;" >登入</a>
    </div>
    <div style="position:absolute ; top:10px;right:350px;widght:60px ;height:15px ;font-size:30px">
        <a href=register.php? target="_top" style="text-decoration:none;color:black;" >註冊</a>
    </div>
<?php
    }
    ?>


</body>
</html>