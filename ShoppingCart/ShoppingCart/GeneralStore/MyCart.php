<html>
<head><title>:: General Store Web ::</title>
</head>
<body>
<table border=1 cellPadding=5 cellSpacing=5 align=Left>
<tr bgcolor=LightGreen><th colspan=6>My Cart Status</th></tr>
<tr bgcolor=LightGreen><th>Image</th><th>Product-Name</th><th>Price</th><th>Qty</th> <th>Total</th> <th>Detail</th></tr>
<?php
	$IP = $_SERVER['REMOTE_ADDR'];
	$CN = mysql_connect("LocalHost","root","");
		  mysql_select_db("GeneralStoreDB",$CN);
	$DS = mysql_query("Select O.OID, P.PID, P.ProductName, O.Price, O.Quantity, O.Total from tblProducts P, tblOrder O Where P.PID = O.PID and O.IPAdres='$IP'",$CN);
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
		echo "<td>$Row[5]</td>"; //Total
		echo "<td><a href='MyCart.php?OID=$Row[0]'>Delete</a></td>";
		echo "</tr>";
	}
echo "<tr bgcolor=LightGreen><th colspan=6>Available Products: $TL</th></tr>";
?>
</table>

<table border=1 cellPadding=5 cellSpacing=5 align=Right>
<tr bgcolor=LightGreen><th colspan=2>Shopping cart Status</th></tr>
<?php
	$IP = $_SERVER['REMOTE_ADDR'];
	$CN = mysql_connect("LocalHost","root","");
		  mysql_select_db("GeneralStoreDB",$CN);
	$DS = mysql_query("select count(PID), Sum(Total) from tblOrder Where IPAdres='$IP'",$CN);
		  mysql_close($CN);
	$TL = mysql_num_rows($DS);
	$Row = mysql_fetch_array($DS);
	echo "<tr bgcolor=LightGreen><th>Products</th>  <td align=center>$Row[0]</td></tr>"; //Total Products.
	echo "<tr bgcolor=LightGreen><th>Total Bill</th><td align=center>$Row[1]</td></tr>"; //Total Bill
?>
</table>
</body>
</html>