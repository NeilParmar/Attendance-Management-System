<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Excel Attendance</title>
<script src="SpryAssets/SpryValidationSelect.js" type="text/javascript"></script>
<link href="SpryAssets/SpryValidationSelect.css" rel="stylesheet" type="text/css" />
<script language="javascript">

function checkFile()
{
        str=document.getElementById('excel').value.toUpperCase();
        suffix=".XLS";
        suffix2=".XLSX";
        if(!(str.indexOf(suffix, str.length - suffix.length) !== -1||
                       str.indexOf(suffix2, str.length - suffix2.length) !== -1)){
        alert('File type not allowed,\nAllowed file: *.xls,*.xlsx');
            document.getElementById('excel').value='';
        }
    }
</script>


</head>

<?php

mysql_connect("localhost","root","shabnam") or die(mysql_error());
mysql_select_db("attendance");

session_start();
$faculty=$_SESSION['faculty'];
$cur_year=date('Y');
$valid_year=$cur_year-4;
$sql="SELECT DISTINCT subject_code FROM `subject_allocation` WHERE faculty_code='$faculty' AND year<='$cur_year' AND year>='$valid_year'";
$result=mysql_query($sql); 
$sqld="SELECT DISTINCT division,batch FROM `subject_allocation` WHERE faculty_code='$faculty' AND year<='$cur_year' AND year>='$valid_year'";
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
        $options.="<OPTION VALUE=\"$subject_code\">".strtoupper(($subject_name)); 
    }
   
}
while ($rowd=mysql_fetch_array($resultd)) { 
	
	$div=$rowd["division"];
	$batch=$rowd['batch'];
	if($batch=="0")
	{
		$val=$div."|".$batch;
		$disp=strtoupper($div)."-Theory";
	}
	else
	{
		$val=$div."|".$batch;
		$disp=strtoupper($div).$batch;
	}
	$opt_div.="<OPTION VALUE=\"$val\">".$disp;

}
?>

<body>

<center>
<form method="post" action="excel_attend.php" enctype="multipart/form-data">
<table border="0">
  <tr>
    <td>Select a subject</td>
    <td><span id="spryselect1">
      <select name="subject_name">
        <option name="initial1">SELECT</option>
        <?=$options?>
      </select>
<span class="selectRequiredMsg">Please select an item.</span></span></td>
  </tr>
  <tr>
  <td>
  Division</td>
  <td><label for="div"></label>
    <span id="spryselect3"><select name="div" id="div">
      <option value="">SELECT</option>
      <?=$opt_div?>
    </select>
    <span class="selectRequiredMsg">Please select an item.</span></span>
</td>
</tr>
</table>
    <p>
  <input type="file" name="excel" id="excel" onchange="checkFile()" />
  </p>
      <input name="submit" type="submit" value="Submit" />
      <input name="reset" type="reset" />
      <br /><br /><a href="Format/AttendanceFormat.xlsx">Download the Format File</a>
    </p>
</form>
</center>
<script type="text/javascript">
var spryselect1 = new Spry.Widget.ValidationSelect("spryselect1", {validateOn:["blur"]});
var spryselect3 = new Spry.Widget.ValidationSelect("spryselect3", {validateOn:["blur"]});
</script>
</body>
</html>
<?php
if(isset($_POST['submit']))
{
	//$excel=$_POST['excel'];
	session_start();
	$div=$_POST['div'];
	$splitdiv=explode("|",$div);
	$div=$splitdiv[0];
	$batch=$splitdiv[1];
	$_SESSION['batch_e']=$batch;
	$_SESSION['divi']=$div;

	$_SESSION['sub_code']=$_POST['subject_name'];	
	if(isset($_FILES['excel']))
	{
		$count=0;
	    if ($_FILES['excel']['error'] > 0)
    	{
	 	 	echo "Return Code: " . $_FILES['excel']['error'] . "<br />";
		}	
  		else
	    {
// echo "Upload: " . $_FILES['excel']['name'] . "<br />";
 // echo "Type: " . $_FILES['excel']['type'] . "<br />";
 // echo "Size: " . ($_FILES['excel']['size'] / 1024) . " Kb<br />";
 // echo "Temp file: " . $_FILES['excel']['tmp_name'] . "<br />";
			 $count++;
		if (file_exists("dir/" . $_FILES['excel']['name']))
        {
		  //echo $_FILES['excel']['name']." this file already exists";
		  $file=$_FILES['excel']['name'];
		  echo "<script>alert('$file ' + ' already exists')</script>";
     	 }
    else
      {
    move_uploaded_file($_FILES['excel']['tmp_name'], "dir/" . $_FILES['excel']['name']);
    //  echo "Stored in: " . "dir/" . $_FILES['excel']['name'];
	  session_start();
	  $_SESSION['excel']=$_FILES['excel']['name'];
	  //echo"sess : ".$_SESSION['excel'];
	 echo"<script>document.location.href = \"disp-attend-excel.php\";</script>";

	  }
	}
}
	else
	{
		echo "<br/>there is nothing in _files";
	}	
}
?>


