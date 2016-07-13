<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Elective Subjects</title>
<script src="SpryAssets/SpryValidationSelect.js" type="text/javascript"></script>
<script type="text/javascript">
function checkDiv()
{
	if(document.myform.stream.options[document.myform.stream.selectedIndex].value=="computer_science")
	{
		document.myform.div.disabled=false;
	}
	else
	{
		document.myform.div.disabled=true;
	}
}
</script>
<?php
mysql_connect("localhost","root","shabnam") or die(mysql_error());
mysql_select_db("attendance");
$sql="SELECT subject_code,subject_name FROM `subject` WHERE elective='yes'"; 
$result=mysql_query($sql); 
$options=""; 

while ($row=mysql_fetch_array($result)) { 

    $subject_code=$row["subject_code"]; 
    $subject_name=$row["subject_name"]; 
    $options.="<OPTION VALUE=\"$subject_code\">".strtoupper($subject_name); 
}
?>

<link href="SpryAssets/SpryValidationSelect.css" rel="stylesheet" type="text/css" />
</head>

<body>
<center>
<form name="myform" action="elective_pg1.php" method="post">
<table>
<tr>
<td>
Subject : 
</td>
<td><span id="spryselect1">
  <select name="subject">
    <option id="init2">SELECT</option>
    <?=$options?>
  </select>
  <span class="selectRequiredMsg">Please select an item.</span></span></td>
</tr>
<tr>
<td>
Trim : 
</td>
<td><span id="spryselect2">
  <select name="trim">
    <option id="init3">SELECT</option>
    <option value="10">10</option>
    <option value="11">11</option>
    <option value="12">12</option>
  </select>
  <span class="selectRequiredMsg">Please select an item.</span></span></td>
</tr>
<tr>
<td>
Branch
</td>
<td><span id="spryselect3">
  <select name="stream" onchange="checkDiv()">
    <option id="init4">SELECT</option>
    <option value="information_technology">IT</option>
    <option value="computer_science">CS</option>
    <option value="electronics">ELEX</option>
    <option value="extc">EXTC</option>
    <option value="civil">Civil</option>
    <option value="mechanical">Mech</option>
  </select>
  <span class="selectRequiredMsg">Please select an item.</span></span></td></tr>
<tr><td>Div</td>
<td><span id="spryselect4">
  <select name="div" disabled="disabled">
    <option id="init">SELECT</option>
    <option value="b">B</option>
    <option value="e">E</option>
  </select>
  <span class="selectRequiredMsg">Please select an item.</span></span></td>
</tr>
</table>
<input type="submit" name="submit" value="Submit" />
</form>
</center>
<script type="text/javascript">
var spryselect1 = new Spry.Widget.ValidationSelect("spryselect1", {validateOn:["blur"]});
var spryselect2 = new Spry.Widget.ValidationSelect("spryselect2", {validateOn:["blur"]});
var spryselect3 = new Spry.Widget.ValidationSelect("spryselect3", {validateOn:["blur"]});
var spryselect4 = new Spry.Widget.ValidationSelect("spryselect4", {validateOn:["blur"]});
</script>
</body>
</html> 