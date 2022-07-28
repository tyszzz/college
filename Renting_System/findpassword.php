<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>找回密碼</title>
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
        $account=$_GET["account"];
        $squestion=$_GET["squestion"];
        $sql_query="select * from renter where r_account='".$account."' and securityquestion='".$squestion."'";
        $result=mysql_query($sql_query);
        $row=mysql_fetch_array($result);
        if($row<=0)
        {
            echo "帳號不存在或安全問題不對";
        }
        else
        {
            echo "你的密碼是:$row[1]";
        }
    }

?>
</body>
</html>