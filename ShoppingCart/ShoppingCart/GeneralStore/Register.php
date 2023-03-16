<?php
if(isset($_POST['btnSave']))
{
	$FN = $_POST['txtFName'];
	$PH = $_POST['txtPhone'];
	$AD = $_POST['txtAdres'];
	$EM = $_POST['txtEmail'];
	$PW = $_POST['txtPass'];
	$IP = $_SERVER['REMOTE_ADDR'];
	$CN = mysql_connect("LocalHost","root","");
		  mysql_select_db("GeneralStoreDB",$CN);
		  mysql_query("Insert into tblCustomers values ('','$FN','$PH','$AD','$EM','$PW')",$CN);
		  mysql_query("Update tblOrders Set Email='$EM' Where Email='$IP'",$CN);
		  mysql_close($CN);
		  echo "Data Saved...";
}
?>
<html>
<head><title>:: Register Please ::</title></head>
<body>
<h1 align=center>Register Please ...</h1>
<Form action="Register.php" Method="POST">
<table border=1 cellpadding=5 cellspacing=5 align=center>

<tr>
<td bgcolor=LightGreen>Full-Name</td>
<td><input type=Text name=txtFName Required PlaceHolder="Enter Full Name"></td>
</tr>

<tr>
<td bgcolor=LightGreen>Phone-No</td>
<td><input type=Text name=txtPhone Required PlaceHolder="Enter Phone No"></td>
</tr>

<tr>
<td bgcolor=LightGreen>Address</td>
<td><input type=Text name=txtAdres Required PlaceHolder="Enter Full Address"></td>
</tr>

<tr>
<td bgcolor=LightGreen>Email</td>
<td><input type=Email name=txtEmail Required PlaceHolder="Enter Email"></td>
</tr>

<tr>
<td bgcolor=LightGreen>Password</td>
<td><input type=Text name=txtPass Required PlaceHolder="Enter Password"></td>
</tr>

<tr>
<td><a href="Login.php"><img src='Products/Login.jpg'></a></td>
<td align=Right><input type=Submit name=btnSave Value=Save></td>
</tr>

</table>
</Form>
</body>
</html>