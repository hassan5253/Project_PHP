<?php
if(isset($_POST['btnSave']))
{
	$EM = $_POST['txtEmail'];
	$PW = $_POST['txtPass'];
	$SQ = $_POST['cmbQuest'];
	$SA = $_POST['txtAns'];
	$CN = mysql_connect("LocalHost","root","");
		  mysql_select_db("EMPDB",$CN);
		  mysql_query("Insert into tblUser values ('','$EM','$PW','$SQ','$SA')",$CN);
		  mysql_close($CN);
		  echo "Data Saved...";
}
?>
<html>
<head>
<script>
function CheckEmail(A)
{
	var ABC = new XMLHttpRequest();
	ABC.open("GET","VerifyEmail.php?D="+A,true);
	ABC.send();
	ABC.onreadystatechange=function()
	{
		if(ABC.readyState==4 && ABC.status==200)
		{ document.getElementById("Data").innerHTML = ABC.responseText; }
	}
}

function CheckPass(B)
{
	var iLen = B.length;
	if(iLen>=1 && iLen<=6)
	{ document.getElementById("UPass").innerHTML = "<img src='Symbols/Weak.png'>";   }
	else if(iLen>=7 && iLen<=12)
	{ document.getElementById("UPass").innerHTML = "<img src='Symbols/Medium.png'>"; }
	else if(iLen>=13 && iLen<=20)
	{ document.getElementById("UPass").innerHTML = "<img src='Symbols/Strong.png'>"; }
}
</script>
</head>
<body>
<h1 align=center>Yahoo! Signup Please ...</h1>
<Form action="Signup.php" Method="POST">
<table border=1 cellpadding=5 cellspacing=5 align=center>

<tr>
<td bgcolor=Aqua>Email</td>
<td><input type=Email name=txtEmail Required onBlur="CheckEmail(this.value)">
<div id="Data"></div></td>
</tr>

<tr>
<td bgcolor=Aqua>Password</td>
<td><input type=Text name=txtPass Required onKeyUp="CheckPass(this.value)">
<div id="UPass"></div></td>
</tr>

<tr>
<td bgcolor=Aqua>Secret Quest</td>
<td><Select name=cmbQuest>
<option>Favourite Book</option>
<option>Childhood School</option>
<option>First Birth Place</option>
<option>Favourite Teacher</option>
</select>
</td>
</tr>

<tr>
<td bgcolor=Aqua>Answer</td>
<td><input type=Text name=txtAns Required></td>
</tr>

<tr>
<td bgcolor=Aqua><a href="Login.php">Login</a></td>
<td align=Right><input type=Submit name=btnSave Value=Save></td>
</tr>

</table>
</Form>
</body>
</html>