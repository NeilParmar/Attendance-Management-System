<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<script src="SpryAssets/SpryValidationPassword.js" type="text/javascript"></script>
<script src="SpryAssets/SpryValidationConfirm.js" type="text/javascript"></script>
<link href="SpryAssets/SpryValidationPassword.css" rel="stylesheet" type="text/css" />
<link href="SpryAssets/SpryValidationConfirm.css" rel="stylesheet" type="text/css" />
</head>

<body>
<?
session_start();
$f = $_SESSION['new'];	//faculty or admin code

?>
<p>&nbsp;</p>
<center>
<form id="form1" name="form1" method="post" action="change_password.php">
  <p>&nbsp;</p>
  <table width="200" border="0">
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>Current Password</td>
      <td><span id="sprypassword1">
        <label for="password"></label>
        <input type="password" name="password" id="password" />
      <span class="passwordRequiredMsg">A value is required.</span></span></td>
    </tr>
    <tr>
      <td>New Password</td>
      <td><span id="sprypassword2">
        <label for="newpassword"></label>
        <input type="password" name="newpassword" id="newpassword" />
      <span class="passwordRequiredMsg">A value is required.</span></span></td>
    </tr>
    <tr>
      <td>Re-type New Password</td>
      <td>
        <label for="repeatnewpassword"></label>
        <span id="spryconfirm1">
        <input type="password" name="repeatnewpassword" id="repeatnewpassword" />
        <span class="confirmRequiredMsg">A value is required.</span><span class="confirmInvalidMsg">The values don't match.</span></span></td>
    </tr>
  </table>
  <input name="submit" type="submit" value="Submit" />
  <p>&nbsp;</p>
</form>
</center>
<p>&nbsp;</p>
<script type="text/javascript">
var sprypassword1 = new Spry.Widget.ValidationPassword("sprypassword1", {validateOn:["blur", "change"]});
var sprypassword2 = new Spry.Widget.ValidationPassword("sprypassword2");
var spryconfirm1 = new Spry.Widget.ValidationConfirm("spryconfirm1", "newpassword");
</script>
</body>
</html>

<?php
$submit = $_POST['submit'];


$host="localhost"; // Host name

$username="root"; // Mysql username

$password="shabnam"; // Mysql password

$db_name="attendance"; // Database name

// Connect to server and select databse.

if(isset($submit))
{
	mysql_connect("$host", "$username", "$password")or die("cannot connect");

	mysql_select_db("$db_name")or die("cannot select DB");

	$password = $_POST['password']; //old password

	$newpassword = $_POST['newpassword']; //new password

	$f = $_SESSION['new'];	//faculty or admin code
	
	$check_code=substr($f,0,2);
	


	if($check_code=="aa")
	{
		$fac = $_SESSION['admin']; //user is admin
		$tbl_name="admin";
		$user="admin_code";
	}
	else if($check_code=="cc")
	{
		$fac = $_SESSION['admin']; //user is admin
		$tbl_name="admin";
		$user="admin_code";
	}
	else if($check_code="ff")
	{
		$fac = $_SESSION['faculty']; //user is faculty
		$tbl_name="faculty";
		$user="Faculty_code";
	}
	else if($check_code="vf")
	{
		$fac = $_SESSION['faculty']; //user is faculty
		$tbl_name="faculty";
		$user="Faculty_code";
	}
	else if($check_code="ta")
	{
		$fac = $_SESSION['faculty']; //user is faculty
		$tbl_name="faculty";
		$user="Faculty_code";
	}


	$result = mysql_query("SELECT password FROM $tbl_name WHERE $user='$fac' and password=PASSWORD('$password')");
	
	


	if($result=true){

        			$sql=mysql_query("UPDATE $tbl_name SET password=PASSWORD('$newpassword') where $user='$fac'");

					if($sql)
		        		{
        	    	    			echo "<script>alert('successfully updated')</script>";

        				}
        				else
       					{
           					// In case when problem while updating your new password
           					echo"<script>alert('problem while updating your new password')</script>";
        				}




		}
	   	else
 		{
    			// In case of you have not correct User name and password
    			echo "<script>alert('incorrect username or password entered')</script>";
		}

}
?>