<?php
if(isset($_POST['btnDelete']))
{
	setcookie("A","",time()-3600);
	setcookie("B","",time()-3600);
	echo "<p align=center>Cookies Deleted ...</p>";
}
else
{
	echo "Email: ".$_COOKIE['A']."<br>";
	echo "Passw: ".$_COOKIE['B']."<br>";
}
?>
<html>
<body>
<form action="ShowCookies.php" Method="POST">
<table border=1 cellPadding=5 cellSpacing=5 align=right>
<tr>
<td bgcolor=LightGreen><a href="Cookies.php">Back</a></td>
<td><input type=Submit name=btnDelete Value=Delete></td>
</tr>
</table>
</form>
</body>
</html>