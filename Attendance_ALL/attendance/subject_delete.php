<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Delete_Subject</title>
<script language="javascript">
function checkArray(form, arrayName)
  {
    var retval = new Array();
	var count=0;
    for(var i=0; i < form.elements.length; i++) {
      var el = form.elements[i];
      if(el.type == "checkbox" && el.name == arrayName && el.checked) {
        retval.push(el.value);
		count++;
      }
    }
	count="\nNumber of subject deletions : "+count;
	retval.push(count);
    return retval;
  }
  
 function checkForm(form)
  {
    var itemsChecked = checkArray(myForm, "checkbox[]");
    result=confirm("Delete Subject : " + itemsChecked );
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
$facu="SELECT DISTINCT subject_code, subject_name, no_of_hours, trim, branch_name,type_lec,elective FROM subject ORDER BY subject_code";
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
	$type_lec[$i]=$rows['type_lec'];
	$elective[$i]=$rows['elective'];
	$i++;
}



$count=mysql_num_rows($finresult);
$_SESSION['subject_code']=$subject_code;
$_SESSION['count']=$count;


?>
<center>
<a href="javascript:select(1)">Check all </a>  |  <a href="javascript:select(0)">Uncheck all</a>
<form name="myForm" method="post" action="subject_delete.php" onsubmit="return checkForm(this)" >
<table border="0" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
<tr>
<td  bgcolor="#FFFFFF">MARK</td>
<td  bgcolor="#FFFFFF"><strong>Subject Code</strong></td>
<td  bgcolor="#FFFFFF"><strong>Subject Name</strong></td>
<td  bgcolor="#FFFFFF"><strong>Number Of Hours</strong></td>
<td  bgcolor="#FFFFFF"><strong>Trim</strong></td>
<td  bgcolor="#FFFFFF"><strong>Branch Name</strong></td>
<td  bgcolor="#FFFFFF"><strong>Type Lec</strong></td>
<td  bgcolor="#FFFFFF"><strong>Elective</strong></td>
</tr>

<?php
for($i=0;$i<$count;$i++){
if($i%2!=0)
{
?>

<tr>
<td align="center" bgcolor="#FFFFFF"><input name="checkbox[]" type="checkbox" id="checkbox[]" value="<? echo $subject_code[$i]; ?>"/></td>

<td bgcolor="#FFFFFF"><? echo $subject_code[$i]; ?></td>
<td bgcolor="#FFFFFF"><? echo $subject_name[$i]; ?></td>
<td bgcolor="#FFFFFF"><? echo $no_of_hours[$i]; ?></td>
<td bgcolor="#FFFFFF"><? echo $trim[$i]; ?></td>
<td bgcolor="#FFFFFF"><? echo $branch_name[$i]; ?></td>
<td bgcolor="#FFFFFF"><? echo $type_lec[$i]; ?></td>
<td bgcolor="#FFFFFF"><? echo $elective[$i]; ?></td>
</tr>

<?php
}
else
{
?>

<tr>
<td align="center" bgcolor="#C9C9C9"><input name="checkbox[]" type="checkbox" id="checkbox[]" value="<? echo $subject_code[$i]; ?>" /></td>
<td bgcolor="#C9C9C9"><? echo $subject_code[$i]; ?></td>
<td bgcolor="#C9C9C9"><? echo $subject_name[$i]; ?></td>
<td bgcolor="#C9C9C9"><? echo $no_of_hours[$i]; ?></td>
<td bgcolor="#C9C9C9"><? echo $trim[$i]; ?></td>
<td bgcolor="#C9C9C9"><? echo $branch_name[$i]; ?></td>
<td bgcolor="#C9C9C9"><? echo $type_lec[$i]; ?></td>
<td bgcolor="#C9C9C9"><? echo $elective[$i]; ?></td>

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

$subject_code=$_SESSION['subject_code'];
$no_of_hours=$_SESSION['no_of_hours'];
$subject_name=$_SESSION['subject_name'];
$trim=$_SESSION['trim'];
$branch_name=$_SESSION['branch_name'];
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

if(isset($_POST['submit1']))
{
for($i=0;$i<$pre_count;$i++)

{
	
		$subject_code = $checkbox[$i];
		$sql = "DELETE FROM subject WHERE subject_code='$subject_code'" ;
		$result = mysql_query($sql) or die(mysql_error());
}		
if($result==true)
{
	echo "<script>alert('Sucessful Delete the entry has been deleted even though it appears in list(Requires Refresh)!')</script>";
	return true;
}
else
{
	echo "<script>alert('Error in deletion!!')</script>";
	return false;
}
}

?>
