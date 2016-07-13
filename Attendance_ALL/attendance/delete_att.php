<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>DELETE ATTENDANCE</title>
<link rel="stylesheet" type="text/css" href="calendar.css" />
<script type="text/javascript" src="calendar.js"></script>
<script src="SpryAssets/SpryValidationSelect.js" type="text/javascript"></script>
<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<link href="SpryAssets/SpryValidationSelect.css" rel="stylesheet" type="text/css" />
<script language="javascript">
function checkFrm()
{
	var r = document.myform.subj.options[document.myform.subj.selectedIndex].value;
	var slt = document.myform.slot.options[document.myform.slot.selectedIndex].value;
	var m =r.split("|",11);
	
	
	result = confirm("Are You Sure You Want To Delete Attendance Where: Faculty Name: "+m[9]+" "+m[10]+"  Subject Name: "+m[0]+"  Slot: "+slt);
	if(result)
	{
		return true;
	}	
	return false;
}
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
		window.location.href = "delete_att.php?value=" +javaScriptVariable; 
		document.myform.subj.disabled=false;
		document.myform.subj.focus();
		

	}
}
</script>
</head>
<?php

mysql_connect("localhost","root","shabnam") or die(mysql_error());
mysql_select_db("attendance");


$cur_year=date('Y');
$valid_year=$cur_year-4;

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
   echo"Faculty Selected: ".$full_names."<br/>Now Select Subject from Subject Name";
	
$cur_year=date('Y');
$valid_year=$cur_year-4;
$options2="";
$query_get="SELECT DISTINCT subject_code,division,year,trim,branch_name,batch,EXTRACT(YEAR from trim_start)  FROM subject_allocation WHERE faculty_code='$value' AND year<='$cur_year' AND year>='$valid_year'";
	$result_get=mysql_query($query_get) or die(mysql_error());
	while($r_sa=mysql_fetch_array($result_get))
	{
		$subject_code=$r_sa["subject_code"]; 
  		$div=$r_sa["division"];
		$batch=$r_sa["batch"];
		$stream=$r_sa["branch_name"];
		$trim=$r_sa["trim"];
		$year=$r_sa["year"];
		$year1=$r_sa['EXTRACT(YEAR from trim_start)'];
		$query_sub1="SELECT subject_name,elective FROM subject WHERE subject_code='$subject_code' ORDER BY subject_name";
		$result_sub1=mysql_query($query_sub1) or die(mysql_error());
		while ($row1=mysql_fetch_array($result_sub1)) 
		{ 

			$subject_name=$row1["subject_name"]; 
			$elective=$row1["elective"];
	
			$pass_name=$subject_name."|".$div."|".$year."|".$stream."|".$trim."|".$year1."|".$subject_code."|".$batch."|".$elective."|".$first_name."|".$last_name;
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
}
?>

</head>

<body>
<form name="myform" action="delete_attpg2.php" method="post" onsubmit="return checkFrm()">
<center>
<table width="285" border="0">
  <tr>
    <td>Faculty Name</td>
    <td>
      <label for="faculty"></label>
      <select name="faculty" id="faculty" onchange="checkFaculty()" >
        <option name="initial">Select</option>
        <?=$options1?>
      </select>
      </td>
  </tr>
  <tr>
    <td>Subject Name</td>
    <td><span id="spryselect2">
      <label for="subject_name"></label>
      <select name="subj" id="subj">
        <option name="initial"> subj | div | batch | trim</option>
        <?=$options2?>
      </select>
      <span class="selectRequiredMsg">Please select an item.</span></span></td>
  </tr>
  <tr>
    <td>Slot</td>
    <td><span id="spryselect1">
      <label for="slot"></label>
      <select name="slot" id="slot">
      <option value="initial">Select</option>
      <option value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>
      </select>
      <span class="selectRequiredMsg">Please select an item.</span></span></td>
  </tr>
  <tr>
   <td>Date</td>
    <td><span id="sprytextfield1">
      <label for="date_fromit"></label>
      <input type="text" name="date_fromit" id="date_fromit" value="click here!" />
      <script type="text/javascript">
	  calendar.set("date_fromit");
	  </script>
      
      <span class="textfieldRequiredMsg">A value is required.</span></span></td>
  </tr>
</table>
<input name="submit" type="submit" id="submit" value="Submit" />
</center>
</form>
<script type="text/javascript">
var spryselect2 = new Spry.Widget.ValidationSelect("spryselect2", {validateOn:["change", "blur"]});
var spryselect1 = new Spry.Widget.ValidationSelect("spryselect1");
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "none", {validateOn:["blur", "change"]});
</script>
</body>
</html>