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
		$b_date=$_GET["B_date"];
		$e_date=$_GET["E_date"];
		$sql_query="select * from renter where rentStartTime >='".$b_date."' and rentOverTime<='".$e_date."'";
		$result=mysql_query($sql_query);
		
    }

?>
	</body>

</html>