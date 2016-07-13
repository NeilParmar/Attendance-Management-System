<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php

session_start();

$slot=$_SESSION['slot'];
$date=$_SESSION['date'];
$start_time=$_SESSION['start_time'];
$subject_name=$_SESSION['subject_name'];
$faculty_code=$_SESSION['Faculty_code'];
$count=$_SESSION['count'];
$div=$_SESSION['div'];
$batch=$_SESSION['batch'];
$elective=$_SESSION['elective'];
$absent=array();
$absent_gr=array();
$checkbox=array();
$gr_all=array(); 
$i=0;
$checkbox[$i]=0;
if($elective=="yes")
{
	$type_att="att_elective";
}
else
{
	$type_att="attendance";
}

foreach($_SESSION['gr'] as $value)
{

	$splitdata = explode('|', $value);	
	$rol_all[$i]=$splitdata[1];
	$gr_all[$i]=$splitdata[0];
	$i++;
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
$absent=array_diff($gr_all,$checkbox);
$i=0;
foreach($absent as $value)
{
	$absent_gr[$i]=$value;
	$i++;
}
$abs_count=$i--;
if(isset($_POST['submit1']))
{
for($i=0;$i<$pre_count;$i++)

{
	
		$sub_id = $checkbox[$i];
		//echo "present: ".$sub_id."<br>";
		$sql = "INSERT INTO $type_att (faculty_code,gr_no,subject_code,slot,att_hours,date,start_time,type_lec) VALUES('$faculty_code','$sub_id','$subject_name','$slot','$slot','$date','$start_time','$batch')";
		$result = mysql_query($sql) or die(mysql_error());
}		
for($i=0;$i<$abs_count;$i++)
{
		//echo "absent: ".$sub_id."<br>";
		$sub_id = $absent_gr[$i];
		$sql = "INSERT INTO $type_att (faculty_code,gr_no,subject_code,slot,att_hours,date,start_time,type_lec) VALUES('$faculty_code','$sub_id','$subject_name','$slot',0,'$date','$start_time','$batch')";
		$result = mysql_query($sql) or die(mysql_error());
	
}
if($result==true)
{
	echo "<script>alert('Sucessful Update!')</script>";
	echo"<br/><center>Data successfully Stored in database";
	echo"<br/>Would you like to navigate to <a href=\"teacher_homehtml.php\">Home</a></center> ";
	return true;
}
else
{
	echo "<script>alert('Error!!')</script>";
	return false;
}
}
?>
