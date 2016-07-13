<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Attendance</title>
<script language="javascript">
function checkArray(form, arrayName)
  {
    var retval = new Array();
	var count=0;
    for(var i=0; i < form.elements.length; i++) {
      var el = form.elements[i];
      if(el.type == "checkbox" && el.name == arrayName && !el.checked) {
	var val=el.value.split("|");
	count++;
        retval.push(val[1]);
      }
    }
	count="\nNumber of students absent : "+count;
	retval.push(count);
    return retval;
  }
  
 function checkForm(form)
  {
    var itemsChecked = checkArray(myForm, "checkbox[]");
    result=confirm("Absent students roll number : " + itemsChecked );
	if(result)
	{
		return true;
	}
	return false;
  }
  </script>
<script>
function select(a) 
{
    var theForm = document.myForm;
    for (i=0; i<theForm.elements.length; i++)
 {
        if (theForm.elements[i].name=='checkbox[]')
            theForm.elements[i].checked = a;
 }
}

</script>
</head>

<body>

<?php

session_start();
$_SESSION['slot']=$_POST['slot'];
$_SESSION['date']=$_POST['date'];
$_SESSION['start_time']=$_POST['start_time'];
$_SESSION['subject_name']=$_POST['subject_name'];

$subject_name=$_SESSION['subject_name'];
$faculty_code=$_SESSION['faculty'];
$div=$_POST['div'];
$splitdiv=explode("|",$div);
$div=$splitdiv[0];
$batch=$splitdiv[1];
$_SESSION['batch']=$batch;
$_SESSION['div']=$div;
mysql_connect("localhost","root","shabnam") or die(mysql_error());
mysql_select_db("attendance");

$sub="SELECT branch_name,elective FROM subject WHERE subject_code='$subject_name'";
$table_name=mysql_query($sub);
while($row=mysql_fetch_array($table_name))
{
	$table=$row['branch_name'];
	$elective=$row['elective'];
	$_SESSION['elective']=$elective;
	if($elective=="yes")
	{
		$table="elective";
	}
	
	$yr_query=mysql_query("SELECT trim,year FROM subject_allocation WHERE subject_code='$subject_name' AND faculty_code='$faculty_code' AND division='$div'") or die(mysql_error());
	while($row_yr=mysql_fetch_array($yr_query))
	{
		$trim_ch=$row_yr['trim'];
		$year_ch=$row_yr['year'];
		if($batch==0){	
			if($elective=="yes")
			{
				$query="SELECT gr_no,batch FROM $table WHERE `division`='$div' AND `trim`='$trim_ch' AND `year`='$year_ch' AND subject_code='$subject_name' ORDER BY roll_no";
			}
			else
			{
				$query="SELECT gr_no,batch FROM $table WHERE `division`='$div' AND `trim`='$trim_ch' AND `year`='$year_ch' ORDER BY roll_no";
			}
			$finresult=mysql_query($query) or die(mysql_error());
		}
		else
		{
			if($elective=="yes")
			{
				$query="SELECT gr_no,batch FROM $table WHERE `division`='$div' AND `trim`='$trim_ch' AND `year`='$year_ch' AND batch='$batch' AND subject_code='$subject_name' ORDER BY roll_no";
			}
			else
			{
				$query="SELECT gr_no,batch FROM $table WHERE `division`='$div' AND `trim`='$trim_ch' AND `year`='$year_ch' AND batch='$batch' ORDER BY roll_no";			}
		$finresult=mysql_query($query) or die(mysql_error());
		}
	}
}

$gr=array();
$first_name=array();
$last_name=array();
$roll_no;
$i=0;
while($rows=mysql_fetch_array($finresult))
{
	$gr[$i]=$rows['gr_no'];
	$gr_no=$gr[$i];
	$batch[$i]=$rows['batch'];
	$name=mysql_query("SELECT first_name,middle_name,last_name FROM students WHERE gr_no='$gr_no'");
	
	while($rows1=mysql_fetch_array($name))
	{
		$first_name[$i]=$rows1['first_name'];
		$last_name[$i]=$rows1['last_name'];
		$middle_name[$i]=$rows1['middle_name'];
	}
	
	
	$roll=mysql_query("SELECT roll_no FROM $table WHERE gr_no='$gr_no'");
	while($row_rol=mysql_fetch_array($roll))
	{
		$roll_no[$i]=$row_rol['roll_no'];
		$val[$i]=$gr[$i]."|";
		$val[$i].=$roll_no[$i];
	}
	$i++;
}



$count=mysql_num_rows($finresult);
$_SESSION['gr']=$gr;
$_SESSION['count']=$count;


?>
<center>
<?
if($count!=0)
{
?>

<a href="javascript:select(1)">Check all </a>  |  <a href="javascript:select(0)">Uncheck all</a>

<form name="myForm" method="post" action="pass.php" onsubmit="return checkForm(this)" >
<table border="0" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
<tr>
<td  bgcolor="#FFFFFF">Attendance</td>
<td  bgcolor="#FFFFFF"><strong>Roll Number</strong></td>
<td  bgcolor="#FFFFFF"><strong>Gr. Number</strong></td>
<td  bgcolor="#FFFFFF"><strong></strong></td>
<td  bgcolor="#FFFFFF"><strong>Name</strong></td>
<td  bgcolor="#FFFFFF"><strong></strong></td>
<td  bgcolor="#FFFFFF"><strong>Batch</strong></td>
</tr>

<?php
for($i=0;$i<$count;$i++){
if($i%2!=0)
{
?>

<tr>
<td align="center" bgcolor="#FFFFFF"><input name="checkbox[]" type="checkbox" id="checkbox[]" value="<? echo $val[$i]; ?>" checked="checked"/></td>
<td bgcolor="#FFFFFF"><? echo $roll_no[$i]; ?></td>
<td bgcolor="#FFFFFF"><? echo $gr[$i]; ?></td>
<td bgcolor="#FFFFFF"><? echo $first_name[$i]; ?></td>
<td bgcolor="#FFFFFF"><? echo $middle_name[$i]; ?></td>
<td bgcolor="#FFFFFF"><? echo $last_name[$i]; ?></td>
<td bgcolor="#FFFFFF"><? echo $batch[$i]; ?></td>
</tr>

<?php
}
else
{
?>

<tr>
<td align="center" bgcolor="#C9C9C9"><input name="checkbox[]" type="checkbox" id="checkbox[]" value="<? echo $val[$i]; ?>" checked="checked"/></td>
<td bgcolor="#C9C9C9"><? echo $roll_no[$i]; ?></td>
<td bgcolor="#C9C9C9"><? echo $gr[$i]; ?></td>
<td bgcolor="#C9C9C9"><? echo $first_name[$i]; ?></td>
<td bgcolor="#C9C9C9"><? echo $middle_name[$i]; ?></td>
<td bgcolor="#C9C9C9"><? echo $last_name[$i]; ?></td>
<td bgcolor="#C9C9C9"><? echo $batch[$i]; ?></td>
</tr>
<?php
}
}
?>
</table>
<input name="submit1" type="submit" id="submit1" value="Give Attendance"/>
</form>
<?
}
	else
	{
		
		echo"<br/> No records exist for your selection ";
	}
?>
</center>
</body>
</html>

