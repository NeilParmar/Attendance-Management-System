<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
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
$btch=$_SESSION['batch'];
$trim_pas=$trim_pas+1;
$elective=$_SESSION['elective'];
$subject_code=$_SESSION['subject_code'];

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
		if($elective=="yes")
		{
		$quer=mysql_query("SELECT DISTINCT roll_no,division,year,batch FROM $stream_pas WHERE gr_no='$gr_no' AND trim='$trim' AND subject_code='$subject_code'") or die(mysql_error());
		}
		else
		{
			if($division=="computer_science")
			{
				$quer=mysql_query("SELECT DISTINCT roll_no,division,year,batch FROM $stream_pas WHERE gr_no='$gr_no' AND division='$division' AND trim='$trim'") or die(mysql_error());
			}
			else
			{
				
				$quer=mysql_query("SELECT DISTINCT roll_no,division,year,batch FROM $stream_pas WHERE gr_no='$gr_no' AND trim='$trim'") or die(mysql_error());
			}
		}
		while($r_q=mysql_fetch_array($quer))
		{
			$roll_no_pas=$r_q['roll_no'];
			$div_pas=$r_q['division'];
			$year_pas=$r_q['year'];
			$batch=$r_q['batch'];

		}
        	if($elective=="yes")
		{
			$sql= "UPDATE $stream_pas SET batch='$btch' WHERE gr_no='$gr_no' AND roll_no='$roll_no_pas' AND division='$div_pas' AND trim='$trim' AND subject_code='$subject_code'";
		}
		else
		{
			$sql= "UPDATE $stream_pas SET batch='$btch' WHERE gr_no='$gr_no' AND roll_no='$roll_no_pas' AND division='$div_pas' AND trim='$trim'";
		}
		$result=mysql_query($sql) or die(mysql_error());
}		

//echo"<br/>Would you like to navigate to <a href=\"admin_homehtml.php\">Home</a> ";
}
if($result==true)
{
	echo "<script>alert('Sucessful Allocation!')</script>";
	echo"<center>Navigate to <a href=\"admin_homehtml.php\">HOME</a></center>";
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