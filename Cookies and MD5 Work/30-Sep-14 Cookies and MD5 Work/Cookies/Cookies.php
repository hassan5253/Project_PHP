<?php
if(isset($_POST['btnLogin']))
{
	$EM = $_POST['txtEmail'];
	$PW = $_POST['txtPass'];
	setcookie("A",$EM,time()+3600);
	setcookie("B",$PW,time()+3600);
	echo "<p align=center>Cookies Saved ...</p>";
}
?>
<html>
<body>
<form action="Cookies.php" Method="POST">
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
<td bgcolor=LightGreen><a href="ShowCookies.php">ShowCookies</a></td>
<td><input type=Submit name=btnLogin Value=Login></td>
</tr>

</table>
</form>
</body>
</html>