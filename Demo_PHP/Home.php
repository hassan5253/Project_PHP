<?php
session_start();
if($_SESSION['UID'] == '')
{ echo "<meta http-equiv='Refresh'; Content='0; URL=Login.php'>"; exit;}
else
{

 $UID = $_SESSION['UID'];
 $UNM = $_SESSION['UName'];

 echo "<h3>Yahoo! Home Page </h3>";
 echo "<img src='EMP/$UID.png'> <br> $UNM ";
 echo "<a href='Login.php'>Logout</a>";
}
?>

<?php
if(isset($_POST['btnSend']))
{
	$TU = $_POST['ToUser'];
	$FU = $_SESSION['UID'];
	$MG = $_POST['txtMSG'];
	$DT = date('d-M-Y');
	$CN = mysql_connect("LocalHost","root","");
		  mysql_select_db("EMPDB",$CN);
		  mysql_query("Insert into tblMSG values ('','$FU','$TU','$MG','$DT')",$CN);
		  mysql_close($CN);
}
?>
<html>
<body>
<h4 align=Center>Yahoo! Enter Message </h4>
<Form action="Home.php" Method="POST">
<table border=1 cellpadding=5 cellspacing=5 align=Center>

<tr>
<td bgcolor=Aqua>To</td>
<td><select name=ToUser>
<?php
$CN = mysql_connect("LocalHost","root","");
	  mysql_select_db("EMPDB",$CN);
$DS = mysql_query("Select UName from tblUser",$CN);
	  mysql_close($CN);
$TL = mysql_num_rows($DS);
for($a=0; $a<$TL; $a++)
{
	$Row = mysql_fetch_array($DS);
	echo "<option>$Row[0]</option>";
}
?>
</select>
</td>
</tr>

<tr>
<td bgcolor=Aqua>Message</td>
<td><input type=Text name=txtMSG Required></td>
</tr>

<tr>
<td bgcolor=Aqua></td>
<td align=Right><input type=Submit name=btnSend Value=Send></td>
</tr>

</table>
</Form>


<hr>
<h2 align=Center>View Message History </h2>
<table border=1 CellPadding=5 CellSpacing=5 align=Center>
<tr bgColor=lightblue>
<th>MID</th>   <th>From</th> <th>Message</th><th>Date</th> </tr>
</tr>
<?php
$FU = $_SESSION['UName'];
$CN = mysql_connect("LocalHost","root","");
	  mysql_select_db("EmpDB",$CN);
$DT = mysql_query("Select MID, FromUser, Subject, Date_Time from tblMSG Where ToUser='$FU'",$CN);
	  mysql_close($CN);
$TL = mysql_num_rows($DT);
for($a=0; $a<$TL; $a++)
{
	$Row = mysql_fetch_array($DT);
	echo "<tr>";
	echo "<td>$Row[0]</td>"; //MID.
	echo "<td><img src='EMP/$Row[1].png' width=50 height=50></td>"; //From.
	echo "<td>$Row[2]</td>"; //MSG.
	echo "<td>$Row[3]</td>"; //Date.
	echo "</tr>";
}
?>
</table>
<h3 align=Center>Total Messages: <?php echo $TL; ?> </h3>

</body>
</html>
