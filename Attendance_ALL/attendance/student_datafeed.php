<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>student Datafeed</title>



<script type="text/javascript" src="calendar.js"></script>

<link rel="stylesheet" type="text/css" href="calendar.css" />



<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>

<script src="SpryAssets/SpryValidationSelect.js" type="text/javascript"></script>

<script src="SpryAssets/SpryValidationTextarea.js" type="text/javascript"></script>

<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />



<link href="SpryAssets/SpryValidationSelect.css" rel="stylesheet" type="text/css" />

<link href="SpryAssets/SpryValidationTextarea.css" rel="stylesheet" type="text/css" />

</head>



<body>



<form action="student_datafeed.php" method="post" enctype="multipart/form-data" name="form2" id="form2">

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

  <tr>

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

    <td width="150">Date of Birth</td>

    <td>

<em>

<input name="dob" type="text" id="dob" value="click here for calendar"  />

</em><script type="text/javascript">

  		calendar.set("dob");

  </script></td>

  </tr>

<tr>

    <td width="150">Gr no</td>

    <td><span id="sprytextfield4">
    <input type="text" name="grno" id="grno" />
    <span class="textfieldRequiredMsg">A value is required.</span><span class="textfieldInvalidFormatMsg">Invalid format.</span></span></td>

  </tr>
 <tr>

    <td>Date of admission</td>

    <td>
    <input name="yoa" type="text" id="yoa" value="click here for calendar"  />    
	<script type="text/javascript">

  		calendar.set("yoa");

  </script></td>

</tr>
<tr>

    <td width="150">Degree</td>

    <td><span id="spryselect2">

      <select name="deg_name" id="deg_name">

        <option id="0" value="">--select your type--</option>

        <option id="1" value="btech">Btech</option>

        <option id="2" value="mbatech">MBAtech</option>
        <option id="2" value="mbatech">MCA</option>

        </select>

      <span class="selectInvalidMsg">Please select a valid item.</span><span class="selectRequiredMsg">Please select an item.</span></span></td>

  </tr>
 <tr>

    <td width="150">stream</td>

    <td><label for="stream"></label>

    <span id="spryselect6">
    <select name="stream" id="stream">
      <option id="init" value="">--select your stream--</option>
      <option value="information_technology" id="12">IT</option>
      <option value="extc" id="22">EXTC</option>
      <option id="3" value="electronics">ELEX</option>
      <option id="4" value="computer_science">CS</option>
      <option id="5" value="civil">Civil</option>
      <option id="6" value="mechanical">Mechanical</option>
    </select>
    <span class="selectRequiredMsg">Please select an item.</span></span><span class="selectInvalidMsg">Please select a valid item.</span><span class="selectRequiredMsg">Please select an item.</span></span></td>

  </tr>
<tr>

    <td width="150">Passed From</td>

    <td>
      <select name="passed_from" id="passed_from&gt;
        &lt;<option name="init" value="">
        --Select--</option>
        <option id="13" value="12th">12th</option>
        <option id="23" value="diploma">Diploma</option>
      </select>
      </td>

  </tr>
  <tr>
  <td>Batch of Admission</td>
  <td><span id="sprytextfield9">
  <input type="text" id="year" name="year"/>
  <span class="textfieldRequiredMsg">A value is required.</span><span class="textfieldInvalidFormatMsg">Invalid format.</span><span class="textfieldMinCharsMsg">Minimum number of characters not met.</span><span class="textfieldMaxCharsMsg">Exceeded maximum number of characters.</span></span></td>
</tr>
<tr>
<td>Division</td>
<td><label for="division"></label>
  <span id="spryselect4">
  <select name="division" id="division">
    <option name="select" value="">--Select a Div--</option>
    <option id="a" value="a">A</option>
    <option id="b" value="b">B</option>
    <option id="c" value="c">C</option>
    <option id="d" value="d">D</option>
    <option id="e" value="e">E</option>
  </select>
  <span class="selectRequiredMsg">Please select an item.</span></span>
  </td>
  </tr>
  <tr>
  <td>
  Roll No
  </td>
  <td><span id="sprytextfield10">
  <input name="roll_no" type="text" />
  <span class="textfieldRequiredMsg">A value is required.</span><span class="textfieldInvalidFormatMsg">Invalid format.</span><span class="textfieldMinCharsMsg">Minimum number of characters not met.</span><span class="textfieldMaxCharsMsg">Exceeded maximum number of characters.</span></span>
  </td>
  </tr>
  <tr>
  <td>
  Batch(practical)
  </td>
  <td><span id="spryselect1">
    <select name="batch">
      <option id="init2" value="">--select--</option>
      <option value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>
    </select>
    <span class="selectRequiredMsg">Please select an item.</span></span></td>
  </tr>
  <tr>
  <td>
  Trim
  </td>
  <td><span id="spryselect5">
    <select name="trim" id="trim">
      <option id"select" value="">--Select a TRIM--</option>
      <option value="1">1</option>
      <option value="2">2</option>
		<option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
        <option value="7">7</option>
        <option value="8">8</option>
        <option value="9">9</option>
        <option value="10">10</option>
        <option value="11">11</option>
        <option value="12">12</option>
    </select>
    <span class="selectRequiredMsg">Please select an item.</span></span>
    </td>
    </tr>
    <tr>
  <td width="150">Blood Group</td>

    <td><label for="bgroup"></label>

      <select name="bgroup" id="bgroup">

        <option id="0" value="" >--select your blood group--</option>

        <option id="a+" value="a+">A+</option>

        <option id="b+" value="b+">B+</option>

        <option id="ab+" value="ab+">AB+</option>

        <option id="o+" value="o+">O+</option>

        <option id="a-" value="a-">A-</option>

        <option id="b-" value="b-">B-</option>

        <option id="ab-" value="ab-">AB-</option>

        <option id="o-" value="o-">O-</option>

      </select></td>
  </tr>
 <tr>

    <td width="150">Permanent Address</td>

    <td><label for="perm_add"></label>

      <textarea name="perm_add" id="perm_add" cols="45" rows="5"></textarea></td>

  </tr>

  <tr>

    <td width="150">Residence Address</td>

    <td><label for="resi_add"></label>

      <textarea name="resi_add" id="resi_add" cols="45" rows="5"></textarea></td>

  </tr>

  <tr>

    <td width="150">Residence Number</td>

    <td>

    <input type="text" name="rnum" id="rnum" />
</td>

  </tr>

  <tr>

    <td width="150">Mobile Number</td>

    <td>

    <input type="text" name="mnum" id="mnum"  maxlength="10"  min="10"/>

    </td>

  </tr>



</table>

<br/><br/>

</center>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;



<input name="submit" type="submit" value="Submit"/>

<input name="Reset" type="reset" />



</form>

<script type="text/javascript">
function myValidation(value)

{

		return /^[A-Za-z]+$/.test(value);	

}



var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "custom", {validateOn:["blur", "change"] , validation:myValidation});


var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3", "custom", {validateOn:["blur", "change"] , validation:myValidation});
var spryselect2 = new Spry.Widget.ValidationSelect("spryselect2", {invalidValue:"0", validateOn:["change","blur"]});

var sprytextfield4 = new Spry.Widget.ValidationTextField("sprytextfield4", "integer", {validateOn:["change"]});
var sprytextfield9 = new Spry.Widget.ValidationTextField("sprytextfield9", "integer", {validateOn:["change"], minChars:4, maxChars:4});
var spryselect4 = new Spry.Widget.ValidationSelect("spryselect4", {validateOn:["change"]});
var sprytextfield10 = new Spry.Widget.ValidationTextField("sprytextfield10", "integer", {validateOn:["change"], minChars:1, maxChars:3});
var spryselect5 = new Spry.Widget.ValidationSelect("spryselect5", {validateOn:["change"]});
var spryselect6 = new Spry.Widget.ValidationSelect("spryselect6");
var spryselect1 = new Spry.Widget.ValidationSelect("spryselect1");
</script>





</body>

</html>


<?php




if(isset($_POST['submit']))

{
	$fname=ucwords($_POST['fname']);

$mname=ucwords($_POST['mname']);

$lname=ucwords($_POST['lname']);

$gender=$_POST['gender'];

$dob=$_POST['dob'];

$grno=$_POST['grno'];

$yoa=$_POST['yoa'];

$deg_name=$_POST['deg_name'];

$stream=$_POST['stream'];

$passed_from=$_POST['passed_from'];

$bgroup=$_POST['bgroup'];

$perm_add=$_POST['perm_add'];

$resi_add=$_POST['resi_add'];

$rnum=$_POST['rnum'];

$mnum=$_POST['mnum'];


$trim=$_POST['trim'];

$roll_no=$_POST['roll_no'];

$division=$_POST['division'];

$year=$_POST['year'];

$batch=$_POST['batch'];

$table_name=$stream;


	

	mysql_connect("localhost","root","shabnam") or die(mysql_error());
mysql_select_db("attendance");



$query="INSERT INTO students(first_name,middle_name,last_name,gender,date_of_birth,gr_no,year_of_admission,deg_name,stream,passed_from,blood_grp,permanent_address,residence_address,res_no,mob_no)VALUES('$fname','$mname','$lname','$gender','$dob','$grno','$yoa','$deg_name','$stream','$passed_from','$bgroup','$perm_add','$resi_add','$rnum','$mnum')";

	$check=mysql_query($query) or die(mysql_error());
	
$query2="INSERT INTO $table_name(gr_no,roll_no,trim,year,division,batch) VALUES('$grno','$roll_no','$trim','$year','$division','$batch')";
	$result2=mysql_query($query2) or die(mysql_error());


	if($check==FALSE || $result2==FALSE)

	{

		echo "<script>alert('An Error occured in insertion: please recheck the values')</script>";

		

	}

	else

	{

		echo "<script>alert('successful update!')</script>";

	}



}



?>

 