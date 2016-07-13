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
	
		$sql = "DELETE FROM elective WHERE gr_no='$gr_no' AND subject_code='$subject' AND trim='$trim' AND year<='$cur_year' AND year>='$valid_year'";
		$result = mysql_query($sql) or die(mysql_error());
		
}		
}
if($result==true)
{
	echo "<script>alert('Sucessful Deletion!')</script>";
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