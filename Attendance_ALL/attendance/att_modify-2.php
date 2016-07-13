<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Attendance_modify</title>
</head>

<body>
<?php

session_start();

$slot=$_SESSION['slot'];
$date=$_SESSION['date'];
$start_time=$_SESSION['start_time'];
$subject_name=$_SESSION['subject_name'];
$faculty_code=$_SESSION['get_fac'];
$count=$_SESSION['count'];
$splitdata = explode('|', $subject_name);
	
	$subj=$splitdata[0];
	$div=$splitdata[1];
	$batch=$splitdata[2];
	$table=$splitdata[3];
	$trim=$splitdata[4];
	$year=$splitdata[5];
	$subject_name=$splitdata[6];
	$batch_pr=$splitdata[7];
	$elective=$splitdata[8];
	
$absent=array();
$absent_gr=array();
$checkbox=array();
$gr_all=array(); 
$checkbox[$i]=0;
if($elective=="yes")
{
	$type_att="att_elective";
}
else
{
	$type_att="attendance";
}

mysql_connect("localhost","root","shabnam") or die(mysql_error());
mysql_select_db("attendance");


$i=0;
foreach($_POST['checkbox'] as $value)
{	
	
	$splitdata = explode('|', $value);	
	$checkbox[$i]=$splitdata[0];
	$checkbox_r[$i]=$splitdata[1];

	$i++;
}
$pre_count=$i--;
if(isset($_POST['submit1']))
{
for($i=0;$i<$pre_count;$i++)

{
		$sub_id = $checkbox[$i];
		$sql = "UPDATE $type_att SET att_hours='$slot' WHERE faculty_code='$faculty_code' AND gr_no='$sub_id' AND subject_code='$subject_name' AND date='$date' AND start_time='$start_time' AND type_lec='$batch_pr'";
		$result = mysql_query($sql) or die(mysql_error());
}		
if($result==true)
{
	echo "<script>alert('Sucessful Update!')</script>";
	echo"<br/><center>Data successfully Stored in database";
	echo"<br/>Would you like to navigate to <a href=\"admin_homehtml.php\">Home</a></center> ";
	return true;
}
else
{
	echo "<script>alert('Error!!')</script>";
	return false;
}
}
?>
