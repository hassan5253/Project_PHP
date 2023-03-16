<?php
session_start();
$A = $_SESSION['UID'];
$B = $_SESSION['FName'];
$C = $_SESSION['Email'];
if($A == '' && $B == '')
{ echo "<meta http-equiv='Refresh'; Content='0; URL=Index.php'>"; exit;}
?>

<?php
if(isset($_GET['ID']))
{
$ID = $_GET['ID'];
$CN = mysql_connect("LocalHost","root","");
	  mysql_select_db("FriendRequestDB",$CN);
	  mysql_query("Insert into tblFriendRequest values ('','$A','$ID','False','$B')",$CN);
	  mysql_close($CN);
	  echo "<meta http-equiv='Refresh'; Content='0; URL=Home.php'>";
}
?>

<html>
<head><title>:: Home ::</title></head>
<body>
<table border=1 cellpadding=5 cellspacing=5 align=Right>
<tr align=center bgcolor=LightGreen><td colspan=3>Welcome to Home</td></tr>
<tr align=center>
<?php
echo "<td><img src='Photos/$A.png' width=30 height=30 border=2></td>";
echo "<td bgcolor=LightGreen>$B</td>";
echo "<td><a href='Index.php'><img src='Photos/Logout.png' width=30 height=30></a></td>";
?>
</tr>
<tr align=center bgcolor=LightGreen><td colspan=3><a href='Confirm.php'>Show Friend Requests</a></td>
</table>

<table border=0 CellPadding=5 CellSpacing=5 align=Left>
<?php
$CN = mysql_connect("LocalHost","root","");
	  mysql_select_db("FriendRequestDB",$CN);
$DT = mysql_query("Select * from tblPrimaryUsers Where Email not in ('$C')",$CN);
	  mysql_close($CN);
$TL = mysql_num_rows($DT);
for($a=0; $a<$TL; $a++)
{
	$Row = mysql_fetch_array($DT);
	echo "<tr bgcolor=LightGreen>";
	echo "<td><img src='Photos/$Row[0].png' width=30 height=30 border=3></td>"; //UID.
	echo "<td>$Row[1]</td>"; //FullName
	echo "<td><a href='Home.php?ID=$Row[0]'><img src='Photos/AddFrnd.png'></td>"; //AddFriend
	echo "</tr>";
}
?>
</table>

</body>
</html>
