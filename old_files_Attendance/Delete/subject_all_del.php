<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Delete_SubjectAllocated</title>
<script language="javascript">
function checkArray(form, arrayName)
  {
    var retval = new Array();
    for(var i=0; i < form.elements.length; i++) {
      var el = form.elements[i];
      if(el.type == "checkbox" && el.name == arrayName && el.checked) {
        retval.push(el.value);
      }
    }
    return retval;
  }
  
 function checkForm(form)
  {
    var itemsChecked = checkArray(myForm, "checkbox[]");
    result=confirm("Delete Subject Allocated : " + itemsChecked );
	if(result)
	{
		return true;
	}
	return false;
  }
  </script>
<script>
function select(a) 
{
    var theForm = document.myForm;
    for (i=0; i<theForm.elements.length; i++)
 {
        if (theForm.elements[i].name=='checkbox[]')
            theForm.elements[i].checked = a;
 }
}

</script>
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

<a href="javascript:select(1)">Check all </a>  |  <a href="javascript:select(0)">Uncheck all</a>

<form name="myForm" method="post" action="subject_all_del.php" onsubmit="return checkForm(this)" >
<table border="0" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
<tr>
<td  bgcolor="#FFFFFF">MARK</td>
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
<td align="center" bgcolor="#FFFFFF"><input name="checkbox[]" type="checkbox" id="checkbox[]" value="<? echo $subject_code[$i]; ?>"/></td>

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
<td align="center" bgcolor="#C9C9C9"><input name="checkbox[]" type="checkbox" id="checkbox[]" value="<? echo $subject_code[$i]; ?>" /></td>
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
<input name="submit1" type="submit" id="submit1"/>
</form>
</body>
</html>

<?php
$submit=$_POST['submit1'];

session_start();

$subject_code=$_SESSION['subject_code'];
$faculty_code=$_SESSION['faculty_code'];
$year=$_SESSION['year'];
$trim=$_SESSION['trim'];
$trim_start=$_SESSION['trim_start'];
$trim_end=$_SESSION['trim_end'];
$branch_name=$_SESSION['branch_name'];
$division=$_SESSION['division'];
$count=$_SESSION['count'];
$checkbox=array();
$Faculty_all=array(); 
$i=0;
$checkbox[$i]=0;



$i=0;
foreach($_POST['checkbox'] as $value)
{	
	$checkbox[$i]=$value;
	$i++;
}
$pre_count=$i--;
$i=0;

if(isset($submit))
{
for($i=0;$i<$pre_count;$i++)

{
	
		$subject_code = $checkbox[$i];
		$sql = "DELETE FROM subject_allocation WHERE subject_code='$subject_code'" ;
		$result = mysql_query($sql) or die(mysql_error());
}		

echo"<br/>Data successfully deleted from database";
echo"<br/>Would you like to navigate to <a href=\"admin_home.html\">Home</a> ";
}
?>
