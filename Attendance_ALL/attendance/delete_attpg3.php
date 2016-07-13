<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Attendance Delete</title>
</head>

<body>

<?php

	mysql_connect("localhost","root","shabnam") or die(mysql_error());
	mysql_select_db("attendance");
	
	session_start();
	
	$subject = $_SESSION['subject'];
	echo"<br/>subject:".$subject;
	$date_delete = $_SESSION['date_delete'];
	echo"<br/>date_delete:".$date_delete;
	$slot_delete = $_SESSION['slot_delete'];
	echo"<br/>slot_delete:".$slot_delete;
	$faculty_code = $_SESSION['get_fac'];
	echo"<br/>faculty_code:".$faculty_code;
	$sub_name_del = $_SESSION['sub_name_del'];
	echo"<br/> Subject Name:".$sub_name_del;
	$div_del = $_SESSION['div_del'];
	echo"<br/> Division:".$div_del;
	$year_del = $_SESSION['year_del'];
	echo"<br/> Year_del:".$year_del;
	$stream_del = $_SESSION['stream_del'];
	echo"<br/> Stream:".$stream_del;
	$trim_del = $_SESSION['trim_del'];
	echo"<br/> Trim:".$trim_del;	
	$curyear_del = $_SESSION['curyear_del'];
	echo"<br/> curyear_del:".$curyear_del;	
	$sub_code = $_SESSION['sub_code'];	
	echo"<br/> Subject Code:".$sub_code;	
	$batch_del = $_SESSION['batch_del'];
	echo"<br/> batch_del:".$batch_del;	
	$elective_del = $_SESSION['elective_del'];
	echo"<br/> elective_del:".$elective_del;	
	$facf_name = $_SESSION['facf_name'];
	echo"<br/> Faculty Name:".$facf_name;	
	$facl_name = $_SESSION['facl_name'];
	echo" ".$facl_name;
	
	if($elective_del=="yes")
	{
		$stream_del = "elective";
		$att_type = "att_elective";
	}
	else
	{
	$att_type="attendance";
	}
	
	echo"<br/>Stream: ".$stream_del."<br/>att_type: ".$att_type;
	
		if($batch_del=="0")
				{
				
				$student=mysql_query("SELECT gr_no, roll_no FROM $stream_del WHERE division='$div_del' AND trim='$trim_del' AND year='$year_del' ORDER BY roll_no") or die(mysql_error());
				}
				else
				{
					
				$student=mysql_query("SELECT gr_no,roll_no FROM $stream_del WHERE division='$div_del' AND  trim='$trim_del' AND year='$year_del' AND batch='$batch_del' ORDER BY roll_no") or die(mysql_error());
				}
	
		//fetching students records
	
	while($row1=mysql_fetch_array($student))
	{
		$gr[$i]=$row1['gr_no'];
		$roll[$i]=$row1['roll_no'];
		$gr_is=$gr[$i];
		$i++;
	}
	$count = mysql_num_rows($student);

	if($count!=0){
		for($i=0;$i<$count;$i++){
			
			$result = mysql_query("DELETE FROM $att_type WHERE gr_no='$gr[$i]' AND faculty_code='$faculty_code' AND subject_code='$sub_code' AND type_lec='$batch_del' AND slot='$slot_delete' AND date='$date_delete'") or die(mysql_error());
			
		}
	
		if($result==true)
		{
			echo "<script>alert('Sucessful Deletion!')</script>";
		}
		else
		{
			echo "<script>alert('Deletion Failed!')</script>";
		}
	
	}
	else
	{
		echo "<script>alert('No Records Exists!')</script>";
	}


?>

</body>
</html>