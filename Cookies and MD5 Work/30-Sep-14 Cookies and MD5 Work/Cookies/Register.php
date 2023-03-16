<?php
if(isset($_POST['btnSave']))
{
	$FN = $_POST['txtName'];
	$EM = $_POST['txtEmail'];
	$PW = $_POST['txtPass'];
	$EM = md5($EM);
	$PW = md5($PW);
	$CN = mysql_connect("LocalHost","root","");
		  mysql_select_db("AirLineDB",$CN);
		  mysql_query("Insert into tblUsers values ('','$FN','$EM','$PW')",$CN);
		  mysql_close($CN);
		  echo "<p align=right>Data Saved ...</p>";

}
?>
<html>
<body>
<form action="Register.php" Method="POST">
<table border=1 cellPadding=5 cellSpacing=5 align=right>

<tr>
<td bgcolor=LightGreen>FullName</td>
<td><input type=Text name=txtName Required PlaceHolder="Enter Email"></td>
</tr>


<tr>
<td bgcolor=LightGreen>Email</td>
<td><input type=Email name=txtEmail Required PlaceHolder="Enter Email"></td>
</tr>

<tr>
<td bgcolor=LightGreen>Password</td>
<td><input type=text name=txtPass Required PlaceHolder="Enter Password"></td>
</tr>

<tr>
<td bgcolor=LightGreen><a href="Index.php">Login</a></td>
<td><input type=Submit name=btnSave Value=Save></td>
</tr>

</table>
</form>
</body>
</html>