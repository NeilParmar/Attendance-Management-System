<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Attendance</title>

</head>

<body>

<?php

mysql_connect("localhost","root","shabnam") or die(mysql_error());
mysql_select_db("attendance");


$facu="SELECT Faculty_code,first_name,middle_name,last_name,gender,type,designation FROM faculty ORDER BY first_name";
$finresult=mysql_query($facu) or die(mysql_error());
	

$Faculty_code=array();
$first_name=array();
$middle_name=array();
$last_name=array();
$type=array();
$gender=array();
$designation=array();

$i=0;
while($rows=mysql_fetch_array($finresult))
{
	$fac[$i]=$rows['Faculty_code'];
	$Faculty_code=$fac[$i];	
	$first_name[$i]=$rows['first_name'];
	$middle_name[$i]=$rows['middle_name'];
	$last_name[$i]=$rows['last_name'];
	$Faculty_code[$i]=$rows['Faculty_code'];
	$gender[$i]=$rows['gender'];
	$type[$i]=$rows['type'];
	$designation[$i]=$rows['designation'];
	
	$i++;
}



$count=mysql_num_rows($finresult);
$_SESSION['Faculty_code']=$fac;
$_SESSION['count']=$count;


?>



<center>
<table border="0" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
<tr>

<td  bgcolor="#FFFFFF"><strong>First Name</strong></td>
<td  bgcolor="#FFFFFF"><strong>Middle Name</strong></td>
<td  bgcolor="#FFFFFF"><strong>Last Name</strong></td>
<td  bgcolor="#FFFFFF"><strong>Faculty Code</strong></td>
<td  bgcolor="#FFFFFF"><strong>Gender</strong></td>
<td  bgcolor="#FFFFFF"><strong>Type</strong></td>
<td  bgcolor="#FFFFFF"><strong>Designation</strong></td>
</tr>

<?php
for($i=0;$i<$count;$i++){
if($i%2!=0)
{
?>

<tr>


<td bgcolor="#FFFFFF"><? echo $first_name[$i]; ?></td>
<td bgcolor="#FFFFFF"><? echo $middle_name[$i]; ?></td>
<td bgcolor="#FFFFFF"><? echo $last_name[$i]; ?></td>
<td bgcolor="#FFFFFF"><? echo $fac[$i]; ?></td>
<td bgcolor="#FFFFFF"><? echo $gender[$i]; ?></td>
<td bgcolor="#FFFFFF"><? echo $type[$i]; ?></td>
<td bgcolor="#FFFFFF"><? echo $designation[$i]; ?></td>

</tr>

<?php
}
else
{
?>

<tr>

<td bgcolor="#C9C9C9"><? echo $first_name[$i]; ?></td>
<td bgcolor="#C9C9C9"><? echo $middle_name[$i]; ?></td>
<td bgcolor="#C9C9C9"><? echo $last_name[$i]; ?></td>
<td bgcolor="#C9C9C9"><? echo $fac[$i]; ?></td>
<td bgcolor="#C9C9C9"><? echo $gender[$i]; ?></td>
<td bgcolor="#C9C9C9"><? echo $type[$i]; ?></td>
<td bgcolor="#C9C9C9"><? echo $designation[$i]; ?></td>

</tr>
<?php
}
}
?>

</table>
</center>

</body>
</html>

