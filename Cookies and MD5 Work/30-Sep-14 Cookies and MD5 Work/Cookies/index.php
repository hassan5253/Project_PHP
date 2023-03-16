<?php
if(isset($_POST['btnLogin']))
{
	$EM = $_POST['txtEmail'];
	$PW = $_POST['txtPass'];
	$EM = md5($EM);
	$PW = md5($PW);
	$CN = mysql_connect("LocalHost","root","");
		  mysql_select_db("AirLineDB",$CN);
	$AB	= mysql_query("Select FullName from tblUsers Where Email='$EM' and Upass='$PW'",$CN);
		  mysql_close($CN);
	$TL = mysql_num_rows($AB);
	if($TL > 0)
	{  echo "<p align=right>Welcome to my site...</p>"; }
	else
	{  echo "<p align=right>Invalid Info. Try again...</p>"; }
}
?>
<html>
<body>
<form action="Index.php" Method="POST">
<table border=1 cellPadding=5 cellSpacing=5 align=right>

<tr>
<td bgcolor=LightGreen>Email</td>
<td><input type=Text name=txtEmail Required PlaceHolder="Enter Email"></td>
</tr>

<tr>
<td bgcolor=LightGreen>Password</td>
<td><input type=Password name=txtPass Required PlaceHolder="Enter Password"></td>
</tr>

<tr>
<td bgcolor=LightGreen><a href="Register.php">Register</a></td>
<td><input type=Submit name=btnLogin Value=Login></td>
</tr>

</table>
</form>
</body>
</html>