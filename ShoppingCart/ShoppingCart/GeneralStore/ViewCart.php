<?php
$IP = $_SERVER['REMOTE_ADDR'];
if(isset($_GET['OID']))
{
	$A = $_GET['OID']; //OID.
	$CN = mysql_connect("LocalHost","root","");
		  mysql_select_db("GeneralStoreDB",$CN);
		  mysql_query("Delete from tblOrders where OID='$A'",$CN);
		  mysql_close($CN);
		  echo "<meta http-equiv='Refresh'; Content='0; URL=ViewCart.php'>";
}
?>
<html>
<head><title>:: General Store Web ::</title>
</head>
<body>

<table border=1 cellPadding=5 cellSpacing=5 align=Left>
<tr bgcolor=LightGreen><th colspan=5>Your Selected Products</th></tr>
<tr bgcolor=LightGreen><th>Image</th> <th>Product-Name</th> <th>Price</th> <th>QTY</th> <th>Delete</th></tr>
<?php
	$CN = mysql_connect("LocalHost","root","");
		  mysql_select_db("GeneralStoreDB",$CN);
	$DS = mysql_query("Select O.OID, O.PID, P.ProductName, O.Price, O.QTY from tblProducts P, tblOrders O Where P.PID=O.PID and O.Email='$IP'",$CN);
		  mysql_close($CN);
	$TL = mysql_num_rows($DS);
	for($a=0; $a<$TL; $a++)
	{
		$Row = mysql_fetch_array($DS);
		echo "<tr>";
		echo "<td align=center><img src='Products/$Row[1].png' width=50 height=50></td>"; //PID
		echo "<td>$Row[2]</td>"; //PName
		echo "<td>$Row[3]</td>"; //Price
		echo "<td>$Row[4]</td>"; //Quantity
		echo "<td><a href='ViewCart.php?OID=$Row[0]'><img src='Products/Delete.jpg' width=50 height=50></a></td>";
		echo "</tr>";
	}
	echo "<tr bgcolor=LightGreen><th colspan=5>Available Products: $TL</th></tr>";
?>
</table>

<table border=1 cellPadding=5 cellSpacing=5 align=Right>
<tr bgcolor=LightGreen><th colspan=2>Shopping cart Status</th></tr>
<?php
	$CN = mysql_connect("LocalHost","root","");
		  mysql_select_db("GeneralStoreDB",$CN);
	$DS = mysql_query("select count(PID), Sum(Price) from tblOrders Where Email='$IP'",$CN);
		  mysql_close($CN);
	$TL = mysql_num_rows($DS);
	$Row = mysql_fetch_array($DS);
	echo "<tr bgcolor=LightGreen><th>Products</th>  <td align=center>$Row[0]</td></tr>"; //Total Products.
	echo "<tr bgcolor=LightGreen><th>Total Bill</th><td align=center>$Row[1]</td></tr>"; //Total Bill
	echo "<tr><th colspan=2><a href='Login.php'><img src='Products/CheckOut.png'></a></th></tr>";
?>
</table>
</body>
</html>