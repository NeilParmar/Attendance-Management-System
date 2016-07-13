<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Attendance-Modify</title>
<script language="javascript">
function checkArray(form, arrayName)
  {
    var retval = new Array();
	var count=0;
    for(var i=0; i < form.elements.length; i++) {
      var el = form.elements[i];
      if(el.type == "checkbox" && el.name == arrayName && el.checked) {
	var val=el.value.split("|");
	count++;
        retval.push(val[1]);
      }
    }
	count="\nNumber of students to be updated : "+count;
	retval.push(count);
    return retval;
  }
  
 function checkForm(form)
  {
    var itemsChecked = checkArray(myForm, "checkbox[]");
    result=confirm("Update att for roll number : " + itemsChecked );
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

mysql_connect("localhost","root","shabnam") or die(mysql_error());
mysql_select_db("attendance");


session_start();
$_SESSION['slot']=$_POST['slot'];
$_SESSION['date']=$_POST['date'];
$_SESSION['start_time']=$_POST['start_time'];
$date=$_SESSION['date'];
$start_time=$_SESSION['start_time'];
$_SESSION['subject_name']=$_POST['subj'];
$subject_code=$_SESSION['subject_name'];
$splitdata = explode('|', $subject_code);
$get_fac=$_SESSION['get_fac'];
	$subject_code=$_POST['subj'];
	$q=mysql_query("SELECT first_name,middle_name,last_name FROM faculty WHERE faculty_code='$get_fac'");
	while($r=mysql_fetch_array($q))
	{
		$fac_name=$r['first_name']." ".$r['middle_name']." ".$r['last_name'];
	}
	
	$splitdata = explode('|', $subject_code);
	$gr=array();
	$subj=$splitdata[0];
	$div=$splitdata[1];
	$batch=$splitdata[2];
	$stream=$splitdata[3];
	$trim=$splitdata[4];
	$year=$splitdata[5];
	$sub_code=$splitdata[6];
	$batch_pr=$splitdata[7];
	$elective=$splitdata[8];
		if($elective=="yes")
		{
			$stream="elective";
			$att_type="att_elective";
		}
		else
		{
			$att_type="attendance";
		}
	$i=0;
				if($batch_pr=="0")
				{
					if($elective=="yes")
					{
				$student=mysql_query("SELECT gr_no,roll_no,batch FROM $stream WHERE division='$div' AND trim='$trim' AND year='$batch' AND subject_code='$sub_code' ORDER BY roll_no") or die(mysql_error());
					}
					else
					{
						$student=mysql_query("SELECT gr_no,roll_no,batch FROM $stream WHERE division='$div' AND trim='$trim' AND year='$batch' ORDER BY roll_no") or die(mysql_error());
					}
						
				}
				else
				{
					if($elective=="yes")
					{

				$student=mysql_query("SELECT gr_no,roll_no,batch FROM $stream WHERE division='$div' AND trim='$trim' AND year='$batch' AND batch='$batch_pr' AND subject_code='$sub_code' ORDER BY roll_no") or die(mysql_error());
					}
					else
					{
				$student=mysql_query("SELECT gr_no,roll_no,batch FROM $stream WHERE division='$div' AND trim='$trim' AND year='$batch' AND batch='$batch_pr' ORDER BY roll_no") or die(mysql_error());
					}
				}
while($row_stu=mysql_fetch_array($student))
		{
			$gr[$i]=$row_stu['gr_no'];
			$roll[$i]=$row_stu['roll_no'];
			$batch_b[$i]=$row_stu['batch'];
			$val[$i]=$gr[$i]."|".$roll[$i];
			$gr_is=$gr[$i];	
		
			
		$att=mysql_query("SELECT slot,att_hours FROM $att_type WHERE gr_no='$gr_is' AND faculty_code='$get_fac' AND subject_code='$sub_code' AND type_lec='$batch_pr' AND date='$date' AND start_time='$start_time'") or die(mysql_error());
			
			while($row_att=mysql_fetch_array($att))
			{
				$slot_att[$i]=$row_att['att_hours'];
				$slot[$i]=$row_att['slot'];
				$flag=1;
			}
			$name_stu=mysql_query("SELECT first_name,middle_name,last_name FROM students WHERE gr_no='$gr_is'") or die(mysql_error());
			while($row_name=mysql_fetch_array($name_stu))
			{
				$first[$i]=$row_name['first_name'];
				$last[$i]=$row_name['last_name'];
				$middle[$i]=$row_name['middle_name'];
			}
			$i++;
		}
$count=mysql_num_rows($student);
$_SESSION['gr']=$gr;
$_SESSION['count']=$count;


?>
<center>
<?
if($count!=0 && $flag!=0)
{
?>

<a href="javascript:select(1)">Check all </a>  |  <a href="javascript:select(0)">Uncheck all</a>

<form name="myForm" method="post" action="att_modify-2.php" onsubmit="return checkForm(this)" >
<table border="0" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
<tr>
<td  bgcolor="#99FF99"><strong>Attendance</strong></td>
<td  bgcolor="#99FF99"><strong>Roll Number</strong></td>
<td  bgcolor="#99FF99"><strong>Gr. Number</strong></td>
<td  bgcolor="#99FF99"><strong></strong></td>
<td  bgcolor="#99FF99"><strong>Name</strong></td>
<td  bgcolor="#99FF99"><strong></strong></td>
<td  bgcolor="#99FF99"><strong>Batch</strong></td>
<td  bgcolor="#99FF99"><strong>Hours</strong></td>

</tr>

<?php
for($i=0;$i<$count;$i++){
if($i%2!=0)
{
?>

<tr>
<td align="center" bgcolor="#FFFFFF"><input name="checkbox[]" type="checkbox" id="checkbox[]" value="<? echo $val[$i]; ?>" checked="checked"/></td>
<td bgcolor="#FFFFFF"><? echo $roll[$i]; ?></td>
<td bgcolor="#FFFFFF"><? echo $gr[$i]; ?></td>
<td bgcolor="#FFFFFF"><? echo $first[$i]; ?></td>
<td bgcolor="#FFFFFF"><? echo $middle[$i]; ?></td>
<td bgcolor="#FFFFFF"><? echo $last[$i]; ?></td>
<td bgcolor="#FFFFFF"><? echo $batch_b[$i]; ?></td>
<td bgcolor="#FFFFFF"><? echo $slot_att[$i]; ?></td>

</tr>

<?php
}
else
{
?>

<tr>
<td align="center" bgcolor="#C9C9C9"><input name="checkbox[]" type="checkbox" id="checkbox[]" value="<? echo $val[$i]; ?>" checked="checked"/></td>
<td bgcolor="#C9C9C9"><? echo $roll[$i]; ?></td>
<td bgcolor="#C9C9C9"><? echo $gr[$i]; ?></td>
<td bgcolor="#C9C9C9"><? echo $first[$i]; ?></td>
<td bgcolor="#C9C9C9"><? echo $middle[$i]; ?></td>
<td bgcolor="#C9C9C9"><? echo $last[$i]; ?></td>
<td bgcolor="#C9C9C9"><? echo $batch_b[$i]; ?></td>
<td bgcolor="#C9C9C9"><? echo $slot_att[$i]; ?></td>

</tr>
<?php
}
}
?>
</table>
<input name="submit1" type="submit" id="submit1" value="Update Attendance"/>
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

