<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<script src="SpryAssets/SpryValidationSelect.js" type="text/javascript"></script>
<link href="SpryAssets/SpryValidationSelect.css" rel="stylesheet" type="text/css" />
<?php
mysql_connect("localhost","root","shabnam") or die(mysql_error());
mysql_select_db("attendance");
session_start();
$faculty=$_SESSION['faculty'];
$cur_year=date('Y');
$valid_year=$cur_year-4;
$sql="SELECT DISTINCT subject_code FROM `subject_allocation` WHERE faculty_code='$faculty' AND year<='$cur_year' AND year>='$valid_year'";
$result=mysql_query($sql); 
$sqld="SELECT DISTINCT division FROM `subject_allocation` WHERE faculty_code='$faculty' AND year<='$cur_year' AND year>='$valid_year'";
$resultd=mysql_query($sqld);
$options=""; 
$opt_div="";

while ($row=mysql_fetch_array($result)) { 

    $subject_code=$row["subject_code"]; 
    $sql_sub="SELECT DISTINCT subject_name FROM `subject` WHERE subject_code='$subject_code'";
    $result_sub=mysql_query($sql_sub);
    while($row_sub=mysql_fetch_array($result_sub))
    {
	$subject_name=$row_sub["subject_name"]; 
        $options.="<OPTION VALUE=\"$subject_code\">".$subject_name; 
    }
   
}
while ($rowd=mysql_fetch_array($resultd)) { 
	
	$div=$rowd["division"];
	$opt_div.="<OPTION VALUE=\"$div\">".$div;

}

?>

</head>

<form name="form" method="post" action="weekly.php">
<table cellspacing="15">
<tr>
<td>Subject</td>
<td>
  <select name="subject_select">
    <option name="init1">SELECT</option>
    <?=$options?>
  </select>
  </td>
  </tr>
  <tr>
<td>Division</td>
<td>  <select name="div_select">
    <option name="init">SELECT</option>
    <?=$opt_div?>
  </select>
 </td>
  </tr>
  </table>
<input type="submit" name="submit" value="Submit" />
</form>

</body>
</html>

<?php
if(isset($_POST['submit']))
{
	$subject_code=$_POST['subject_select'];
	$div=$_POST['div_select'];
	session_start();
	$faculty=$_SESSION['faculty'];
	
	mysql_connect("localhost","root","shabnam") or die(mysql_error());
mysql_select_db("attendance");
	$query="SELECT no_of_hours,subject_name,subject.subject_code,sa.division,trim_start,trim_end FROM subject,subject_allocation as sa WHERE sa.subject_code=subject.subject_code AND sa.faculty_code='$faculty'";

	$result=mysql_query($query) or die(mysql_error());
	
	while($row=mysql_fetch_array($result))
	{
		$no_of_hrs=$row['no_of_hours'];
		$subj_name=$row['subject_name'];
		$subj_code=$row['subject_code'];
		$start_date=$row['trim_start'];
		$end_date=$row['trim_end'];
		$div=$row['division'];
		$next_date=strtotime("+7 day",strtotime($start_date));
		$weeks = round((strtotime($end_date) - strtotime($start_date)) / (60 * 60 * 24*7));
		$per_week=round($no_of_hrs/$weeks);
		$slot_calc=array();
		
		$query_date="SELECT date,slot FROM attendance WHERE faculty_code='$faculty' AND subject_code='$subj_code' GROUP BY date,faculty_code";
		$date_result=mysql_query($query_date) or die(mysql_error());
			
		while($row_date=mysql_fetch_array($date_result))
		{
			$dates_temp=$row_date['date'];
			$slot_temp=$row_date['slot'];
			echo "slot: ".$slot_temp." date: ".$dates_temp."<br/>";
		}
		
		for($i=0;$i<$weeks;$i++)
		{
			$in_query="SELECT date FROM attendance WHERE date>='$start_date' AND date>='$next_date' AND faculty_code='$faculty' AND division='$div' AND subject_code='$subj_code' GROUP BY date,faculty_code";
			$in_result=mysql_query($in_query);
			
			while(mysql_fetch_array($in_result))
			{
				
		
		echo "<u>subject name</u>: ".$subj_name." <u>division </u>: ".$div." <u>no of hours alloted</u>: ".$no_of_hrs;
		echo"<br/>";
		echo"<u>trim start</u>: ".$start_date." <u>end trim</u>: ".$end_date."<br/>";
		echo"<u>weeks</u>: ".$weeks." <u>hours per week</u>: ".$per_week."<br/>";
		
	}
		}
	}
}
?>	
	
	
	
