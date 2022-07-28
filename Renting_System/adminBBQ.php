
</html>
	<head>
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

	$select_db=@mysql_select_db("rent_database");
    if(!$select_db)
    {
        echo"<h1><center>error</h1>";
    }
    else
    {	
        
        $number2=$_GET["number"];
         $number3=$_GET["value"];
         if($number3==1){
         $sql_query="update rent_rcd set approve=1 where r_number='".$number2."'";
         }else{
             $sql_query="update rent_rcd set approve=0 where r_number='".$number2."'";
         }
         $result=mysql_query($sql_query);
        
?>
		<title>租借系統管理</title>
	</head>
	<body>
    <button><a href='adminentered.php?cnt=-1'  style='text-decoration:none;color:black ; left:0%'>返回管理頁面</a></button>
    <button><a href='login.php?cnt=0'  style='text-decoration:none;color:black ; left:10%'>登出</a></button>
		<div align="center" style="max-height:400px;overflow:auto;">
            <b><font face="標楷體" size="6" color=black>租借系統管理</font></b><br>

        <?php
            if($_GET['value']==1){


            }else{}
        ?>
            <table cellspacing="3" cellpadding="1" width="100%" bgcolor=cyan >
            <tr>
                <td>租借編號</td>
                <td>租借人數</td>
                <td>租借開始時間</td>
                <td>租借結束時間</td>
                <td>申請日期</td>
                <td>保證金繳交狀態</td>
                <td>費用繳交狀態</td>
                <td>審核狀態</td>
                <td>烤肉區數量</td>
                <td>露營區數量</td>
                <td>租借帳號</td>
                <td>選擇更改紀錄</td>
                <td>審核</td>

			<?php
            $sql_query="select * from rent_rcd";
            $result=mysql_query($sql_query);
            while($row=mysql_fetch_array($result)){
                
                echo "<tr bgcolor=white>";
                echo"<td>$row[0]</td>";
                echo"<td>$row[1]</td>";
                echo"<td>$row[2]</td>";
                echo"<td>$row[3]</td>";
                echo"<td>$row[4]</td>";
                if($row[5]==0){echo"<td>尚未繳交</td>";}else{echo"<td>已繳交</td>";}
                if($row[6]==0){echo"<td>尚未繳交</td>";}else{echo"<td>已繳交</td>";}
                if($row[7]==0){echo"<td>尚未通過</td>";}else{echo"<td>已通過審核</td>";}
                echo"<td>$row[8]</td>";
                echo"<td>$row[9]</td>";
                echo"<td>$row[10]</td>";
                $bbqorcamp=2;
            $sitenumber=$row[9];
            if($row[8]>0)
            {
                //是烤肉區
                $bbqorcamp=1;
                $sitenumber=$row[8];
            }
            
            echo"<td>";
            if($row[6]==0)
            {
            echo "<button><a href='adminrecord.php?sitenumber=$sitenumber&bbqorcamp=$bbqorcamp&number=$row[0]&r_acc=$row[10]' style='text-decoration:none;color:black'>變更</a></button>";
            }
                echo"<td>
                <button><a href='adminBBQ.php?number=$row[0]&value=1'  style='text-decoration:none;color:black'>核可</a></button>
                </td>";
             }
            
            ?>
           
			


			</table>
		</div>
		<?php
	
		
		
	}?>
	</body>

</html>