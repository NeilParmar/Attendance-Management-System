<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<script src="SpryAssets/SpryValidationSelect.js" type="text/javascript"></script>
<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<link href="SpryAssets/SpryValidationSelect.css" rel="stylesheet" type="text/css" />
<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="calendar.js"></script>

<link rel="stylesheet" type="text/css" href="calendar.css" />
</head>

<?php

mysql_connect("localhost","root","shabnam") or die(mysql_error());
mysql_select_db("attendance");

session_start();
$faculty=$_SESSION['faculty'];
$cur_year=date('Y');
$valid_year=$cur_year-4;
$sql="SELECT DISTINCT subject_code FROM `subject_allocation` WHERE faculty_code='$faculty' AND year<='$cur_year' AND year>='$valid_year'";
$result=mysql_query($sql); 
$sqld="SELECT DISTINCT division,batch FROM `subject_allocation` WHERE faculty_code='$faculty' AND year<='$cur_year' AND year>='$valid_year'";
$resultd=mysql_query($sqld);
$options=""; 
$opt_div="";

while ($row=mysql_fetch_array($result)) { 

    $subject_code=$row["subject_code"]; 
    $sql_sub="SELECT DISTINCT subject_name FROM `subject` WHERE subject_code='$subject_code'";
    $result_sub=mysql_query($sql_sub);
    while($row_sub=mysql_fetch_array($result_sub))
    {
	$subject_name=$row_sub["subject_name"]; 
        $options.="<OPTION VALUE=\"$subject_code\">".strtoupper(($subject_name)); 
    }
   
}
while ($rowd=mysql_fetch_array($resultd)) { 
	
	$div=$rowd["division"];
	$batch=$rowd['batch'];
	if($batch=="0")
	{
		$val=$div."|".$batch;
		$disp=strtoupper($div)."-Theory";
	}
	else
	{
		$val=$div."|".$batch;
		$disp=strtoupper($div).$batch;
	}
	$opt_div.="<OPTION VALUE=\"$val\">".$disp;

}
?>

<body>

<center>
<form method="post" action="functionality.php">
<table border="0">
  <tr>
    <td>Select a subject</td>
    <td><span id="spryselect1">
      <select name="subject_name">
        <option name="initial1">SELECT</option>
        <?=$options?>
      </select>
<span class="selectRequiredMsg">Please select an item.</span></span></td>
  </tr>
  <tr>
    <td>Enter hour Slot</td>
    <td><span id="spryselect3">
      <select name="slot">
        <option name="init">SELECT</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
      </select>
      <span class="selectRequiredMsg">Please select an item.</span></span></td>
  </tr>
  <tr>
    <td>Enter Date</td>
    <td><span id="sprytextfield2">
    <input name="date" type="text" id="date" value="click here for calendar" />
    
    <span class="textfieldRequiredMsg">A value is required.</span><span class="textfieldInvalidFormatMsg">Invalid format.</span></span>
    <script type="text/javascript">

  		calendar.set("date");

  </script>
    </td>
  </tr>
  <tr>
    <td>Enter Start time</td>
    <td><span id="sprytextfield3">
    <input name="start_time" type="text" />
    <span class="textfieldRequiredMsg">A value is required.</span><span class="textfieldInvalidFormatMsg">Invalid format.</span></span>(E.g : 09:00)
</td>
  </tr>
  <tr>
  <td>
  Division</td>
  <td><label for="div"></label>
    <span id="spryselect2">
    <select name="div" id="div">
      <option value="">SELECT</option>
        <?=$opt_div?>
    </select>
    <span class="selectRequiredMsg">Please select an item.</span></span>
  </table>
<input name="submit" type="submit" value="Submit" />
<input name="reset" type="reset" />
</form>
</center>
<script type="text/javascript">
var spryselect1 = new Spry.Widget.ValidationSelect("spryselect1", {validateOn:["blur"]});
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2", "date", {format:"yyyy-mm-dd"});
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3", "time", {validateOn:["blur"], hint:"(e.g. 02:00)"});
var spryselect2 = new Spry.Widget.ValidationSelect("spryselect2");
var spryselect3 = new Spry.Widget.ValidationSelect("spryselect3", {validateOn:["blur"]});
</script>
</body>
</html>


