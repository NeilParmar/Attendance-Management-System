<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Elective Display</title>
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
<form name="myform" action="elec_display.php" method="post">
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
<?php
if(isset($_POST['submit']))
{
	
	mysql_connect("localhost","root","shabnam") or die(mysql_error());
mysql_select_db("attendance");
	
	$stream=$_POST['stream'];
	$div=$_POST['div'];
	$trim=$_POST['trim'];
	$subject=$_POST['subject'];
	$cur_year=date('Y');
	$valid_year=$cur_year-4;
	
	if($stream="comuter_science")
	{
		$query=mysql_query("SELECT gr_no, roll_no,batch,year,division FROM elective WHERE trim='$trim' AND year<='$cur_year' AND division='$div' AND year>='$valid_year' AND subject_code='$subject' ORDER BY roll_no") or die(mysql_error());
	}
	else
	{
		$query=mysql_query("SELECT gr_no, roll_no,batch,year,division FROM elective WHERE trim='$trim' AND year<='$cur_year' AND year>='$valid_year' AND subject_code='$subject' ORDER BY roll_no") or die(mysql_error());
	}
	$i=0;
	while($r=mysql_fetch_array($query))
	{
		$gr_no_ar[$i]=$r['gr_no'];
		$gr=$gr_no_ar[$i];
		$division[$i]=$r['division'];
		$roll_no_ar[$i]=$r['roll_no'];
		$year_ar[$i]=$r['year'];
		$batch[$i]=$r['batch'];
		$year_show=$year_ar[$i];
		$q2=mysql_query("SELECT first_name,middle_name, last_name FROM students WHERE gr_no='$gr'")or die(mysql_error());
		
		while($ro=mysql_fetch_array($q2))
		{
			$first_name[$i]=$ro['first_name'];
			$middle_name[$i]=$ro['middle_name'];
			$last_name[$i]=$ro['last_name'];
			
		}
		$i++;
	}
	
	$count=mysql_num_rows($query);
	if($count!=0)
	{
		echo "<center>Batch-Year: ".$year_show." Trim: ".$trim." Subject : ".strtoupper($subject)."<br/><table align=\"center\"><tr bgcolor=\"#99FF99\"><td>Roll no</td><td>Gr No</td><td> </td><td>Name</td> <td></td><td>Division</td><td>Batch</td></tr>";	
		for($i=0;$i<$count;$i++)
		{
			if($i%2!=0)
			{
				echo "<tr  align=\"center\" bgcolor=\"#FFFFFF\"><td>".$roll_no_ar[$i]."</td><td>".$gr_no_ar[$i]."</td><td>".$first_name[$i]."</td><td>".$middle_name[$i]."</td><td>".$last_name[$i]."</td><td>".$division[$i]."</td><td>".$batch[$i]."</td></tr>";
			}
			else
			{
				echo "<tr align=\"center\" bgcolor=\"#C9C9C9\"><td>".$roll_no_ar[$i]."</td><td>".$gr_no_ar[$i]."</td><td>".$first_name[$i]."</td><td>".$middle_name[$i]."</td><td>".$last_name[$i]."</td><td>".$division[$i]."</td><td>".$batch[$i]."</td></tr>";
			}

		}
	}
	else
	{
		
		echo"<br/> No records exist for your selection ";
	}
		
}
?>
    
