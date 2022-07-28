<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body bgcolor=orange>
    <?php
		session_start();
		include("connection.php");
		$I_number=$_GET["I_number"];
        $sql_query ="select * from item where I_number like '%01' order by I_number";
        $result = mysql_query($sql_query);
		
		echo '<div style="height:595px;overflow-y:auto">';
        echo '<center><table width=100% border=0>';
		echo "<tr align=center>
				<td colspan=3><font size=7 face='標楷體' color=blue>商品目錄</font>";
        $cnt=0;
        while($row=mysql_fetch_array($result))
        {
            if($cnt%3==0){echo'<tr>';}
            $cnt++;
            echo'<td width=20%><center><img src='.$row[3].' width=200 hight=200><br>';
			$tempname[$cnt]=$row[1];
			$number[$cnt]=$row[0];
			$typeray[$cnt]=$row[4];
			if($cnt==3)
			{	
				echo '<tr align=center>';
				for($i=1;$i<=3;$i++)
				{
					echo"<td><a href=item.php?loginornot=".$flag."&I_number=".$number[$i]."&type=".$typeray[$i]."><font size=5 face='標楷體'>".$tempname[$i]."</font></a>";
				}
				$cnt=0;
			}
            
        }

		echo '</table></div>';
		
    ?>
</body>
</html>