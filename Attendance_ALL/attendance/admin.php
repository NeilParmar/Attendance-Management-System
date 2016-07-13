<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Subject Allocation</title>
<script src="SpryAssets/SpryValidationSelect.js" type="text/javascript"></script>
<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<link href="SpryAssets/SpryValidationSelect.css" rel="stylesheet" type="text/css" />
<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="calendar.css" />
<script type="text/javascript" src="calendar.js"></script>
<script type="text/javascript">
function batchAllocate()
{
	var subject=document.myform.subject_name.options[document.myform.subject_name.selectedIndex].value;
    var splitdata=subject.split("|");
	var type=splitdata[1];
	if(type=="theory")
	{
		document.myform.teacher_name.disabled=false;
		document.myform.teacher_name2.disabled=true;
		document.myform.teacher_name3.disabled=true;
		document.myform.teacher_name4.disabled=true;
	}
	else if(type=="practical")
	{
		document.myform.teacher_name.disabled=true;
		document.myform.teacher_name2.disabled=false;
		document.myform.teacher_name3.disabled=false;
		document.myform.teacher_name4.disabled=false;
	}
	else
	{
		document.myform.teacher_name.disabled=false;
		document.myform.teacher_name2.disabled=false;
		document.myform.teacher_name3.disabled=false;
		document.myform.teacher_name4.disabled=false;
	}
}
</script>
</head>
<?php

mysql_connect("localhost","root","shabnam") or die(mysql_error());
mysql_select_db("attendance");

$sql1="SELECT faculty_code,middle_name,first_name,last_name FROM `faculty` ORDER BY first_name"; 
$result1=mysql_query($sql1); 
$options1="";

while ($row1=mysql_fetch_array($result1)) { 

    $faculty_code=$row1["faculty_code"]; 
    $first_name=$row1["first_name"];
    $middle_name=$row1["middle_name"];
    $last_name=$row1["last_name"];
    $full_name=$first_name." ".$middle_name." ".$last_name;
    $options1.="<OPTION VALUE=\"$faculty_code\">".$full_name; 
}

$sql="SELECT subject_code,subject_name,type_lec FROM `subject` ORDER BY subject_name"; 
$result=mysql_query($sql); 
$options=""; 

while ($row=mysql_fetch_array($result)) { 

	$type_lec=$row["type_lec"];
    $subject_code=$row["subject_code"]; 
    $subject_name=$row["subject_name"]; 
	$subject_code.="|".$type_lec;
    $options.="<OPTION VALUE=\"$subject_code\">".strtoupper($subject_name); 
}

?>
<body>
<center>
<form name="myform" action="admin.php" method="post">
<table width="496" border="0">
  <tr>
    <td width="91">Stream</td>
    <td width="395"><span id="spryselect1">
      <label for="course"></label>
      <select name="course" id="course">
      <option id="0">--select course--</option>
      <option id="1" value="information_technology">IT</option>
      <option id="2" value="computer_science">CS</option>
      <option id="3" value="extc">EXTC</option>
      <option id="4" value="electronics">ELEX</option>      
      <option id="5" value="civil">Civil</option>
      <option id="6" value="mechanical">Mechanical</option>
      
      </select>
      <span class="selectRequiredMsg">Please select an item.</span></span></td>
  </tr>
  <tr>
    <td>Batch</td>
    <td><label for="Year"></label>
      <span id="sprytextfield1">
      <input type="text" name="year" id="year" />
      <span class="textfieldRequiredMsg">A value is required.</span><span class="textfieldInvalidFormatMsg">Invalid format.</span></span><br/>Enter year of students admission</td>
  </tr>
    <tr>
  <td>Div</td>
  <td><label for="div"></label>
    <span id="spryselect5">
    <select name="div" id="div">
      <option value="">SELECT</option>
      <option value="a">A</option>
      <option value="b">B</option>
      <option value="c">C</option>
      <option value="d">D</option>
      <option value="e">E</option>
    </select>
    <span class="selectRequiredMsg">Please select an item.</span></span></td></tr>
    <tr>
    <td>
    Trim Start</td>
    <td><span id="sprytextfield2">
    <input type="text" name="trim_start" id="trim_start" value="click here!"/>
    <span class="textfieldRequiredMsg">A value is required.</span><span class="textfieldInvalidFormatMsg">Invalid format.</span></span>      <script type="text/javascript">

  	calendar.set("trim_start");

  </script></td>
    </tr>
    <tr>
    <td>
    Trim End
    </td>
    <td><span id="sprytextfield3">
    <input type="text" name="trim_end" id="trim_end" value="click here!" />
    <span class="textfieldRequiredMsg">A value is required.</span><span class="textfieldInvalidFormatMsg">Invalid format.</span></span><script type="text/javascript">

  	calendar.set("trim_end");

  </script>
    </td>
    </tr>

  <tr>
    <td>Trimester</td>
    <td><label for="trim"></label>
      <span id="spryselect2">
      <select name="trim" id="trim">
        <option name="init">---Select a TRIM---</option>
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
      <span class="selectRequiredMsg">Please select an item.</span></span></td>
  </tr>
  <tr>
    <td>Subject</td>
    <td><span id="spryselect3">
      <select name="subject_name" onchange="batchAllocate()">
        <option name="initial1">SELECT</option>
        <?=$options?>
      </select>
      <span class="selectRequiredMsg">Please select an item.</span></span></td>
  </tr>
  <tr>
    <td>Teacher (Theory)</td>
    <td><span id="spryselect4">
      <select name="teacher_name" disabled="disabled">
        <option name="initial">SELECT</option>
        <?=$options1?>
      </select>
      <span class="selectRequiredMsg">Please select an item.</span></span></td>
  </tr>
  <tr>
  <td>
  Teacher (Batch 1)
  </td>
  <td><span id="spryselect6">
    <select name="teacher_name2" disabled="disabled">
      <option name="initial">SELECT</option>
      <?=$options1?>
    </select>
    <span class="selectRequiredMsg">Please select an item.</span></span></td>
  </tr>
  <tr>
  <td>
  Teacher (Batch 2)
  </td>
  <td><span id="spryselect7">
    <select name="teacher_name3" disabled="disabled">
    <option name="initial">SELECT</option>
      <option id="none2" value="none">None</option>
      <?=$options1?>
    </select>
    <span class="selectRequiredMsg">Please select an item.</span></span></td>
</tr>
<tr>
  <td>
  Teacher (Batch 3)
  </td>
  <td><span id="spryselect8">
    <select name="teacher_name4" disabled="disabled">
      <option name="initial">SELECT</option>
      <option id="none3" value="none">None</option>
      <?=$options1?>
    </select>
    <span class="selectRequiredMsg">Please select an item.</span></span></td>
</tr>
  </table>

<input name="submit" type="submit" value="Submit"/>
<input name="reset" type="reset" />


</form>
</center>
<script type="text/javascript">
var spryselect1 = new Spry.Widget.ValidationSelect("spryselect1", {validateOn:["change", "blur"]});
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "integer", {validateOn:["blur"]});
var spryselect2 = new Spry.Widget.ValidationSelect("spryselect2", {validateOn:["blur"]});
var spryselect3 = new Spry.Widget.ValidationSelect("spryselect3", {validateOn:["blur"]});
var spryselect4 = new Spry.Widget.ValidationSelect("spryselect4", {validateOn:["blur"]});
var spryselect5 = new Spry.Widget.ValidationSelect("spryselect5", {validateOn:["blur"]});
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2", "date", {format:"yyyy-mm-dd"});
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3", "date", {format:"yyyy-mm-dd"});
var spryselect6 = new Spry.Widget.ValidationSelect("spryselect6", {validateOn:["blur"]});
var spryselect7 = new Spry.Widget.ValidationSelect("spryselect7", {validateOn:["blur"]});
var spryselect8 = new Spry.Widget.ValidationSelect("spryselect8", {validateOn:["blur"]});
</script>
</body>
</html>

<?php

if(isset($_POST['submit']))
{
	
$faculty_code=$_POST['teacher_name'];
$trim=$_POST['trim'];
$year=$_POST['year'];
$subject_code=$_POST['subject_name'];
$course=$_POST['course'];
$div=$_POST['div'];
$trim_start=$_POST['trim_start'];
$trim_end=$_POST['trim_end'];
$splitdata=explode("|",$subject_code);
$subject_code=$splitdata[0];
$batch1=$_POST['teacher_name2'];
$batch2=$_POST['teacher_name3'];
$batch3=$_POST['teacher_name4'];

if($faculty_code!=NULL)
{
	$batch=0;
	$query="INSERT INTO subject_allocation(subject_code,faculty_code,trim,year,branch_name,division,trim_start,trim_end,batch) VALUES('$subject_code','$faculty_code','$trim','$year','$course','$div','$trim_start','$trim_end','$batch')";
   $result=mysql_query($query) or die(mysql_error());
}
if($batch1!=NULL)
{
	$batch=1;
	$query="INSERT INTO subject_allocation(subject_code,faculty_code,trim,year,branch_name,division,trim_start,trim_end,batch) VALUES('$subject_code','$batch1','$trim','$year','$course','$div','$trim_start','$trim_end','$batch')";
   	$result=mysql_query($query) or die(mysql_error());
}
if($batch2!=NULL)
{
	$batch=2;
	if($batch2!="none")
	{
		$query="INSERT INTO subject_allocation(subject_code,faculty_code,trim,year,branch_name,division,trim_start,trim_end,batch) VALUES('$subject_code','$batch2','$trim','$year','$course','$div','$trim_start','$trim_end','$batch')";
   		$result=mysql_query($query) or die(mysql_error());
	}
	
}
if($batch3!=NULL)
{
	$batch=3;
	if($batch3!="none")
	{
		$query="INSERT INTO subject_allocation(subject_code,faculty_code,trim,year,branch_name,division,trim_start,trim_end,batch) VALUES('$subject_code','$batch3','$trim','$year','$course','$div','$trim_start','$trim_end','$batch')";
   		$result=mysql_query($query) or die(mysql_error());
	}

}
	
if($query==true)
{
	echo "<script>alert('Sucessful Allocation!')</script>";
	return true;
}
else
{
	echo "<script>alert('Error!!')</script>";
	return false;
}
}

?>



