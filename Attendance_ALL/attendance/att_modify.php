<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Attendance-Modify</title>
<script src="SpryAssets/SpryValidationSelect.js" type="text/javascript"></script>
<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<link href="SpryAssets/SpryValidationSelect.css" rel="stylesheet" type="text/css" />
<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="calendar.js"></script>
<script type="text/javascript">
function checkFaculty()
{
	if(document.myform.faculty.options[0].value==true)
	{
		return false;
	}
	else
	{
		var javaScriptVariable;
		javaScriptVariable=document.myform.faculty.options[document.myform.faculty.selectedIndex].value;
		//document.write(javaScriptVariable);
		window.location.href = "att_modify.php?value=" +javaScriptVariable; 
		document.myform.subj.disabled=false;
		document.myform.subj.focus();
		

	}
}
</script>
<link rel="stylesheet" type="text/css" href="calendar.css" />
</head>

<?php

mysql_connect("localhost","root","shabnam") or die(mysql_error());
mysql_select_db("attendance");

$sql1="SELECT DISTINCT faculty_code,middle_name,first_name,last_name FROM `faculty` ORDER BY first_name"; 
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
if(isset($_GET['value']))
{
	session_start();
	$value= $_GET['value']; 
	$_SESSION['get_fac']=$value;
	$get_name="SELECT middle_name,first_name,last_name FROM `faculty` WHERE faculty_code='$value'";
	$name=mysql_query($get_name); 
	
	while ($row_is=mysql_fetch_array($name)) { 
	
    $first_name=$row_is["first_name"];
    $middle_name=$row_is["middle_name"];
    $last_name=$row_is["last_name"];
    $full_names=$first_name." ".$middle_name." ".$last_name;
	}
   echo"<center>Faculty Selected: ".$full_names."<br/>Now Select Subject</center>";
	
$cur_year=date('Y');
$valid_year=$cur_year-4;

	$query_get="SELECT s.subject_code,subject_name,s.division,s.year,s.trim,s.branch_name,batch,elective FROM subject,subject_allocation s WHERE faculty_code='$value' AND s.subject_code=subject.subject_code AND year<='$cur_year' AND year>='$valid_year' ORDER BY s.division,batch";
	$result_get=mysql_query($query_get) or die(mysql_error());
	$options2="";
while ($row1=mysql_fetch_array($result_get)) { 

	$subject_code=$row1["subject_code"]; 
    $subject_name=$row1["subject_name"]; 
    $div=$row1["division"];
    $stream=$row1["branch_name"];
    $trim=$row1["trim"];
	$year=$row1["year"];
	$batch=$row1["batch"];
	$elective=$row1["elective"];
	$pass_name=$subject_name."|".$div."|".$year."|".$stream."|".$trim."|".$year1."|".$subject_code."|".$batch."|".$elective;
	if($batch=="0")
	{
		$batch_disp="Theory";
	}
	else
	{
		$batch_disp=$batch;
	}
    $full_name=$subject_name." | ".$div."-".$batch_disp." | ".$trim." | ".$year;
    $options2.="<OPTION VALUE=\"$pass_name\">".strtoupper($full_name); 
	 
}
}
?>

<body>

<center>
<form method="post" action="att_modify-1.php" name="myform">
<table border="0">
<tr>
<tr>
<td>
<strong>Faculty </strong>
</td>
<td>

<select name="faculty" id="faculty" onchange="checkFaculty()">
<option name="initial" >SELECT</option>
<?=$options1?>
</select>

</td>
<tr></tr>

<td>
<strong>Subject</strong>
</td>
<td>
<select name="subj" id="subj">
<option name="label" value="initial"> subj | div batch | trim | year(batch) </option>
<?=$options2?>
</select>
</td>
</tr>
  <tr>
    <td><strong>Enter slot (Modification)</strong></td>
    <td><span id="spryselect3">
      <select name="slot">
        <option name="init">SELECT</option>
        <option value="0">0</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        </select>
      <span class="selectRequiredMsg">Please select an item.</span></span></td>
  </tr>
  <tr>
    <td><strong>Enter Date</strong></td>
    <td><span id="sprytextfield2">
    <input name="date" type="text" id="date" value="click here for calendar" />
    
    <span class="textfieldRequiredMsg">A value is required.</span><span class="textfieldInvalidFormatMsg">Invalid format.</span></span>
    <script type="text/javascript">

  		calendar.set("date");

  </script>
    </td>
  </tr>
  <tr>
    <td><strong>Enter Start time</strong></td>
    <td><span id="sprytextfield3">
    <input name="start_time" type="text" />
    <span class="textfieldRequiredMsg">A value is required.</span><span class="textfieldInvalidFormatMsg">Invalid format.</span></span>(E.g : 09:00)
</td>
  </tr>
  <tr>
  </table>
<input name="submit" type="submit" value="Submit" />
<input name="reset" type="reset" />
</form>
</center>
<script type="text/javascript">
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2", "date", {format:"yyyy-mm-dd"});
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3", "time", {validateOn:["blur"], hint:"(e.g. 02:00)"});
var spryselect3 = new Spry.Widget.ValidationSelect("spryselect3", {validateOn:["blur"]});
</script>
</body>
</html>


