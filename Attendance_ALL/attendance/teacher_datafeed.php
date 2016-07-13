<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Teacher Datafeed</title>



<script type="text/javascript" src="calendar.js"></script>

<link rel="stylesheet" type="text/css" href="calendar.css" />



<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>

<script src="SpryAssets/SpryValidationSelect.js" type="text/javascript"></script>

<script src="SpryAssets/SpryValidationTextarea.js" type="text/javascript"></script>
<script src="SpryAssets/SpryValidationPassword.js" type="text/javascript"></script>
<script src="SpryAssets/SpryValidationConfirm.js" type="text/javascript"></script>
<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />



<link href="SpryAssets/SpryValidationSelect.css" rel="stylesheet" type="text/css" />

<link href="SpryAssets/SpryValidationTextarea.css" rel="stylesheet" type="text/css" />

<link href="SpryAssets/SpryValidationPassword.css" rel="stylesheet" type="text/css" />
<link href="SpryAssets/SpryValidationConfirm.css" rel="stylesheet" type="text/css" />
</head>



<body>
<form action="teacher_datafeed.php" method="post" enctype="multipart/form-data" name="form1" id="form1">

<center>



<table border="0">

  <tr>

    <td width="150">First Name</td>

    <td><label for="fname"></label>

      <span id="sprytextfield1">

      <input type="text" name="fname" id="fname"  />

      <span class="textfieldRequiredMsg">A value is required.</span><span class="textfieldInvalidFormatMsg">Only Alphabets!</span></span></td>

  </tr>

  <tr>

    <td width="150">Middle Name</td>

    <td>
    <input type="text" name="mname" id="mname" />
	</td>

  </tr>

  <tr>

    <td width="150">Last Name</td>

    <td><span id="sprytextfield3">

    <input type="text" name="lname" id="lname" />

    <span class="textfieldRequiredMsg">A value is required.</span><span class="textfieldInvalidFormatMsg">Only Alphabets!</span></span></td>

  </tr>

    <td width="150">Gender</td>

    <td>

      <select name="gender" id="gender">

        <option id="initial" value="">--select a Gender--</option>

        <option id="male" value="male">Male</option>

        <option id="female" value="female">Female</option>

      </select>

      <label for="gender"></label></td>

  </tr>

  <tr>

    <td width="150">Faculty Code</td>

    <td><span id="sprytextfield4">

    <input type="text" name="fcode" id="fcode" />

    <span class="textfieldRequiredMsg">A value is required.</span><span class="textfieldInvalidFormatMsg">Invalid format.</span></span></td>

  </tr>

  <tr>

    <td width="150">Blood Group</td>

    <td><label for="bgroup"></label>
      <select name="bgroup" id="bgroup">

        <option id="0" value="" >--select a blood group--</option>

        <option id="a+" value="a+">A+</option>

        <option id="b+" value="b+">B+</option>

        <option id="ab+" value="ab+">AB+</option>

        <option id="o+" value="o+">O+</option>

        <option id="a-" value="a-">A-</option>

        <option id="b-" value="b-">B-</option>

        <option id="ab-" value="ab-">AB-</option>

        <option id="o-" value="o-">O-</option>

      </select>

     </td>

  </tr>

  <tr>

    <td width="150">Type</td>

    <td><label for="type"></label>

     <select name="type" id="type">

        <option id="0" value="">--select a type--</option>

        <option id="1" value="permanent">Permanent</option>

        <option id="2" value="contract">Contract</option>

        <option id="3" value="visiting">Visiting</option>

      </select>

    </td>

  </tr>

  <tr>

    <td>Designation</td>

    <td><label for="designation"></label>
      <select name="designation" id="designation">

        <option id="02" value="" >--Select a Designation--</option>

        <option id="12" value="teaching assistant">Teaching Assistant</option>

        <option id="22" value="assistant professor">Assistant Professor</option>

        <option id="32" value="associate professor">Associate Professor</option>

        <option id="4" value="professor">Professor</option>

        <option id="5" value="senior professor">Senior Professor</option>

      </select>

      </td>

  </tr>

  <tr>

  <tr>

    <td>Date of Joining</td>

    <td><input name="doj" type="text" id="doj" value="click here for calendar"  />
	<script type="text/javascript">

  		calendar.set("doj");

  </script></td>

  </tr>

  <tr>

    <td width="150">Permanent Address</td>

    <td><label for="perm_add"></label>

     
      <textarea name="perm_add" id="perm_add" cols="45" rows="5"></textarea>

     </td>

  </tr>

  <tr>

    <td width="150">Local Address</td>

    <td><label for="loc_add"></label>

      <textarea name="loc_add" id="loc_add" cols="45" rows="5"></textarea></td>

  </tr>

  <tr>

    <td width="150">Phone Number (Res)</td>

    <td><input type="text" name="rnum" id="rnum" />

</td>

  </tr>

  <tr>

    <td width="150">Mobile Number</td>

    <td>

    <input type="text" name="mnum" id="mnum"  maxlength="10"  min="10"/>
</td>

  </tr>

  <tr>

  <tr>

    <td width="150">Date of Birth</td>

    <td>

<em>

<input name="dob" type="text" id="dob" value="click here for calendar"  />

</em><script type="text/javascript">

  		calendar.set("dob");

  </script>
  </td>

  </tr>

 <tr>
 	<td>Create a password</td>
	<td><span id="sprypassword1">
	  <input name="password" id="password" type="password" />
	  <span class="passwordRequiredMsg">A value is required.</span></span></td>
  <tr>
  	<td>Retype Password</td>
   <td><span id="spryconfirm1">
     <input name="re-pass" id="password" type="password" />
     <span class="confirmRequiredMsg">A value is required.</span><span class="confirmInvalidMsg">The values don't match.</span></span></td>
   </tr>
   

    <td>Upload Photograph</td>

    <td><label for="image"></label>

      <input type="file" name="image" id="image" /></td>

  </tr>

</table>

<br/><br/>



<input name="submit" type="submit" value="Submit" />

<input name="Reset" type="reset" />

</center>



</form>

<script type="text/javascript">
function myValidation(value)

{

		return /^[A-Za-z]+$/.test(value);	

}
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "custom", {validateOn:["blur", "change"] , validation:myValidation});
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3", "custom", {validateOn:["blur", "change"] , validation:myValidation});
var sprytextfield4 = new Spry.Widget.ValidationTextField("sprytextfield4", "custom", {validateOn:["blur", "change"], pattern:"bb0000"});
var sprypassword1 = new Spry.Widget.ValidationPassword("sprypassword1", {validateOn:["blur"]});
var spryconfirm1 = new Spry.Widget.ValidationConfirm("spryconfirm1", "password", {validateOn:["blur"]});
</script>
</body>
</html>
<?php
if(isset($_POST['submit']))

{

	



$fname=ucwords($_POST['fname']);

$mname=ucwords($_POST['mname']);

$lname=ucwords($_POST['lname']);

$fcode=strtolower($_POST['fcode']);

$gender=$_POST['gender'];

$bgroup=$_POST['bgroup'];

$type=$_POST['type'];

$perm_add=$_POST['perm_add'];

$loc_add=$_POST['loc_add'];

$rnum=$_POST['rnum'];

$mnum=$_POST['mnum'];

$dob=$_POST['dob'];

$designation=$_POST['designation'];

$image=$_POST['image'];

$doj=$_POST['doj'];


$password=$_POST['password'];

	mysql_connect("localhost","root","shabnam") or die(mysql_error());
mysql_select_db("attendance");
	

	// Make sure the user actually 

	// selected and uploaded a file

	if (isset($_FILES['image']) && $_FILES['image']['size'] > 0) { 



	// Temporary file name stored on the server

        $tmpName  = $_FILES['image']['tmp_name'];  

       

        // Read the file 

        $fp      = fopen($tmpName, 'r');

        $data = fread($fp, filesize($tmpName));

        $data = addslashes($data);

        fclose($fp);

      



        // Create the query and insert

        // into our database.

     $query="INSERT INTO faculty	(first_name,middle_name,last_name,gender,Faculty_code,blood_grp,type,permanent_address,local_address,res_no,mob_no,date_of_birth,date_of_joining,designation,photograph,password)VALUES('$fname','$mname','$lname','$gender','$fcode','$bgroup','$type','$perm_add','$loc_add','$rnum','$mnum','$dob','$doj','$designation','$data',PASSWORD('$password'))";



	$check=mysql_query($query);

	

      		if($check==FALSE)

		{

			echo "<script>alert('An Error occured in insertion: please recheck the values')</script>";

		

		}

		else

		{

			echo "<script>alert('successful update!')</script>";

		}



	}

	

	else

	{

		$query="INSERT INTO faculty	(first_name,middle_name,last_name,gender,Faculty_code,blood_grp,type,permanent_address,local_address,res_no,mob_no,date_of_birth,date_of_joining,designation,password)VALUES('$fname','$mname','$lname','$gender','$fcode','$bgroup','$type','$perm_add','$loc_add','$rnum','$mnum','$dob','$doj','$designation',PASSWORD('$password'))";

	

		$check=mysql_query($query);

	

		if($check==FALSE)

		{

			echo "<script>alert('An Error occured in insertion: please recheck the values')</script>";

		

		}

		else

		{

			echo "<script>alert('successful update!')</script>";

		}

	}

}



?>

