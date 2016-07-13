<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Student Promote</title>
</head>

<body>

<?php

$submit2=$_POST['submit1'];

session_start();

$stream_pas=$_SESSION['sess'];
$trim_pas=$_SESSION['tri'];
$trim=$trim_pas;
$division=$_SESSION['div'];
$count=$_SESSION['count'];

$trim_pas=$trim_pas+1;


$checkbox=array();

$i=0;
$checkbox[$i]=0;
$checkbox=array();



mysql_connect("localhost","root","shabnam") or die(mysql_error());
mysql_select_db("attendance");


foreach($_POST['checkbox'] as $value)
{	
	$checkbox[$i]=$value;
	$i++;
}
$pre_count=$i--;

if(isset($submit2))
{
for($i=0;$i<$pre_count;$i++)

{
	
		$gr_no=$checkbox[$i];
		$splitdata=explode('|',$gr_no);
		$gr_no=$splitdata[0];
		$quer=mysql_query("SELECT DISTINCT roll_no,division,year,batch FROM $stream_pas WHERE gr_no='$gr_no' AND division='$division' AND trim='$trim'") or die(mysql_error());
		while($r_q=mysql_fetch_array($quer))
		{
			$roll_no_pas=$r_q['roll_no'];
			$div_pas=$r_q['division'];
			$year_pas=$r_q['year'];
			$batch=$r_q['batch'];
			//echo" trim: ".$trim_pas;
			//echo" year: ".$year_pas;
			//echo" div: ".$div_pas;
			//echo" rol: ".$roll_no_pas;
		}

		$sql= "INSERT INTO $stream_pas(gr_no,roll_no,trim,division,year,batch) VALUES('$gr_no','$roll_no_pas','$trim_pas','$div_pas','$year_pas','$batch') ";
		$result=mysql_query($sql) or die(mysql_error());
}		

//echo"<br/>Would you like to navigate to <a href=\"admin_home.html\">Home</a> ";
}
if($result==true)
{
	echo "<script>alert('Sucessful Promotion!')</script>";
	echo"<center>Navigate to <a href=\"admin_home.html\">HOME</a></center>";
	return true;
}
else
{
	echo "<script>alert('Error!!')</script>";
	return false;
}
?>

</body>
</html>