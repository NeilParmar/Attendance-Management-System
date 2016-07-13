<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Subject Entry</title>
<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<script src="SpryAssets/SpryValidationSelect.js" type="text/javascript"></script>
<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<link href="SpryAssets/SpryValidationSelect.css" rel="stylesheet" type="text/css" />
</head>

<body>
<form action="subject_entry.php" method="post">
<center>
<table  border="0">
  <tr>
    <td>Subject Name</td>
    <td><span id="sprytextfield2">
      <input type="text" name="subject_name" id="subject_name" width="200"  />
      <span class="textfieldRequiredMsg">A value is required.</span></span><br/>(short 2-4 letter code eg:UNIX,SP)</td>
  </tr>
 <tr>
    <td >Trim</td>
    <td><label for="trim"></label>
      <span id="spryselect1">
      <select name="trim" id="trim">
        <option selected="selected" id="0">--select trimester--</option>
        <option id="1" value="1">1</option>
        <option id="2" value="2">2</option>
        <option id="3" value="3">3</option>
        <option id="4" value="4">4</option>
        <option id="5" value="5">5</option>
        <option id="6" value="6">6</option>
        <option id="7" value="7">7</option>
        <option id="8" value="8">8</option>
        <option id="9" value="9">9</option>
        <option id="10" value="10">10</option>
        <option id="11" value="11">11</option>
        <option id="12" value="12">12</option>
      </select>
      <span class="selectRequiredMsg">Please select an item.</span></span></td>

  </tr>
    <tr>
    <td>Branch Name</td>
    <td><span id="spryselect2">
      <select name="branch_name" id="branch_name">
        <option selected="selected">--select branch name--</option>
        <option id="1" value="information_technology">IT</option>
        <option id="2" value="extc">EXTC</option>
        <option id="3" value="electronics">ELEX</option>
        <option id="4" value="computer_science">CS</option>
        <option id="5" value="civil">Civil</option>
        <option id="6" value="mechanical">Mechanical</option>
        <option id="7" value="chemical">Chemical</option>
      </select>
      <span class="selectRequiredMsg">Please select an item.</span></span></td>
  </tr>
  <tr>
  <td>
  Degree
  </td>
  <td><span id="spryselect5">
    <select name="degree">
      <option id="init">--select--</option>
      <option value="btech">BTech</option>
      <option value="mbatech">MBATech</option>
      <option value="mca">MCA</option>
    </select>
    <span class="selectRequiredMsg">Please select an item.</span></span></td>
  </tr>
  <tr>
<td>
Type of Lecture
</td>
<td><span id="spryselect3">
  <select name="lec_type">
    <option name="init">--select--</option>
    <option value="theory">theory</option>
    <option value="practical">practical</option>
    <option value="both">both</option>
  </select>
  <span class="selectRequiredMsg">Please select an item.</span></span></td>
</tr>
<tr>
<td>
Number of Hours
</td>
<td><span id="sprytextfield3">
<input type="text" name="num_hours" />
<span class="textfieldRequiredMsg">A value is required.</span><span class="textfieldInvalidFormatMsg">Invalid format.</span><span class="textfieldMaxCharsMsg">Exceeded maximum number of characters.</span></span></td>
</tr>
<tr>
<td>
Elective Subject
</td>
<td><span id="spryselect4">
  <select name="elective">
    <option name="init">--select--</option>
    <option value="yes">Yes</option>
    <option value="no">No</option>
  </select>
  <span class="selectRequiredMsg">Please select an item.</span></span></td>
</tr>
</table>
<input name="submit" type="submit" value="Submit" />
<input name="reset" type="reset" />
<br/><br/>
</center>
</form>
<script type="text/javascript">
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2", "none", {validateOn:["blur"]});
var spryselect1 = new Spry.Widget.ValidationSelect("spryselect1", {validateOn:["blur"]});
var spryselect2 = new Spry.Widget.ValidationSelect("spryselect2", {validateOn:["blur"]});
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3", "integer", {validateOn:["blur"], maxChars:2});
var spryselect4 = new Spry.Widget.ValidationSelect("spryselect4", {validateOn:["blur"]});
var spryselect5 = new Spry.Widget.ValidationSelect("spryselect5", {validateOn:["blur"]});
var spryselect3 = new Spry.Widget.ValidationSelect("spryselect3");
</script>
</body>
</html>
<?php

if(isset($_POST['submit']))
{
	$subject_name=strtolower($_POST['subject_name']);
	$trim=$_POST['trim'];
	$branch_name=$_POST['branch_name'];
	$type_lec=$_POST['lec_type'];
	$num_hours=$_POST['num_hours'];
	$elective=$_POST['elective'];
	$degree=$_POST['degree'];

	//subject code generation
	$subject_code=$degree."_".$branch_name."_".$subject_name."_".$trim;

	//for elective subjects
	if($elective=="yes")
	{
		$subject_name.=" [elec]"; //for elective subjects
	}
	
	$subject_name.=" [".$degree."-".$branch_name."]"; //branch and steam wise subject name

	mysql_connect("localhost","root","shabnam") or die(mysql_error());
	mysql_select_db("attendance");

	$query="INSERT INTO subject (subject_code,type_lec,subject_name,trim,branch_name,no_of_hours,elective) VALUES ('$subject_code','$type_lec','$subject_name','$trim','$branch_name','$num_hours','$elective')";
	
	$result=mysql_query($query) or die (mysql_error());
	if($result==true)
	{
		echo "<script>alert('Sucessful Subject Entry!')</script>";
		return true;
	}
	else
	{
		echo "<script>alert('An Error occured!!')</script>";
		return false;
	}
}
?>



