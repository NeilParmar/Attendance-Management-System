<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Elective Subject</title>
</head>

<body>

<?php


session_start();

$stream_pas=$_SESSION['sess'];

$roll_no_ar=$_SESSION['roll_no_ar'];
$first_name=$_SESSION['first_name'];
$middle_name=$_SESSION['middle_name'];
$last_name=$_SESSION['last_name'];
$division=$_SESSION['div'];
$trim=$_SESSION['trim'];
$count=$_SESSION['count'];
$subject=$_SESSION['subject'];

echo $stream;

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

if(isset($_POST['submit1']))
{
for($i=0;$i<$pre_count;$i++)

{
	
		$gr_no=$checkbox[$i];
		$splitdata=explode("|",$gr_no);
		$gr_no=$splitdata[0];
		$roll_no=$splitdata[1];
		$cur_year=date('Y');
	$valid_year=$cur_year-4;
	
		if($stream=="computer_science")
	{
	
		$quer=mysql_query("SELECT DISTINCT roll_no,division,year,batch,division FROM $stream_pas WHERE gr_no='$gr_no' AND division='$division' AND trim='$trim' AND year<='$cur_year' AND year>='$valid_year'") or die(mysql_error());
	}
	else
	{
		$quer=mysql_query("SELECT DISTINCT roll_no,division,year,batch,division FROM $stream_pas WHERE gr_no='$gr_no' AND trim='$trim' AND year<='$cur_year' AND year>='$valid_year'") or die(mysql_error());
	}
		while($r_q=mysql_fetch_array($quer))
		{
			$rol_pass=$r_q['roll_no'];
			$year_pas=$r_q['year'];
			$batch=$r_q['batch'];
			$div_pas=$r_q['division'];
			//echo" trim: ".$trim_pas;
			//echo" year: ".$year_pas;
			//echo" div: ".$div_pas;
			//echo" rol: ".$roll_no_pas;
		}

		$sql = "INSERT INTO elective(gr_no,roll_no,division,trim,year,batch,subject_code) VALUES('$gr_no','$roll_no','$div_pas','$trim','$year_pas','$batch','$subject')" ;
		$result = mysql_query($sql) or die(mysql_error());
		
}		
}
if($result==true)
{
	echo "<script>alert('Sucessful Allotment!')</script>";
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