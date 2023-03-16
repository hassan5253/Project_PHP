<?php
session_start();
$UID = $_SESSION['UID'];
$FNM = $_SESSION['FName'];
if(isset($_POST['btnSave']))
{
	$CT = $_POST['txtType'];
	$CD = $_POST['txtDesc'];
	$DT = date('d-M-Y');
	$CN = mysql_connect("LocalHost","root","");
		  mysql_select_db("ComplaintDB",$CN);
		  mysql_query("Insert into tblComplaint values ('','$UID','$CT','$CD','Not-Solved','$DT')",$CN);
		  mysql_close($CN);
}
?>
<?php
if(isset($_GET['CID']))
{
	$CID = $_GET['CID'];
	$CN = mysql_connect("LocalHost","root","");
		  mysql_select_db("ComplaintDB",$CN);
		  mysql_query("Update tblComplaint Set Del='false' where CID='$CID'",$CN);
		  mysql_close($CN);
}
?>

<html>
<head><title>:: Home ::</title></head>
<body>
<?php echo "<h2 align=center>Welcome $FNM </h2>"; ?>
<Form action="Home.php" Method="POST">
<table border=1 cellpadding=5 cellspacing=5 align=Center>
<tr>
<td bgcolor=LightGreen>Complaint-Type</td>
<td><Select name=txtType>
<?php
$CN = mysql_connect("LocalHost","root","");
	  mysql_select_db("ComplaintDB",$CN);
$DS = mysql_query("Select CType from tblType",$CN);
	  mysql_close($CN);
$TL = mysql_num_rows($DS);
for($a=0; $a<$TL; $a++)
{
	$R = mysql_fetch_array($DS);
	echo "<option>$R[0]</option>";
}
?>
</select></td>
</tr>
<tr>
<td bgcolor=LightGreen>Description</td>
<td><TextArea name=txtDesc rows=10 cols=15 maxlength=95>Enter Description</TextArea></td>
</tr>

<tr>
<td><a href="Index.php"><img src='Products/Logout.png'></a></td>
<td align=Right><input type=Submit name=btnSave Value=Save></td>
</tr>
</table>
</Form>

<hr>
<h2 align=Center>View Complaint History </h2>
<table border=1 CellPadding=5 CellSpacing=5 align=Center>
<tr bgColor=lightblue>
<th>CID</th>   <th>Type</th> <th>Description</th> <th>Status</th> <th>Date</th> <th>Delete</th></tr>
</tr>

<?php
$UID = $_SESSION['UID'];
$CN = mysql_connect("LocalHost","root","");
	  mysql_select_db("ComplaintDB",$CN);
$DT = mysql_query("Select * from tblComplaint Where UID='$UID' and Del='True'",$CN);
	  mysql_close($CN);
$TL = mysql_num_rows($DT);
for($a=0; $a<$TL; $a++)
{
	$Row = mysql_fetch_array($DT);
	echo "<tr>";
	echo "<td>$Row[0]</td>"; //CID.
	echo "<td>$Row[2]</td>"; //Type
	echo "<td>$Row[3]</td>"; //Desc
	echo "<td>$Row[4]</td>"; //Status
	echo "<td>$Row[5]</td>"; //DateTime
	echo "<td><a href='Home.php?CID=$Row[0]'><img src='Products/Delete.jpg'></td>";
	echo "</tr>";
}
?>
</table>
<h3 align=Center>Total Complaints: <?php echo $TL; ?> </h3>
</body>
</html>