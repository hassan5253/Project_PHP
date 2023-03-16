<?php
session_start();
$A = $_SESSION['UID'];
$B = $_SESSION['FName'];
$C = $_SESSION['Email'];
if($A == '' && $B == '')
{ echo "<meta http-equiv='Refresh'; Content='0; URL=Index.php'>"; exit;}
?>

<?php
if(isset($_GET['RID']))
{
$RID = $_GET['RID'];
$CN = mysql_connect("LocalHost","root","");
	  mysql_select_db("FriendRequestDB",$CN);
	  mysql_query("Update tblFriendRequest Set FStatus='True' Where RID='$RID'",$CN);
	  mysql_close($CN);
	  echo "<meta http-equiv='Refresh'; Content='0; URL=Confirm.php'>";
}
?>
<html>
<head><title>:: Confirm Friend ::</title></head>
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
<tr align=center bgcolor=LightGreen><td colspan=3><a href='Home.php'>Back to Home</a></td>
</table>

<table border=0 CellPadding=5 CellSpacing=5 align=Left>
<?php
$CN = mysql_connect("LocalHost","root","");
	  mysql_select_db("FriendRequestDB",$CN);
$DT = mysql_query("Select * from tblFriendRequest Where DestinationID='$A' and FStatus='False'",$CN);
	  mysql_close($CN);
$TL = mysql_num_rows($DT);
for($a=0; $a<$TL; $a++)
{
	$Row = mysql_fetch_array($DT);
	echo "<tr bgcolor=LightGreen>";
	echo "<td><img src='Photos/$Row[1].png' width=30 height=30 border=3></td>"; //SourceID
	echo "<td>$Row[4]</td>"; //FullName
	echo "<td><a href='Confirm.php?RID=$Row[0]'><img src='Photos/Confirm.png'></td>"; //Confirm
	echo "</tr>";
}
?>
</table>