<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Attendance Delete</title>
<script language="javascript">
function checkFrm1()
{
	
	
	result = confirm("Are You Sure You Want To Delete The Above Attendance);
	if(result)
	{
		return true;
	}	
	return false;
}
</script>
</head>

<body>
<center>
<?php
	
	//collect data
	
	mysql_connect("localhost","root","shabnam") or die(mysql_error());
	mysql_select_db("attendance");
	
	session_start();
	$subject = $_POST['subj'];
	$_SESSION['subject'] = $subject;
	$date_delete = $_POST['date_fromit'];
	$_SESSION['date_delete'] = $date_delete;
	$slot_delete = $_POST['slot'];
	$_SESSION['slot_delete'] = $slot_delete;
	$faculty_code = $_SESSION['get_fac'];
	$i = 0;
	$flag = 0;
	
	//explode subject
	
	$spitdata = explode('|',$subject);
	
	//splitdata
	
	$sub_name_del = $spitdata[0];
	
	$_SESSION['sub_name_del'] = $sub_name_del;
	
	$div_del = $spitdata[1];
	
	$_SESSION['div_del'] = $div_del;
	
	$year_del = $spitdata[2];
	
	$_SESSION['year_del'] = $year_del;
	
	$stream_del = $spitdata[3];
	
	$_SESSION['stream_del'] = $stream_del;
	
	$trim_del = $spitdata[4];
	
	$_SESSION['trim_del'] = $trim_del;
	
	$curyear_del = $spitdata[5];
	
	$_SESSION['curyear_del'] = $curyear_del;
	
	$sub_code = $spitdata[6];
	
	$_SESSION['sub_code'] = $sub_code;	
	
	$batch_del = $spitdata[7];
	
	$_SESSION['batch_del'] = $batch_del;
	
	$elective_del = $spitdata[8];
	
	$_SESSION['elective_del'] = $elective_del;
	
	$facf_name = $spitdata[9];
	
	$_SESSION['facf_name'] = $facf_name;
	
	$facl_name = $spitdata[10];
	
	$_SESSION['facl_name'] = $facl_name;
	
//	$subject_name."|".$div."|".$year."|".$stream."|".$trim."|".$year1."|".$subject_code."|".$batch."|".$elective."|".$first_name."|".$last_name;
	
	
	if($elective_del=="yes")
	{
		$stream_del = "elective";
		$att_type = "att_elective";
	}
	else
	{
	$att_type="attendance";
	}
	
	
	echo"You have selected:<br/> Faculty Code: ".$faculty_code."</br> Faculty Name: ".$facf_name." ".$facl_name."<br/>Subject Name: ".$sub_name_del;	
	

	
	//Distributing Students in batches
	
	
	if($batch_del=="0")
				{
				
				$student=mysql_query("SELECT gr_no, roll_no FROM $stream_del WHERE division='$div_del' AND trim='$trim_del' AND year='$year_del' ORDER BY roll_no") or die(mysql_error());
				}
				else
				{
					
				$student=mysql_query("SELECT gr_no,roll_no FROM $stream_del WHERE division='$div_del' AND  trim='$trim_del' AND year='$year_del' AND batch='$batch_del' ORDER BY roll_no") or die(mysql_error());
				}
				
				
				
	//fetching students records
	
	if($student==true){
	while($row1=mysql_fetch_array($student))
	{
		$gr[$i]=$row1['gr_no'];
		$roll[$i]=$row1['roll_no'];
		$gr_is=$gr[$i];
		
		

		//fetching attendance
		
		$att_query1 = mysql_query("SELECT faculty_code, subject_code, gr_no, slot, date, type_lec FROM $att_type WHERE gr_no='$gr_is' AND faculty_code='$faculty_code' AND subject_code='$sub_code' AND type_lec='$batch_del' AND slot='$slot_delete' AND date='$date_delete' GROUP BY gr_no") or die(mysql_error()); 
			if($att_query1==true){
			while($row2=mysql_fetch_array($att_query1))
			{	
				$fac_att[$i]=$row2['faculty_code'];
				$sub_att[$i]=$row2['subject_code'];
				$slot_att[$i]=$row2['slot'];
				$date_att[$i]=$row2['date'];
				$batch_att[$i]=$row2['type_lec'];
			}
		
			//fetching students names
			
			$name_query2 = mysql_query("SELECT first_name,middle_name,last_name FROM students WHERE gr_no='$gr_is'") or die(mysql_error());
            while($row3=mysql_fetch_array($name_query2))
			{
				$first_s[$i]=$row3['first_name'];
				$middle_s[$i]=$row3['middle_name'];
				$last_s[$i]=$row3['last_name'];
			}
			$i++;
			}
	}
	}
	
	$count = mysql_num_rows($student);
	$count1=mysql_num_rows($att_query1);

//displaying students records

if($count!=0 && $count1!=0)
{
	echo "<form name=\"myform\" method=\"post\" action=\"delete_attpg3.php\" onsubmit=\"return checkFrm1()\">";
	echo"<br/><u>Number of Records generated</u> : ".$count;
			echo "<br/><table><tr bgcolor=\"#99FF99\">
			<td>Date</td>
			<td>Slot</td>
			<td>Batch</td>
			<td></td>
			<td>GRno</td>
			<td>Roll no</td>
			<td></td>
			<td>First Name</td>
			<td>Last Name</td>
			<td></td>
			</tr>";
	
		for($i=0;$i<$count;$i++){
		
		if($i%2!=0){
echo "<tr bgcolor=\"#FFFFFF\" align=\"center\"><td>".$date_att[$i]."</td><td>".$slot_att[$i]."</td><td>".$batch_att[$i]."</td><td></td><td>".$gr[$i]."</td><td>".$roll[$i]."</td><td></td><td>".$first_s[$i]."</td><td>".$last_s[$i]."</td><td></td></tr>";

		}

		else{
echo "<tr bgcolor=\"#C9C9C9\" align=\"center\"><td>".$date_att[$i]."</td><td>".$slot_att[$i]."</td><td>".$batch_att[$i]."</td><td></td><td>".$gr[$i]."</td><td>".$roll[$i]."</td><td></td><td>".$first_s[$i]."</td><td>".$last_s[$i]."</td><td></td></tr>";
		}	
		

}
echo "</table>";
echo "<input name=\"submit1\" type=\"submit\" id=\"submit1\" value=\"Delete\" />";
echo "</form>";
}
else
{
echo"<br/>No Records Exists";
}
?>
</center>
</body>
</html>