<?php
session_start();
$_SESSION['UID']="";
$_SESSION['UName']="";

	
if(isset($_POST['btnLogin']))
{
		$UN=$_POST['txtname'];
		$PW=$_POST['txtpass'];
		
		/*include "ConnectDB.inc";
		$xDB=new ConnectDB();
		$xDB->SELECTDATA("Select UID,UName from tbl_admin where UName='$UN' and Password='$PW'");*/
		
		$CN = mysql_connect("LocalHost","root","");
		  		mysql_select_db("jamesThew",$CN);
		$DS = mysql_query("Select UID,UName from tbl_admin where UName='$UN' and Password='$PW'",$CN);
		$DT = mysql_query("Select UID,UName from tblmember where UName='$UN' and Password='$PW'",$CN);
		 mysql_close($CN);
		if(mysql_num_rows($DS) > 0)
		{
			$Row=mysql_fetch_array($DS);
			$_SESSION['UID']=$Row[0];
			$_SESSION['UName']=$Row[1];
			echo "<meta http-equiv='Refresh'; Content='0; URL=Home.php'>";
		}
		else if(mysql_num_rows($DT) > 0)
		{
			$Row=mysql_fetch_array($DT);
			$_SESSION['UID']=$Row[0];
			$_SESSION['UName']=$Row[1];
			echo "<meta http-equiv='Refresh'; Content='0; URL=Home.php'>";
		}
		else
		{	echo "try again";}
}

?>
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
<Form action="login.php" Method="POST">
<table width="350" border="0" cellspacing="0" cellpadding="5" align="center" bgcolor="#F4FAFF" style="border:1px solid #0099FF;">
<tr>
    <td colspan="2" class="heading" align="center" style="border-bottom:1px solid #0099FF;"> - LOGIN - </td>
  </tr>
  <tr>
    <td colspan="2" class="heading" align="center" height="10"></td>
  </tr>
<tr>
<td >Username :</td>
<td><input type='text' name='txtname' Required></td>
</tr>
<tr>
<td >Password</td>
<td><input type='Password' name='txtpass' Required></td>
</tr>
<tr>
<td ><a href="validate.php">Register Now</a></td>
<td align='Right'><input type='Submit' name='btnLogin' Value='Login'></td>
</tr>
</table>
</Form>
</body>
</html>
