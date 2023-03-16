<?php
if(isset($_POST['btnSubmit']))
{
	$UN=$_POST['username'];
	$PW=$_POST['password'];
	$CPW=$_POST['cpassword'];
	$EM=$_POST['email'];
	$GN=$_POST['gender'];
	$CO=$_POST['country'];
	$CH=$_POST['Payment'];
	$PW=md5($PW);
	$CPW=md5($CPW);
	
	
	$CN=mysql_connect("localhost","root","");
		mysql_select_db("jamesthew",$CN);
		mysql_query("insert into tblmember values('','$UN','$PW','$CPW','$EM','$GN','$CO','$CH','True')",$CN);
		mysql_close($CN);
		echo "Data Saved...";
		echo "<meta http-equiv='Refresh'; Content='0; URL=login.php'>";
		
}



?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>CoOl Javascript Validation</title>
<script type="text/javascript" src="cvalidate.js"></script>
<!--<script>
function CheckEmail(A)
{
	var ABC=new XMLHttpRequest();
	ABC.open("GET","verifyEmail.php?D="+A,true);
	ABC.send();
	ABC.onreadystatechange=function()
	{
		if(ABC.readyState==4 && ABC.status==200)
		{		document.getElementById("Data").innerHTML=ABC.responseText; 	}
	}
}



</script>-->
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

</head>

<body>




<form name="frmValidate" id="myform" action="validate.php" method="post" onsubmit="return validateForm('myform',true)">
<table width="350" border="0" cellspacing="0" cellpadding="5" align="center" bgcolor="#F4FAFF" style="border:1px solid #0099FF;">
  <tr>
    <td colspan="2" class="heading" align="center" style="border-bottom:1px solid #0099FF;"> - Registration Form - </td>
  </tr>
  <tr>
    <td colspan="2" class="heading" align="center" height="10"></td>
  </tr>

  <tr>
  	<td align="left" class="txt">Username *</td>
	<td align="right"><input type="text" name="username" id="username" size="28" title="Username" class="required alpha" /></td>
  </tr>
  <tr>
  	<td align="left" class="txt">Password *</td>
	<td align="right"><input type="password" name="password" id="password" size="28" title="Password" class="required alpha min 6 max 20 match cpassword" /></td>
  </tr>
  <tr>
  	<td align="left" class="txt">Confirm Password *</td>
	<td align="right"><input type="password" name="cpassword" id="cpassword" size="28" title="Confirm Password" class="required alpha" /></td>
  </tr>

  
  	<td align="left" class="txt">Email *</td>
	<td align="right"><input type="text" name="email" id="email" size="28" title="Email" class="required email" />
    <div id="Data"></div></td>
  </tr>
 
    
    <tr>
  	<td align="left" class="txt">Gender *</td>
	<td align="left">
		<input type="radio" name="gender" value="male" title="Gender" class="required" />Male
		<input type="radio" name="gender" value="female" title="Gender" class="required" />Female
	</td>
  </tr>
    
    
    
    
    <td align="left" class="txt">Country *</td>
	<td align="left">&nbsp;
		<select name="country" id="country" title="Country" class="required">
			<option value="">--- Select ---</option>
			<option value="Canada">Canada</option>
			<option value="UK">UK</option>
			<option value="USA">USA</option>
			<option value="Pakistan">Pakistan</option>
			<option value="Other">Other</option>
		</select>
	</td>
  </tr>
	
  <tr>
<td align="left" class="txt">Payment *</td>
<td><input type="radio" name="Payment" value="monthly" class="required"  />10$ (Monthly)
       <input type="radio" name="Payment" value="yearly"  class="required" />100$ (yearly)
</td>
</tr>
  
  <tr>
    <td valign="top"> Validation code *</td>
    <td><img src="captcha_code_file.php?rand=<?php echo rand();?>" id='captchaimg'><br>
    <label for='message'>Enter the code above here :</label><br>
    <input id="6_letters_code" name="6_letters_code" type="text" required="required"><br>
    Can't read the code? click <a href='javascript: refreshCaptcha();'>here</a> to refresh.
    </p></td>
    </tr>
  
  <tr>
	<td align="right" colspan="2">
		<input type="submit" name="btnSubmit" value="Submit Form" />
	</td>
  </tr>

</table>
</form>
<br /><br />

