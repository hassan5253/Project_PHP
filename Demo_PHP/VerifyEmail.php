<?php
$DP = $_GET['D'];
$CN = mysql_connect("LocalHost","root","");
	  mysql_select_db("EmpDB",$CN);
$DT = mysql_query("Select UName from tblUser Where UName='$DP'",$CN);
	  mysql_close($CN);
if(mysql_num_rows($DT) > 0)
{ echo "<img src='Symbols/Wrong.png'><font color=red>Already exist!</font>"; }
else
{ echo "<img src='Symbols/OK.png'><font color=green>Email available.</font>"; }

?>
