<?php
$DP=$_GET['D'];
$CN=mysql_connect("LocalHost","Root","");
	mysql_select_db("jamesthew",$CN);
$DS = mysql_query("Select Email from tblmember where Email='$EM'",$CN);
		 mysql_close($CN);
		if(mysql_num_rows($DS) > 0)
{
	echo "<img src='Symbols/wrong.png'><font color=red>Already exist!</font>"; }
else
{ echo "<img src='Symbols/OK.png'><font color=green>Email available.</font>"; }


?>