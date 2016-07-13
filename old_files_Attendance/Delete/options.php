<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<script src="SpryAssets/SpryValidationSelect.js" type="text/javascript"></script>
<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<link href="SpryAssets/SpryValidationSelect.css" rel="stylesheet" type="text/css" />
<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />



<link rel="stylesheet" type="text/css" href="calendar.css" />
</head>

<?php

mysql_connect("sql104.123bemyhost.com","mctbm_8596553","khushbu") or die(mysql_error());
mysql_select_db("mctbm_8596553_attendance_1");

session_start();

$gr_no=$_SESSION['gr_no'];
$first_name=$_SESSION['first_name'];

$sql="SELECT DISTINCT first_name FROM `students` ";
$result=mysql_query($sql); 

$options=""; 


while ($row=mysql_fetch_array($result)) { 

    
    
   
	$first_name=$row["first_name"]; 
        $options.="<OPTION VALUE=\"$first_name\">".$first_name; 
    
   
}

?>

<body>

<center>
<form method="post" action="options.php">
<table border="0">
  <tr>
    <td>Select a name</td>
    <td><span id="spryselect1">
      <select name="first_name">
        <option name="initial1">SELECT</option>
        <?=$options?>
      </select>
<span class="selectRequiredMsg">Please select an item.</span></span></td>
  </tr>

    </select>
    <span class="selectRequiredMsg">Please select an item.</span></span>
  </table>
<input name="submit" type="submit" />
<input name="reset" type="reset" />
</form>
</center>
<script type="text/javascript">
var spryselect1 = new Spry.Widget.ValidationSelect("spryselect1", {validateOn:["blur"]});
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "integer", {validateOn:["blur", "change"]});
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2", "date", {format:"yyyy-mm-dd"});
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3", "time", {validateOn:["blur"], hint:"(e.g. 02:00)"});
var spryselect2 = new Spry.Widget.ValidationSelect("spryselect2");
</script>
</body>
</html>


