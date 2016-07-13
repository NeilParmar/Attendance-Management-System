<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Student Delete</title>
<script language="javascript">
function checkArray(form, arrayName)
  {
    var retval = new Array();
	var count=0;
    for(var i=0; i < form.elements.length; i++) {
    var el = form.elements[i];
    if(el.type == "checkbox" && el.name == arrayName && el.checked) {
	var val=el.value.split("|");
	count++;
    retval.push(val[1]);
      }
    }
	count="\nNumber of students Deletions : "+count;
	retval.push(count);
    return retval;
  }
  
 function checkForm(form)
  {
    var itemsChecked = checkArray(myForm, "checkbox[]");
    result=confirm("DELETE students : " + itemsChecked );
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
	
	$stream=$_POST['stream'];
	session_start();
	$_SESSION['sess']=$stream;
	$div=$_POST['div'];
	$trim=$_POST['trim'];
	$_SESSION['trim']=$trim;
	$_SESSION['div']=$division;
	$cur_year=date('Y');
	$valid_year=$cur_year-4;
	
		if($stream=="computer_science")
	{
		$query=mysql_query("SELECT gr_no, roll_no,batch year FROM $stream WHERE division='$div' AND trim='$trim' AND year<='$cur_year' AND year>='$valid_year' ORDER BY roll_no") or die(mysql_error());
	}
	else
	{
		$query=mysql_query("SELECT gr_no, roll_no, year,batch FROM $stream WHERE trim='$trim' AND year<='$cur_year' AND year>='$valid_year' ORDER BY roll_no") or die(mysql_error());
	}
	
	
	$i=0;
	while($r=mysql_fetch_array($query))
	{
		$gr_no_ar[$i]=$r['gr_no'];
		$gr=$gr_no_ar[$i];
		
		$roll_no_ar[$i]=$r['roll_no'];
		$val[$i]=$gr_no_ar[$i]."|";
		$val[$i].=$roll_no_ar[$i];
		$batch[$i]=$r['batch'];
		$year_ar[$i]=$r['year'];
		
		$q2=mysql_query("SELECT first_name,middle_name, last_name FROM students WHERE gr_no='$gr'")or die(mysql_error());
		
		while($ro=mysql_fetch_array($q2))
		{
			
			$first_name[$i]=$ro['first_name'];
			$middle_name[$i]=$ro['middle_name'];
			$last_name[$i]=$ro['last_name'];
			
		}
		$i++;
	}
	
$count=mysql_num_rows($query);

?>
    

<center>
<?
if($count!=0)
{
?>

<a href="javascript:select(1)">Check all </a>  |  <a href="javascript:select(0)">Uncheck all</a>
<form name="myForm" method="post" action="student_delpg3.php" onsubmit="return checkForm(this)" >
<table border="0" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
<tr>
<td  bgcolor="#FFFFFF"><strong>Mark</strong></td>
<td  bgcolor="#FFFFFF"><strong>Roll Number</strong></td>
<td  bgcolor="#FFFFFF"><strong>Gr. Number</strong></td>
<td  bgcolor="#FFFFFF">&nbsp;</td>
<td  bgcolor="#FFFFFF"><strong>Name</strong></td>
<td  bgcolor="#FFFFFF">&nbsp;</td>
<td  bgcolor="#FFFFFF"><strong>Batch</strong></td>
</tr>

<?php
for($i=0;$i<$count;$i++){
if($i%2!=0)
{
?>

<tr>
<td align="center" bgcolor="#FFFFFF"><input name="checkbox[]" type="checkbox" id="checkbox[]" value="<? echo $val[$i]; ?>" /></td>
<td bgcolor="#FFFFFF"><? echo $roll_no_ar[$i]; ?></td>
<td bgcolor="#FFFFFF"><? echo $gr_no_ar[$i]; ?></td>
<td bgcolor="#FFFFFF"><? echo $first_name[$i]; ?></td>
<td bgcolor="#FFFFFF"><? echo $middle_name[$i]; ?></td>
<td bgcolor="#FFFFFF"><? echo $last_name[$i]; ?></td>
<td bgcolor="#FFFFFF"><? echo $batch[$i]; ?></td>
</tr>

<?php
}
else
{
?>

<tr>
<td align="center" bgcolor="#C9C9C9"><input name="checkbox[]" type="checkbox" id="checkbox[]" value="<? echo $val[$i]; ?>" /></td>
<td bgcolor="#C9C9C9"><? echo $roll_no_ar[$i]; ?></td>
<td bgcolor="#C9C9C9"><? echo $gr_no_ar[$i]; ?></td>
<td bgcolor="#C9C9C9"><? echo $first_name[$i]; ?></td>
<td bgcolor="#C9C9C9"><? echo $middle_name[$i]; ?></td>
<td bgcolor="#C9C9C9"><? echo $last_name[$i]; ?></td>
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
<?
}
	else
	{
		
		echo"<br/> No records exist for your selection ";
	}
?>

</body>
</html>