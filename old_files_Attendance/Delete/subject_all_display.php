<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Delete_SubjectAllocated</title>
</head>

<body>

<?php

mysql_connect("sql104.123bemyhost.com","mctbm_8596553","khushbu") or die("could not connect");
mysql_select_db("mctbm_8596553_attendance_1");

$facu="SELECT DISTINCT subject_code, faculty_code, year, trim, trim_start, trim_end, branch_name, division FROM subject_allocation";
$finresult=mysql_query($facu) or die(mysql_error());
	

$subject_code=array();
$faculty_code=array();
$year=array();
$trim=array();
$trim_start=array();
$trim_end=array();
$branch_name=array();
$division=array();

$i=0;
while($rows=mysql_fetch_array($finresult))
{
	$subject_code[$i]=$rows['subject_code'];
	$faculty_code[$i]=$rows['faculty_code'];
	$year[$i]=$rows['year'];
	$trim[$i]=$rows['trim'];	
	$trim_start[$i]=$rows['trim_start'];
	$trim_end[$i]=$rows['trim_end'];
	$branch_name[$i]=$rows['branch_name'];
	$division[$i]=$rows['division'];

	$i++;
}



$count=mysql_num_rows($finresult);
$_SESSION['subject_code']=$subject_code;
$_SESSION['count']=$count;


?>


<table border="0" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
<tr>

<td  bgcolor="#FFFFFF"><strong>Subject Code</strong></td>
<td  bgcolor="#FFFFFF"><strong>Faculty Code</strong></td>
<td  bgcolor="#FFFFFF"><strong>Year</strong></td>
<td  bgcolor="#FFFFFF"><strong>Trim</strong></td>
<td  bgcolor="#FFFFFF"><strong>Trim Start</strong></td>
<td  bgcolor="#FFFFFF"><strong>Trim End</strong></td>
<td  bgcolor="#FFFFFF"><strong>Branch Name</strong></td>
<td  bgcolor="#FFFFFF"><strong>Division</strong></td>

</tr>

<?php
for($i=0;$i<$count;$i++){
if($i%2!=0)
{
?>

<tr>

<td bgcolor="#FFFFFF"><? echo $subject_code[$i]; ?></td>
<td bgcolor="#FFFFFF"><? echo $faculty_code[$i]; ?></td>
<td bgcolor="#FFFFFF"><? echo $year[$i]; ?></td>
<td bgcolor="#FFFFFF"><? echo $trim[$i]; ?></td>
<td bgcolor="#FFFFFF"><? echo $trim_start[$i]; ?></td>
<td bgcolor="#FFFFFF"><? echo $trim_end[$i]; ?></td>
<td bgcolor="#FFFFFF"><? echo $branch_name[$i]; ?></td>
<td bgcolor="#FFFFFF"><? echo $division[$i]; ?></td>

</tr>

<?php
}
else
{
?>

<tr>

<td bgcolor="#C9C9C9"><? echo $subject_code[$i]; ?></td>
<td bgcolor="#C9C9C9"><? echo $faculty_code[$i]; ?></td>
<td bgcolor="#C9C9C9"><? echo $year[$i]; ?></td>
<td bgcolor="#C9C9C9"><? echo $trim[$i]; ?></td>
<td bgcolor="#C9C9C9"><? echo $trim_start[$i]; ?></td>
<td bgcolor="#C9C9C9"><? echo $trim_end[$i]; ?></td>
<td bgcolor="#C9C9C9"><? echo $branch_name[$i]; ?></td>
<td bgcolor="#C9C9C9"><? echo $division[$i]; ?></td>
</tr>
<?php
}
}
?>

</table>


</body>
</html>

