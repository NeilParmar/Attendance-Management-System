<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Attendance</title>
<script language="javascript">
function checkArray(form, arrayName)
  {
    var retval = new Array();
	var count;
    for(var i=0; i < form.elements.length; i++) {
      var el = form.elements[i];
      if(el.type == "checkbox" && el.name == arrayName && el.checked) {
        retval.push(el.value);
		count++;
      }
    }
    return retval;
	count="\nNumber of Deletions: "+count;
	retval.push(count);
  }
  
 function checkForm(form)
  {
    var itemsChecked = checkArray(myForm, "checkbox[]");
    result=confirm("Delete Faculty : " + itemsChecked );
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


$facu="SELECT DISTINCT Faculty_code,first_name,middle_name,last_name,gender,type,designation FROM faculty";
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
<a href="javascript:select(1)">Check all </a>  |  <a href="javascript:select(0)">Uncheck all</a>

<form name="myForm" method="post" action="delete.php" onsubmit="return checkForm(this)" >
<table border="0" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
<tr>
<td  bgcolor="#FFFFFF">MARK</td>
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
<td align="center" bgcolor="#FFFFFF"><input name="checkbox[]" type="checkbox" id="checkbox[]" value="<? echo $fac[$i]; ?>"/></td>

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
<td align="center" bgcolor="#C9C9C9"><input name="checkbox[]" type="checkbox" id="checkbox[]" value="<? echo $fac[$i]; ?>" /></td>
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
<input name="submit1" type="submit" id="submit1" value="Delete"/>
</form>
</center>
</body>
</html>
<?php

$checkbox=array();
$Faculty_all=array(); 
$checkbox[$i]=0;


mysql_connect("localhost","root","shabnam") or die(mysql_error());
mysql_select_db("attendance");


$i=0;
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
	
		$Faculty_code = $checkbox[$i];
		$sql = "DELETE FROM faculty WHERE Faculty_code='$Faculty_code'" ;
		$result = mysql_query($sql) or die(mysql_error());
}		
if($result==true)
{
	echo "<script>alert('Sucessful Deletion the entry has been deleted even though it appears in list(Requires Refresh)!')</script>";
	return true;
}
else
{
	echo "<script>alert('Error!!')</script>";
	return false;
}
}
?>


