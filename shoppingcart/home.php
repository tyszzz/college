<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>高大購物網</title>
</head>
<frameset rows="20%,*" border=0 >
	<frame src="head.php?account=<?echo $a?>&pwd=<?echo $p?>&login=<?php echo $login?>" name=head scrolling=no>
	<frame src="main.php?account=<?echo $a?>&pwd=<?echo $p?>&login=<?php echo $login?>" name=main scrolling=no>
</frame>

</html>