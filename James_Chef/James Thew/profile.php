<?php
if(isset($_GET['A']))
{
	$UID = $_GET['A'];
	$CN = mysql_connect("LocalHost","root","");
		  mysql_select_db("jamesthew",$CN);
		  mysql_query("Update tblmember set Status='False' Where UID='$UID'",$CN);
		  mysql_close($CN);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Chef James Thew</title>
</head>
<style type="text/css">
	.heading
	{
		color:#0099FF;
		font-weight:bolder;
		font-size:20px;
	}
	.txt
	{
		font-family:Verdana, Arial, Helvetica, sans-serif;
		font-size:12px;
	}
</style>
<body>
<table width="350" border="0" cellspacing="5" cellpadding="5" align="center" bgcolor="#F4FAFF" style="border:1px solid #0099FF;">
<tr>
    <th class="heading" align="center" style="border-bottom:1px solid #0099FF;"> UID </th>
    <th  class="heading" align="center" style="border-bottom:1px solid #0099FF;"> UName</th>
    <th  class="heading" align="center" style="border-bottom:1px solid #0099FF;"> Password</th>
    <th class="heading" align="center" style="border-bottom:1px solid #0099FF;"> Email</th>
    <th  class="heading" align="center" style="border-bottom:1px solid #0099FF;"> Gender</th>
    <th  class="heading" align="center" style="border-bottom:1px solid #0099FF;"> Country</th>
    <th class="heading" align="center" style="border-bottom:1px solid #0099FF;"> charges</th>
    <th class="heading" align="center" style="border-bottom:1px solid #0099FF;"> Status</th>
    <th  class="heading" align="center" style="border-bottom:1px solid #0099FF;"> Edit</th>
    <th class="heading" align="center" style="border-bottom:1px solid #0099FF;"> Delete</th>
 </tr>
  <?php
		 $CN = mysql_connect("LocalHost","root","");
  			mysql_select_db("jamesthew",$CN);
  		$DT = mysql_query("Select * from tblmember Where Status='True'",$CN);
				 mysql_close($CN);
		$TL = mysql_num_rows($DT);
			
		for($a=0; $a<$TL; $a++)
			{
				$Row=mysql_fetch_array($DT);
				echo "<tr>";
				echo "<td>$Row[0]</td>";
				echo "<td>$Row[1]</td>";
				echo "<td>$Row[2]</td>";
				echo "<td>$Row[4]</td>";
				echo "<td>$Row[5]</td>";
				echo "<td>$Row[6]</td>";
				echo "<td>$Row[7]</td>";
				echo "<td>$Row[8]</td>";
				echo "<td><a href='Edit.php?A=$Row[0]&B=$Row[1]&C=$Row[2]&D=$Row[4]&E=$Row[5]&F=$Row[6]&G=$Row[7]&H=$Row[8]'>Edit</a></td>";
				echo "<td><a href='Profile.php?A=$Row[0]'>Delete</a></td>";
							
			}
  
  
  ?>
</table>
 <br>
	  <h3 align=center>Total Records: <?php echo $TL; ?> </h3>
</body>

</html>
