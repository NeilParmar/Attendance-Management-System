<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Delete_Subject</title>

</head>

<body>

<?php

mysql_connect("sql104.123bemyhost.com","mctbm_8596553","khushbu") or die("could not connect");
mysql_select_db("mctbm_8596553_attendance_1");

$facu="SELECT DISTINCT subject_code, subject_name, no_of_hours, trim, branch_name FROM subject";
$finresult=mysql_query($facu) or die(mysql_error());
	

$subject_code=array();
$no_of_hours=array();
$subject_name=array();
$trim=array();
$branch_name=array();


$i=0;
while($rows=mysql_fetch_array($finresult))
{
	$subject_code[$i]=$rows['subject_code'];
	$subject_name[$i]=$rows['subject_name'];
	$no_of_hours[$i]=$rows['no_of_hours'];
	$trim[$i]=$rows['trim'];	
	$branch_name[$i]=$rows['branch_name'];

	$i++;
}



$count=mysql_num_rows($finresult);
$_SESSION['subject_code']=$subject_code;
$_SESSION['count']=$count;


?>


<table border="0" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
<tr>

<td  bgcolor="#FFFFFF"><strong>Subject Code</strong></td>
<td  bgcolor="#FFFFFF"><strong>Subject Name</strong></td>
<td  bgcolor="#FFFFFF"><strong>Number Of Hours</strong></td>
<td  bgcolor="#FFFFFF"><strong>Trim</strong></td>
<td  bgcolor="#FFFFFF"><strong>Branch Name</strong></td>

</tr>

<?php
for($i=0;$i<$count;$i++){
if($i%2!=0)
{
?>

<tr>

<td bgcolor="#FFFFFF"><? echo $subject_code[$i]; ?></td>
<td bgcolor="#FFFFFF"><? echo $subject_name[$i]; ?></td>
<td bgcolor="#FFFFFF"><? echo $no_of_hours[$i]; ?></td>
<td bgcolor="#FFFFFF"><? echo $trim[$i]; ?></td>
<td bgcolor="#FFFFFF"><? echo $branch_name[$i]; ?></td>

</tr>

<?php
}
else
{
?>

<tr>

<td bgcolor="#C9C9C9"><? echo $subject_code[$i]; ?></td>
<td bgcolor="#C9C9C9"><? echo $subject_name[$i]; ?></td>
<td bgcolor="#C9C9C9"><? echo $no_of_hours[$i]; ?></td>
<td bgcolor="#C9C9C9"><? echo $trim[$i]; ?></td>
<td bgcolor="#C9C9C9"><? echo $branch_name[$i]; ?></td>
</tr>
<?php
}
}
?>

</table>


</body>
</html>

