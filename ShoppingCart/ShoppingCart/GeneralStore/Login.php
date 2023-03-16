<?php
session_start();
$_SESSION['FName'] ="";
$_SESSION['Email'] ="";
if(isset($_POST['btnLogin']))
{
	$EM = $_POST['txtEmail'];
	$PW = $_POST['txtPass'];
	$CN = mysql_connect("LocalHost","root","");
		  mysql_select_db("GeneralStoreDB",$CN);
	$DS = mysql_query("Select FullName, Email from tblCustomers Where Email='$EM' and UPass='$PW'",$CN);
		  mysql_close($CN);
		  if(mysql_num_rows($DS) > 0)
		  {
		  	$Row = mysql_fetch_array($DS);
		  	$_SESSION['FName'] = $Row[0]; //FullName
		  	$_SESSION['Email'] = $Row[1]; //Email
		  	echo "<meta http-equiv='Refresh'; Content='0; URL=Home.php'>";
		  }
		  else
		  { echo "Try again ..."; }
}
?>
<html>
<head><title>:: Login Please ::</title></head>
<body>
<Form action="Login.php" Method="POST">
<table border=1 cellpadding=5 cellspacing=5 align=Right>
<tr>
<td bgcolor=LightGreen>Email</td>
<td><input type=Email name=txtEmail Required></td>
</tr>
<tr>
<td bgcolor=LightGreen>Password</td>
<td><input type=Password name=txtPass Required></td>
</tr>
<tr>
<td><a href="Register.php"><img src='Products/Register.png'></a></td>
<td align=Right><input type=Submit name=btnLogin Value=Login></td>
</tr>
</table>
</Form>
</body>
</html>