<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Faculty Login</title>
<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<script src="SpryAssets/SpryValidationPassword.js" type="text/javascript"></script>
<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<link href="SpryAssets/SpryValidationPassword.css" rel="stylesheet" type="text/css" />
<?php
session_start();
?>
</head>

<body>
<center>
<form action="f_login.php" method="post">
<table width="200" border="0">
  <tr>
    <td>Faculty Code</td>
    <td><span id="sprytextfield1">
    <label for="Faculty_code"></label>
    <input type="text" name="Faculty_code" id="Faculty_code" />
    <span class="textfieldRequiredMsg">A value is required.</span><span class="textfieldInvalidFormatMsg">Invalid format.</span></span></td>
  </tr>
  <tr>
    <td>Password</td>
    <td><span id="sprypassword1">
    <label for="password"></label>
    <input type="password" name="password" id="password" />
    <span class="passwordRequiredMsg">A value is required.</span><span class="passwordMinCharsMsg">Minimum number of characters not met.</span><span class="passwordMaxCharsMsg">Exceeded maximum number of characters.</span></span></td>
  </tr>
</table>
<input name="submit" type="submit" value="Submit"/>
<input name="reset" type="reset" />

</form>
</center>
<script type="text/javascript">
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "custom", {pattern:"BB0000", validateOn:["blur", "change"]});
var sprypassword1 = new Spry.Widget.ValidationPassword("sprypassword1", {validateOn:["blur", "change"]});
</script>
</body>
</html>

<?php

if(isset($_POST['submit'])){
 
$tbl_name="faculty"; // Table name

// Connect to server and select databse.
mysql_connect("localhost","root","shabnam") or die(mysql_error());
mysql_select_db("attendance");


// username and password sent from form 
$flag=0;
$Faculty_code=$_POST['Faculty_code']; 
$password=$_POST['password'];
$check_code=substr($Faculty_code,0,2);

if($check_code=='aa')
{
	$user_code=$Faculty_code; //user is admin
	$tbl_name="admin";
	$user="admin_code";
}	
if($check_code=='cc')
{
	$user_code=$Faculty_code; //user is course co-ordinator
	$tbl_name="admin";
	$user="admin_code";
	$flag=1;
}

else if($check_code=='ff')
{
	$user_code=$Faculty_code; //user is faculty
	$tbl_name="faculty";
	$user="faculty_code";
}

else if($check_code=='vf')
{
	$user_code=$Faculty_code; //user is faculty
	$tbl_name="faculty";
	$user="faculty_code";
}

else if($check_code=='ta')
{
	$user_code=$Faculty_code; //user is faculty
	$tbl_name="faculty";
	$user="faculty_code";
}




// To protect MySQL injection (more detail about MySQL injection)
//$Faculty_code = stripslashes($Faculty_code);
//$password = stripslashes($password);
//$Faculty_code = mysql_real_escape_string($Faculty_code);
//$password = mysql_real_escape_string($password);


$sql="SELECT * FROM $tbl_name WHERE $user='$user_code' AND password=PASSWORD('$password')";

$result=mysql_query($sql);

// Mysql_num_row is counting table row
$count=mysql_num_rows($result);
//echo $count;
// If result matched $myusername and $mypassword, table row must be 1 row


else if($count==1 && $user=="faculty_code")
{
	// Register $myusername, $mypassword and redirect to file "login_success.php"
	session_register("Faculty_code");
	$_SESSION['faculty']=$user_code;
	$_SESSION['new']=$user_code;
	$_SESSION['loggedin']=true;
	session_register("password"); 
	header("location:teacher_homehtml.php");
}
else if($count==1 && $user=="admin_code" && $flag==0)
{
	session_register("Faculty_code");
	$_SESSION['admin']=$user_code;
	$_SESSION['new']=$user_code;
	$_SESSION['loggedin']=true;
	session_register("password"); 
	header("location:admin_homehtml.php");
}
if($count==1 && $user=="admin_code" && $flag==1)
{
	session_register("Faculty_code");
	$_SESSION['admin']=$user_code;
	$_SESSION['new']=$user_code;
	$_SESSION['loggedin']=true;
	session_register("password"); 
	header("location:coursec_homehtml.php"); //PLEASE GIVE LINK
}
else
{
	echo "Wrong Username or Password";
}
}
?>