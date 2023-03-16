<?php
session_start();
$IP = $_SESSION['Email'];
$FN = $_SESSION['FName'];
?>
<html>
<head><title>:: General Store Web ::</title>
</head>
<body>
<h2 align=center>Welcome <?php echo $FN; ?> to Shopping Cart</h2>
<table border=1 cellPadding=5 cellSpacing=5 align=Left>
<tr bgcolor=LightGreen><th colspan=4>Your Selected Products</th></tr>
<tr bgcolor=LightGreen><th>Image</th> <th>Product-Name</th> <th>Price</th> <th>QTY</th></tr>
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
		echo "</tr>";
	}
	echo "<tr bgcolor=LightGreen><th colspan=4>Available Products: $TL</th></tr>";
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
	echo "<tr><th colspan=2><a href=''>Go to PayPal</a></th></tr>";
	echo "<tr><th colspan=2><a href='Index.php'><img src='Products/Logout.png'></a></th></tr>";
?>
</table>
</body>
</html>