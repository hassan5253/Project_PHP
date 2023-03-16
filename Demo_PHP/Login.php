<?php
session_start();
$_SESSION['UID'] ="";
$_SESSION['UName'] ="";
if(isset($_POST['btnLogin']))
{
	$EM = $_POST['txtEmail'];
	$PW = $_POST['txtPass'];
	$CN = mysql_connect("LocalHost","root","");
		  mysql_select_db("EMPDB",$CN);
	$DS = mysql_query("Select UID, UName from tblUser Where UName='$EM' and UPass='$PW'",$CN);
		  mysql_close($CN);
		  if(mysql_num_rows($DS) > 0)
		  {
		  	$Row = mysql_fetch_array($DS);
		  	$_SESSION['UID'] = $Row[0];
		  	$_SESSION['UName'] = $Row[1];
		  	echo "<meta http-equiv='Refresh'; Content='0; URL=Home.php'>";
		  }
		  else
		  { echo "Try again ..."; }

}
?>
<html>
<body>
<h4 align=Right>Yahoo! Login Please ...</h4>
<Form action="Login.php" Method="POST">
<table border=1 cellpadding=5 cellspacing=5 align=Right>
<tr>
<td bgcolor=Aqua>Email</td>
<td><input type=Email name=txtEmail Required></td>
</tr>
<tr>
<td bgcolor=Aqua>Password</td>
<td><input type=Password name=txtPass Required></td>
</tr>
<tr>
<td bgcolor=Aqua><a href="Signup.php">Signup</a></td>
<td align=Right><input type=Submit name=btnLogin Value=Login></td>
</tr>
</table>
</Form>
</body>
</html>