<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Delete_SubjectAllocated</title>
<script language="javascript">
function checkArray(form, arrayName)
  {
    var retval = new Array();
	var count=0;
    for(var i=0; i < form.elements.length; i++) {
      var el = form.elements[i];
      if(el.type == "checkbox" && el.name == arrayName && el.checked) {
		 var val=el.value.split("|");
        retval.push(val[0]);
		count++;
      }
    }
	count="\nNumber of Deletions : "+count;
	retval.push(count);
    
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

mysql_connect("localhost","root","shabnam") or die(mysql_error());
mysql_select_db("attendance");
$cur_year=date('Y');
$valid_year=$cur_year-4;
$facu="SELECT subject_code, faculty_code, year, trim, trim_start, trim_end, branch_name, division,batch FROM subject_allocation WHERE year<='$cur_year' AND year>='$valid_year' ORDER BY subject_code,batch";
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
	$fac=$faculty_code[$i];
	$fac_num[$i]=$fac;
	$fac_name=mysql_query("SELECT first_name,middle_name,last_name FROM faculty WHERE Faculty_code='$fac'") or die(mysql_error());
	while($f=mysql_fetch_array($fac_name))
	{
		$faculty_code[$i]=$f['first_name']." ".$f['middle_name']." ".$f['last_name'];
	}		
	$year[$i]=$rows['year'];
	$trim[$i]=$rows['trim'];	
	$trim_start[$i]=$rows['trim_start'];
	$trim_end[$i]=$rows['trim_end'];
	$branch_name[$i]=$rows['branch_name'];
	$division[$i]=$rows['division'];
	$batch[$i]=$rows['batch'];
	if($batch[$i]=="0")
	{
		$batch[$i]="Theory";
	}
	
	$i++;
}



$count=mysql_num_rows($finresult);
$_SESSION['subject_code']=$subject_code;
$_SESSION['count']=$count;
?>
<center>
<a href="javascript:select(1)">Check all </a>  |  <a href="javascript:select(0)">Uncheck all</a>

<form name="myForm" method="post" action="subject_all_del.php" onsubmit="return checkForm(this)" >
<table border="0" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
<tr>
<td  bgcolor="#FFFFFF">MARK</td>
<td  bgcolor="#FFFFFF"><strong>Subject Code</strong></td>
<td  bgcolor="#FFFFFF"><strong>Faculty Name</strong></td>
<td  bgcolor="#FFFFFF"><strong>Year</strong></td>
<td  bgcolor="#FFFFFF"><strong>Trim</strong></td>
<td  bgcolor="#FFFFFF"><strong>Trim Start</strong></td>
<td  bgcolor="#FFFFFF"><strong>Trim End</strong></td>
<td  bgcolor="#FFFFFF"><strong>Branch Name</strong></td>
<td  bgcolor="#FFFFFF"><strong>Division</strong></td>
<td  bgcolor="#FFFFFF"><strong>Batch</strong></td>
</tr>

<?php
for($i=0;$i<$count;$i++){
if($i%2!=0)
{
?>

<tr>
<td align="center" bgcolor="#FFFFFF"><input name="checkbox[]" type="checkbox" id="checkbox[]" value="<? echo $subject_code[$i]."|".$year[$i]."|".$trim[$i]."|".$batch[$i]."|".$fac_num[$i]."|".$division[$i]."|".$branch_name[$i]; ?>"/></td>

<td bgcolor="#FFFFFF"><? echo $subject_code[$i]; ?></td>
<td bgcolor="#FFFFFF"><? echo $faculty_code[$i]; ?></td>
<td bgcolor="#FFFFFF"><? echo $year[$i]; ?></td>
<td bgcolor="#FFFFFF"><? echo $trim[$i]; ?></td>
<td bgcolor="#FFFFFF"><? echo $trim_start[$i]; ?></td>
<td bgcolor="#FFFFFF"><? echo $trim_end[$i]; ?></td>
<td bgcolor="#FFFFFF"><? echo $branch_name[$i]; ?></td>
<td bgcolor="#FFFFFF"><? echo $division[$i]; ?></td>
<td bgcolor="#FFFFFF"><? echo $batch[$i]; ?></td>
</tr>

<?php
}
else
{
?>

<tr>
<td align="center" bgcolor="#C9C9C9"><input name="checkbox[]" type="checkbox" id="checkbox[]" value="<? echo $subject_code[$i]."|".$year[$i]."|".$trim[$i]."|".$batch[$i]."|".$fac_num[$i]."|".$division[$i]."|".$branch_name[$i]; ?>" /></td>
<td bgcolor="#C9C9C9"><? echo $subject_code[$i]; ?></td>
<td bgcolor="#C9C9C9"><? echo $faculty_code[$i]; ?></td>
<td bgcolor="#C9C9C9"><? echo $year[$i]; ?></td>
<td bgcolor="#C9C9C9"><? echo $trim[$i]; ?></td>
<td bgcolor="#C9C9C9"><? echo $trim_start[$i]; ?></td>
<td bgcolor="#C9C9C9"><? echo $trim_end[$i]; ?></td>
<td bgcolor="#C9C9C9"><? echo $branch_name[$i]; ?></td>
<td bgcolor="#C9C9C9"><? echo $division[$i]; ?></td>
<td bgcolor="#C9C9C9"><? echo $batch[$i]; ?></td>
</tr>
<?php
}
}
?>

</table>
<input name="submit1" type="submit" id="submit1" value="Delete"/>
</form>
</center>
</body>
</html>

<?php

session_start();

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

if(isset($_POST['submit1']))
{
for($i=0;$i<$pre_count;$i++)

{
	
		$code = $checkbox[$i];
		$splitdata=explode("|",$code);
		$subject_code=$splitdata[0];
		$faculty=$splitdata[4];
		$year=$splitdata[1];
		$trim=$splitdata[2];
		$division=$splitdata[5];
		$batch=$splitdata[3];
		$branch_name=$splitdata[6];
		$sql = "DELETE FROM subject_allocation WHERE subject_code='$subject_code' AND faculty_code='$faculty' AND year='$year' AND trim='$trim' AND branch_name='$branch_name' AND division='$division' AND batch='$batch'" ;
		$result = mysql_query($sql);
}		
if($result==true)
{
	echo "<script>alert('Sucessful Delete the entry has been deleted even though it appears in list(Requires Refresh!')</script>";
}
else
{
	echo "<script>alert('Error!!')</script>";
	return false;
}


}


?>
