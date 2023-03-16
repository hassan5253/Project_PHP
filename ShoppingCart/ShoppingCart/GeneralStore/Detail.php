<?php
if(isset($_POST['btnAdd']))
{
	$A = $_POST['txtID'];
	$B = $_POST['txtPrice'];
	$C = $_POST['txtQTY'];
	$D = $B * $C;
	$E = $_SERVER['REMOTE_ADDR'];
	$CN = mysql_connect("LocalHost","root","");
		  mysql_select_db("GeneralStoreDB",$CN);
		  mysql_query("Insert into tblOrder values ('','$A','$B','$C','$D','$E')",$CN);
		  mysql_close($CN);
		  echo "<meta http-equiv='Refresh'; Content='0; URL=Detail.php?PID=$A'>";
}
?>
<html>
<head><title>:: Product Detail ::</title></head>
<body>
<?php
	$ID = $_GET['PID'];
	$CN = mysql_connect("LocalHost","root","");
		  mysql_select_db("GeneralStoreDB",$CN);
	$DS = mysql_query("Select * from tblProducts Where PID='$ID'",$CN);
		  mysql_close($CN);
	$TL = mysql_num_rows($DS);
	$RW = mysql_fetch_array($DS);
?>
<form action="Detail.php" Method="POST">
<table border=1 cellPadding=5 cellSpacing=5 align=center>
<input type=Hidden name=txtID Value="<?php echo $ID; ?>">

<tr>
<td align=center colspan=2>
<?php echo "<img src='Products/$RW[0].png' width=300 height=300 border=4>"?></td>
</tr>

<tr>
<td bgcolor=lightGreen>Name</td>
<td><?php echo $RW[1]; ?></td>
</tr>

<tr>
<td bgcolor=lightGreen>Price</td>
<td><input type=Text Name=txtPrice ReadOnly Value="<?php echo $RW[2]; ?>"></td>
</tr>

<tr>
<td bgcolor=lightGreen>Quantity</td>
<td><input type=Text name=txtQTY Required PlaceHolder="Enter Quantity">
<input type=Submit name=btnAdd Value=Add></td>
<tr>

</table>
</form>
</body>
</html>