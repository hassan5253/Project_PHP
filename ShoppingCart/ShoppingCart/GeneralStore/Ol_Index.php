<html>
<head><title>:: General Store Web ::</title>
<script type="text/javascript" src="Library/jquery-1.10.1.min.js"></script>
<script type="text/javascript" src="Library/jquery.fancybox.js?v=2.1.5"></script>
<link rel="stylesheet" type="text/css" href="Library/jquery.fancybox.css?v=2.1.5" />
<script type="text/javascript">
$(document).ready(function(){ $('.fancybox').fancybox();});
</script>
</head>
<body>

<table border=1 cellPadding=5 cellSpacing=5 align=Left>
<tr bgcolor=LightGreen><th colspan=4>General Store Online Shopping</th></tr>
<tr bgcolor=LightGreen><th>Image</th><th>Product-Name</th><th>Price</th><th>Add-Cart</th></tr>
<?php
	$CN = mysql_connect("LocalHost","root","");
		  mysql_select_db("GeneralStoreDB",$CN);
	$DS = mysql_query("Select * from tblProducts Where Status='True'",$CN);
		  mysql_close($CN);
	$TL = mysql_num_rows($DS);
	for($a=0; $a<$TL; $a++)
	{
		$Row = mysql_fetch_array($DS);
		echo "<tr>";
		echo "<td align=center><img src='Products/$Row[0].png' width=50 height=50></td>"; //PID
		echo "<td>$Row[1]</td>"; //PName
		echo "<td>$Row[2]</td>"; //Price
		echo "<td><a class='fancybox fancybox.iframe' href='Detail.php?PID=$Row[0]'><img src='Products/AddCart.jpg' width=50 height=50></a></td>";
		echo "</tr>";
	}
echo "<tr bgcolor=LightGreen><th colspan=4>Available Products: $TL</th></tr>";
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
	echo "<tr bgcolor=LightGreen><th colspan=2><a href='Index.php'>Refresh</a></th></tr>";
	echo "<tr bgcolor=LightGreen><th colspan=2><a href='MyCart.php'><img src='Products/Checkout.png'></a></th></tr>";
?>
</table>
</body>
</html>