<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link rel="stylesheet" type="text/css" href="calendar.css" />
<script type="text/javascript" src="calendar.js"></script>
<script language="javascript">
function viewCheck()
{
	var sel_val=0;
	for(i=0;i<document.myform.select_type.length;i++)
	{
		if( document.myform.select_type[i].checked == true )
		{
			sel_val= document.myform.select_type[i].value;
		
			if(sel_val=='teacher')
			{
				for(j=0;j<document.myform.searchby.length;j++)
		 	   {
		    		document.myform.searchby[j].disabled=true;
					document.myform.searchby[j].checked=false;
				}
				for(k=0;k<document.myform.view_type.length;k++)
		 	   {
		    		document.myform.view_type[k].disabled=true;
				}
				document.myform.from_date.disabled=true;
				document.myform.to_date.disabled=true;
				document.myform.from_date.value="click here!";
				document.myform.to_date.value="click here!";
			
				document.myform.from_per.disabled=true;
				document.myform.to_per.disabled=true;
				document.myform.from_per.value="";
				document.myform.to_per.value="";

				document.myform.input_name.disabled=true;
				document.myform.input_name.value="";
				document.myform.input_gr.disabled=true;
				document.myform.input_gr.value="";
				document.myform.input_roll.disabled=true;
				document.myform.input_roll.value="";
				document.myform.input_key.disabled=true;
				document.myform.input_key.value="";

		}
		else if(sel_val=='students')
		{
			for(k=0;k<document.myform.view_type.length;k++)
		 	   {
		    		document.myform.view_type[k].disabled=false;
				}
		}
	}
}
}
function selectCheck()
{
	var val_rad=0;
	for(i=0;i<document.myform.opt.length;i++)
	 {
		 if( document.myform.opt[i].checked == true )
		{
			val_rad = document.myform.opt[i].value;
			
			if(val_rad=='subjectCh')
			{
				document.myform.faculty.disabled=true;
				document.myform.subj.disabled=true;
				document.myform.subject_select.disabled=false;
			}
			else if(val_rad=='teach')
			
			{
				document.myform.faculty.disabled=false;
				document.myform.subj.disabled=false;
				document.myform.subject_select.disabled=true;
			}
		}
	 }
}
				
				
 function makeChoice()
 {
	 var val=0;
	 for(i=0;i<document.myform.view_type.length;i++)
	 {
		 if( document.myform.view_type[i].checked == true )
		{
			val = document.myform.view_type[i].value;
		
	 
		if(val=='range')
		{
			for(j=0;j<document.myform.searchby.length;j++)
		    {
		    	document.myform.searchby[j].disabled=true;
				document.myform.searchby[j].checked=false;
			}
				document.myform.from_date.disabled=false;
				document.myform.from_date.focus();
				document.myform.to_date.disabled=false;
				document.myform.to_date.focus();
				
				document.myform.from_per.disabled=true;
				document.myform.to_per.disabled=true;
				document.myform.from_per.value="";
				document.myform.to_per.value="";
			
				document.myform.input_name.disabled=true;
				document.myform.input_name.value="";
				document.myform.input_gr.disabled=true;
				document.myform.input_gr.value="";
				document.myform.input_roll.disabled=true;
				document.myform.input_roll.value="";
				document.myform.input_key.disabled=true;
				document.myform.input_key.value="";
				

		} 
		else if(val=='single')
		{
			for(j=0;j<document.myform.searchby.length;j++)
			{
				document.myform.searchby[j].disabled=false;
				document.myform.searchby[j].focus();
			 }
			document.myform.from_date.disabled=true;
			document.myform.to_date.disabled=true;
			document.myform.from_date.value="click here!";
			document.myform.to_date.value="click here!";
			
			document.myform.from_per.disabled=true;
			document.myform.to_per.disabled=true;
			document.myform.from_per.value="";
			document.myform.to_per.value="";

		}
		else if(val=='percentage_range')
		{
			for(j=0;j<document.myform.searchby.length;j++)
		    {
		    	document.myform.searchby[j].disabled=true;
				document.myform.searchby[j].checked=false;
			}
			document.myform.from_per.disabled=false;
			document.myform.from_per.focus();
	   		document.myform.to_per.disabled=false;
			document.myform.to_per.focus();
			
			document.myform.from_date.disabled=true;
			document.myform.to_date.disabled=true;
			document.myform.from_date.value="click here!";
			document.myform.to_date.value="click here!";
			
				document.myform.input_name.disabled=true;
				document.myform.input_name.value="";
				document.myform.input_gr.disabled=true;
				document.myform.input_gr.value="";
				document.myform.input_roll.disabled=true;
				document.myform.input_roll.value="";
				document.myform.input_key.disabled=true;
				document.myform.input_key.value="";

		} 
		else
		{
			for(j=0;j<document.myform.searchby.length;j++)
		    {
		    	document.myform.searchby[j].disabled=true;
				document.myform.searchby[j].checked=false;
			}
			document.myform.from_date.disabled=true;
			document.myform.to_date.disabled=true;
			document.myform.from_date.value="click here!";
			document.myform.to_date.value="click here!";
			
			document.myform.from_per.disabled=true;
			document.myform.to_per.disabled=true;
			document.myform.from_per.value="";
			document.myform.to_per.value="";

				document.myform.input_name.disabled=true;
				document.myform.input_name.value="";
				document.myform.input_gr.disabled=true;
				document.myform.input_gr.value="";
				document.myform.input_roll.disabled=true;
				document.myform.input_roll.value="";
				document.myform.input_key.disabled=true;
				document.myform.input_key.value="";

		}
			
	}
  } 
}

function inChoice()
{
	 var val1=0;
	 for(i=0;i<document.myform.searchby.length;i++)
	 {
		 if( document.myform.searchby[i].checked == true )
		{
			val1 = document.myform.searchby[i].value;
			
			if(val1=='roll_no')
			{
				document.myform.input_roll.disabled=false;
			    document.myform.input_roll.focus();
				document.myform.input_gr.disabled=true;
				document.myform.input_gr.value="";
				document.myform.input_key.disabled=true;
				document.myform.input_key.value="";
				document.myform.input_name.disabled=true;
				document.myform.input_name.value="";
			}
			else if(val1=='name')
			{
				document.myform.input_name.disabled=false;
			    document.myform.input_name.focus();
				document.myform.input_gr.disabled=true;
				document.myform.input_gr.value="";
				document.myform.input_key.disabled=true;
				document.myform.input_key.value="";
				document.myform.input_roll.disabled=true;
				document.myform.input_roll.value="";
			}
			else if(val1=='gr_no')
			{
				document.myform.input_gr.disabled=false;
			    document.myform.input_gr.focus();
				document.myform.input_name.disabled=true;
				document.myform.input_name.value="";
				document.myform.input_key.disabled=true;
				document.myform.input_key.value="";
				document.myform.input_roll.disabled=true;
				document.myform.input_roll.value="";
			}
			else
			{
				document.myform.input_key.disabled=false;
			    document.myform.input_key.focus();
				document.myform.input_name.disabled=true;
				document.myform.input_name.value="";
				document.myform.input_gr.disabled=true;
				document.myform.input_gr.value="";
				document.myform.input_roll.disabled=true;
				document.myform.input_roll.value="";

			}
		}
	 }
}
function checkFaculty()
{
	if(document.myform.faculty.options[0].value==true)
	{
		return false;
	}
	else
	{
		var javaScriptVariable;
		javaScriptVariable=document.myform.faculty.options[document.myform.faculty.selectedIndex].value;
		//document.write(javaScriptVariable);
		window.location.href = "attendance_view_admin.php?value=" +javaScriptVariable; 
		document.myform.subj.disabled=false;
		document.myform.subj.focus();
		

	}
}
function checkDiv()
{
	if(document.myform.stream_sel.options[document.myform.stream_sel.selectedIndex].value=="computer_science")
	{
		document.myform.div_sel.disabled=false;
	}
	else
	{
		document.myform.div_sel.disabled=true;
	}
}
</script>
</head>
<?php

mysql_connect("localhost","root","shabnam") or die(mysql_error());
mysql_select_db("attendance");


$cur_year=date('Y');
$valid_year=$cur_year-4;

$q=mysql_query("SELECT sa.subject_code,sa.faculty_code,s.subject_name,sa.trim,sa.year,sa.division,sa.branch_name,elective,batch FROM subject_allocation sa,subject s WHERE s.subject_code=sa.subject_code AND s.trim=sa.trim AND s.branch_name=sa.branch_name AND year<='$cur_year' AND year>='$valid_year' ORDER BY division,batch,s.subject_name") or die(mysql_error());
$options="";
while($r=mysql_fetch_array($q))
{
	$s_code=$r["subject_code"];
	$s_name=$r["subject_name"];
	$s_trim=$r["trim"];
	$s_batch=$r["year"];
	$s_div=$r["division"];
	$s_stream=$r["branch_name"];
	$value=$r["faculty_code"];
	$elective=$r["elective"];
	$batch=$r["batch"];
	$yr="SELECT EXTRACT(YEAR from trim_start) FROM subject_allocation WHERE faculty_code='$value' AND subject_code='$s_code' AND trim='$s_trim' AND year='$s_batch' AND division='$s_div' AND branch_name='$s_stream' AND batch='$batch'";   
	 $res_yr=mysql_query($yr) or die(mysql_error());
	 
	 while ($row_yr=mysql_fetch_array($res_yr)) { 
	
	$s_year=$row_yr['EXTRACT(YEAR from trim_start)'];
	
	$pass_sub=$s_code."|".$s_name."|".$s_trim."|".$s_div."|".$s_stream."|".$s_batch."|".$s_year."|".$value."|".$batch."|".$elective;
	if($batch=="0")
	{
		$batch_disp="Theory";
	}
	else
	{
		$batch_disp=$batch;
	}
	$sub_disp=$s_div."-".$batch_disp." | ".$s_stream." | ".$s_name;
	$options.="<OPTION VALUE=\"$pass_sub\">".strtoupper($sub_disp);
	 }
}

$sql1="SELECT DISTINCT faculty_code,middle_name,first_name,last_name FROM `faculty` ORDER BY first_name"; 
$result1=mysql_query($sql1); 
$options1="";
while ($row1=mysql_fetch_array($result1)) { 

    $faculty_code=$row1["faculty_code"]; 
    $first_name=$row1["first_name"];
    $middle_name=$row1["middle_name"];
    $last_name=$row1["last_name"];
    $full_name=$first_name." ".$middle_name." ".$last_name;
    $options1.="<OPTION VALUE=\"$faculty_code\">".$full_name; 
}
if(isset($_GET['value']))
{
	session_start();
	$value= $_GET['value']; 
	$_SESSION['get_fac']=$value;
	$get_name="SELECT middle_name,first_name,last_name FROM `faculty` WHERE faculty_code='$value'";
	$name=mysql_query($get_name); 
	
	while ($row_is=mysql_fetch_array($name)) { 
	
    $first_name=$row_is["first_name"];
    $middle_name=$row_is["middle_name"];
    $last_name=$row_is["last_name"];
    $full_names=$first_name." ".$middle_name." ".$last_name;
	}
   echo"Faculty Selected: ".$full_names."<br/>Now Select Subject from Subject~FAC";
	
$cur_year=date('Y');
$valid_year=$cur_year-4;

	$options2="";
	$query_get="SELECT DISTINCT subject_code,division,year,trim,branch_name,batch,EXTRACT(YEAR from trim_start)  FROM subject_allocation WHERE faculty_code='$value' AND year<='$cur_year' AND year>='$valid_year'";
	$result_get=mysql_query($query_get) or die(mysql_error());
	while($r_sa=mysql_fetch_array($result_get))
	{
		$subject_code=$r_sa["subject_code"]; 
  		$div=$r_sa["division"];
		$batch=$r_sa["batch"];
		$stream=$r_sa["branch_name"];
		$trim=$r_sa["trim"];
		$year=$r_sa["year"];
		$year1=$r_sa['EXTRACT(YEAR from trim_start)'];
		$query_sub1="SELECT subject_name,elective FROM subject WHERE subject_code='$subject_code' ORDER BY subject_name";
		$result_sub1=mysql_query($query_sub1) or die(mysql_error());
		while ($row1=mysql_fetch_array($result_sub1)) 
		{ 

			$subject_name=$row1["subject_name"]; 
			$elective=$row1["elective"];
	
			$pass_name=$subject_name."|".$div."|".$year."|".$stream."|".$trim."|".$year1."|".$subject_code."|".$batch."|".$elective;
			if($batch=="0")
			{
				$batch_disp="Theory";
			}
			else
			{
				$batch_disp=$batch;
			}
   			 $full_name=$subject_name." | ".$div."-".$batch_disp." | ".$trim." | ".$year;
		         $options2.="<OPTION VALUE=\"$pass_name\">".strtoupper($full_name); 
	 		
		}
	}
}
?>

<body>
<form name="myform" action="attendance_view_admin.php" method="post">
<table>
<tr>
<td>
<input type="radio" name="opt" id="opt" checked="checked" value="subjectCh"  onchange="selectCheck()"/>
</td>
<td>
<strong>Subject&nbsp;&nbsp;</strong>
   <select name="subject_select">
  <option name="init1" value="init1">SELECT</option>
  <?=$options?>
</select></td>
</tr>
<tr>
<td>
<input type="radio" name="opt" id="opt" value="teach" onchange="selectCheck()"/>
</td>
<td>
<table><tr><td>
<strong>Faculty </strong></td><td>
<select name="faculty" id="faculty" onchange="checkFaculty()" disabled="disabled">
<option name="initial" >SELECT</option>
<?=$options1?>
</select>
</td>
</tr>
<tr>
  <td>
<strong>Subject~FAC</strong>
</td>
<td>
<select name="subj" id="subj">
<option name="label" value="initial"> subj | div batch | trim | year(batch) </option>
<?=$options2?>
</select>
</td></tr></table></td>
</tr>
<tr>
<td>
</td>
<td>
<strong>Students </strong><input type="radio" name="select_type" value="students" onchange="viewCheck()" checked /> 
<strong>| </strong>
<strong>Teacher</strong> <input type="radio" name="select_type" value="teacher" onchange="viewCheck()"/>
</td>
</tr>
</table> 
<font color="#999999">_____________________________________________________________________________________________________________________</font>
<table>
  <tr>
      <td><input name="view_type" type="radio" value="single" onclick="makeChoice();"/></td>
      <td><strong>Single</strong></td><td width="826"><table><tr><td height="46"><label>
          <input type="radio" name="searchby" value="roll_no" disabled="disabled" onclick="inChoice();"/>
          Roll No</label>
              <input name="input_roll" type="text" disabled="disabled" />
</td><td>
        <label>
          <input type="radio" name="searchby" value="gr_no" disabled="disabled" onclick="inChoice();"/>
          Gr
          No
          <input name="input_gr" type="text" disabled="disabled"/>
        </label>
</td>
        <td><label>
          <input type="radio" name="searchby" value="name" disabled="disabled" onclick="inChoice();"/>
          Name</label>
          <input name="input_name" type="text" disabled="disabled"/>
         </td><td>
        <label>
          <input type="radio" name="searchby" value="key" disabled="disabled" onclick="inChoice();"/>
          Last Name
        </label>
        <input name="input_key" type="text" disabled="disabled"/>
      </td></tr></table>
       </td>
  </tr>
  <tr>
    <td><input type="radio" name="view_type" value="all" onclick="makeChoice();" checked="checked" /></td>
      <td><strong>All</strong></td>
  </tr>
  <tr>
      <td><input type="radio" name="view_type" value="range" onclick="makeChoice();" /></td>
      <td><strong>Range</strong></td><td>
             From:
               <input name="from_date" id="from_date" type="text" value="click here!" disabled="disabled" />
              <script type="text/javascript">

  	calendar.set("from_date");

  </script>&emsp;
        To: 
        <input name="to_date" type="text" id="to_date"  value="click here!" disabled="disabled"/>
  <script type="text/javascript">

  		calendar.set("to_date");

  </script></td>
  </tr>
  <tr>
  <td>
  <input type="radio" name="view_type" value="percentage_range" onclick="makeChoice();" /></td>
  <td><strong>Percentage</strong>
  </td>
  <td>
  From:
    <input type="text" name="from_per" id="from_per" disabled="disabled" />
   &emsp;
  To:
  <input type="text" name="to_per" id="to_per" disabled="disabled" />
</td>
  </tr>
</table>


<input type="submit" name="submit" id="submit" value="Submit"/>
</form>


</body>
</html>
<?php
if(isset($_POST['submit']))
{
	session_start();
	$i=0;
	$j=0;
	$flag=0;
	$gr=array();
	$roll=array();
	$percentage=array();
	$slot=array();
	$slot_att=array();
	$signal=0;
	if($_POST['subj']!="initial")
	{
	$get_fac=$_SESSION['get_fac'];
	$subject_code=$_POST['subj'];
	$q=mysql_query("SELECT first_name,middle_name,last_name FROM faculty WHERE faculty_code='$get_fac'");
	while($r=mysql_fetch_array($q))
	{
		$fac_name=$r['first_name']." ".$r['middle_name']." ".$r['last_name'];
	}
	
	$splitdata = explode('|', $subject_code);
	$subj=$splitdata[0];
	$div=$splitdata[1];
	$batch=$splitdata[2];
	$stream=$splitdata[3];
	$trim=$splitdata[4];
	$year=$splitdata[5];
	$sub_code=$splitdata[6];
	$batch_pr=$splitdata[7];
	$elective=$splitdata[8];
		if($elective=="yes")
		{
			$stream="elective";
			$att_type="att_elective";
		}
		else
		{
			$att_type="attendance";
		}
		
	$signal=1;
	}
	else if($_POST['subject_select']!="init1")
	{
		$splitdata=explode('|',$_POST['subject_select']);
		
		$subj=$splitdata[1];
		$div=$splitdata[3];
		$batch=$splitdata[5];
		$stream=$splitdata[4];
		$trim=$splitdata[2];
		$year=$splitdata[6];
		$sub_code=$splitdata[0];
		$get_fac=$splitdata[7];
		$batch_pr=$splitdata[8];
		$elective=$splitdata[9];
		if($elective=="yes")
		{
			$stream="elective";
			$att_type="att_elective";
		}
		else
		{
			$att_type="attendance";
		}
		
	$q=mysql_query("SELECT first_name,middle_name,last_name FROM faculty WHERE faculty_code='$get_fac'");
	while($r=mysql_fetch_array($q))
	{
		$fac_name=$r['first_name']." ".$r['middle_name']." ".$r['last_name'];
	}
	$signal=1;
	}
		
	if($_POST['select_type']=="students" && $signal!=0)
	{
		echo"<center><strong>You Selected</strong> : ".$fac_name;
		echo"<br/><strong>Stream</strong> : ".strtoupper($stream)." <strong>Trim</strong> : ".$trim." <strong>Subject</strong> : ".strtoupper($subj)." <strong>Div</strong> :".strtoupper($div);
		
		$view_type=$_POST['view_type'];
		$val_ty=$view_type;
		if($val_ty=='single')
		{
			$searchby=$_POST['searchby'];
			if(isset($searchby))
			{
				$val_search=$searchby;
				if($val_search=='roll_no')
				{
					$roll_is=$_POST['input_roll'];
					if($batch_pr=="0")
					{
						if($elective=="yes")
						{	
					$student=mysql_query("SELECT gr_no,roll_no FROM elective WHERE division='$div' AND trim='$trim' AND year='$batch' AND roll_no='$roll_is' AND subject_code='$sub_code' ORDER BY roll_no") or die(mysql_error());
						}
						else
						{
							$student=mysql_query("SELECT gr_no,roll_no FROM $stream WHERE division='$div' AND trim='$trim' AND year='$batch' AND roll_no='$roll_is' ORDER BY roll_no") or die(mysql_error());
						}
					}
					else
					{
						if($elective=="yes")
						{
					$student=mysql_query("SELECT gr_no,roll_no FROM $stream WHERE division='$div' AND trim='$trim' AND year='$batch' AND batch='$batch_pr' AND roll_no='$roll_is' AND subject_code='$sub_code' ORDER BY roll_no") or die(mysql_error());
						}
						else
						{
							$student=mysql_query("SELECT gr_no,roll_no FROM $stream WHERE division='$div' AND trim='$trim' AND year='$batch' AND batch='$batch_pr' AND roll_no='$roll_is' ORDER BY roll_no") or die(mysql_error());
						}
					}
			
				}
				else if($val_search=='gr_no')
				{
					$gr_is=$_POST['input_gr'];
					if($batch_pr=="0")
					{
						if($elective=="yes")
						{
							
					$student=mysql_query("SELECT gr_no,roll_no FROM $stream WHERE division='$div' AND trim='$trim' AND year='$batch' AND gr_no='$gr_is' AND subject_code='$sub_code' ORDER BY roll_no") or die(mysql_error());				
						}
						else
						{
							$student=mysql_query("SELECT gr_no,roll_no FROM $stream WHERE division='$div' AND trim='$trim' AND year='$batch' AND gr_no='$gr_is' ORDER BY roll_no") or die(mysql_error());				
					
						}
					}
					else
					{
						if($elective=="yes")
						{
					$student=mysql_query("SELECT gr_no,roll_no FROM $stream WHERE division='$div' AND trim='$trim' AND year='$batch' AND batch='$batch_pr' AND gr_no='$gr_is' AND subject_code='$sub_code' ORDER BY roll_no") or die(mysql_error());				
						}
						else
						{
							$student=mysql_query("SELECT gr_no,roll_no FROM $stream WHERE division='$div' AND trim='$trim' AND year='$batch' AND batch='$batch_pr' AND gr_no='$gr_is' AND subject_code='$sub_code' ORDER BY roll_no") or die(mysql_error());				
						}
							
					}
					
					
				}
				if($val_search=='name')
				{
					$name_is=ucwords(strtolower($_POST['input_name']));
					if($batch_pr=="0")
					{
						if($elective=="yes")
						{
					$student=mysql_query("SELECT s.gr_no,roll_no FROM $stream as s,students WHERE division='$div' AND trim='$trim' AND batch='$batch_pr' AND first_name='$name_is' AND s.gr_no=students.gr_no AND subject_code='$sub_code' ORDER BY roll_no") or die(mysql_error());
						}
						else
						{
							$student=mysql_query("SELECT s.gr_no,roll_no FROM $stream as s,students WHERE division='$div' AND trim='$trim' AND batch='$batch_pr' AND first_name='$name_is' AND s.gr_no=students.gr_no ORDER BY roll_no") or die(mysql_error());
						}
					}
					else
					{
						if($elective=="yes")
						{
					$student=mysql_query("SELECT s.gr_no,roll_no FROM $stream as s,students WHERE division='$div' AND trim='$trim' AND year='$batch' AND batch='$batch_pr' AND first_name='$name_is' AND s.gr_no=students.gr_no ORDER BY roll_no") or die(mysql_error());
						}
						else
						{
							$student=mysql_query("SELECT s.gr_no,roll_no FROM $stream as s,students WHERE division='$div' AND trim='$trim' AND year='$batch' AND batch='$batch_pr' AND first_name='$name_is' AND s.gr_no=students.gr_no ORDER BY roll_no") or die(mysql_error());
						}
					}
				}
				if($val_search=='key')
				{
					$key_is=ucwords(strtolower($_POST['input_key']));
					if($batch_pr=="0")
					{
						if($elective=="yes")
						{
					$student=mysql_query("SELECT s.gr_no,roll_no FROM $stream as s,students WHERE division='$div' AND trim='$trim' AND year='$batch' AND last_name='$key_is' AND s.gr_no=students.gr_no AND subject_code='$sub_code' ORDER BY roll_no") or die(mysql_error());
						}
						else
						{
							$student=mysql_query("SELECT s.gr_no,roll_no FROM $stream as s,students WHERE division='$div' AND trim='$trim' AND year='$batch' AND last_name='$key_is' AND s.gr_no=students.gr_no ORDER BY roll_no") or die(mysql_error());
						}
					}
					else
					{
						if($elective=="yes")
						{
							
					$student=mysql_query("SELECT s.gr_no,roll_no FROM $stream as s,students WHERE division='$div' AND trim='$trim' AND year='$batch' AND batch='$batch_pr' AND last_name='$key_is' AND s.gr_no=students.gr_no AND subject_code='$sub_code' ORDER BY roll_no") or die(mysql_error());
						}
						else
						{
							$student=mysql_query("SELECT s.gr_no,roll_no FROM $stream as s,students WHERE division='$div' AND trim='$trim' AND year='$batch' AND batch='$batch_pr' AND last_name='$key_is' AND s.gr_no=students.gr_no ORDER BY roll_no") or die(mysql_error());
						}
							
					}
					
				}
			}
		}
			else
			{	
				if($batch_pr=="0")
				{
					if($elective=="yes")
					{
				$student=mysql_query("SELECT gr_no,roll_no FROM $stream WHERE division='$div' AND trim='$trim' AND year='$batch' AND subject_code='$sub_code' ORDER BY roll_no") or die(mysql_error());
					}
					else
					{
						$student=mysql_query("SELECT gr_no,roll_no FROM $stream WHERE division='$div' AND trim='$trim' AND year='$batch' ORDER BY roll_no") or die(mysql_error());
					}
				}
				else
				{
					if($elective=="yes")
					{
				$student=mysql_query("SELECT gr_no,roll_no FROM $stream WHERE division='$div' AND trim='$trim' AND year='$batch' AND batch='$batch_pr' AND subject_code='$sub_code' ORDER BY roll_no") or die(mysql_error());
					}
					else
					{
						$student=mysql_query("SELECT gr_no,roll_no FROM $stream WHERE division='$div' AND trim='$trim' AND year='$batch' AND batch='$batch_pr' ORDER BY roll_no") or die(mysql_error());
					}
				}
			}	
		while($row_stu=mysql_fetch_array($student))
		{
			$gr[$i]=$row_stu['gr_no'];
			$roll[$i]=$row_stu['roll_no'];
			$gr_is=$gr[$i];
			
		if($val_ty=='range')
		{
			$from=$_POST['from_date'];
			$to=$_POST['to_date'];
			
			$att=mysql_query("SELECT SUM(slot),SUM(att_hours) FROM $att_type WHERE gr_no='$gr_is' AND faculty_code='$get_fac' AND subject_code='$sub_code' AND type_lec='$batch_pr' AND date>='$from' AND date<='$to' GROUP BY gr_no") or die(mysql_error());
		
		}
		else
		{
			
		$att=mysql_query("SELECT SUM(slot),SUM(att_hours) FROM $att_type WHERE gr_no='$gr_is' AND faculty_code='$get_fac' AND subject_code='$sub_code' AND type_lec='$batch_pr' GROUP BY gr_no") or die(mysql_error());
			
		}
			while($row_att=mysql_fetch_array($att))
			{
				$slot_att[$i]=$row_att['SUM(att_hours)'];
				$slot[$i]=$row_att['SUM(slot)'];
				$percentage[$i]=($slot_att[$i]/$slot[$i])*100;
				if($val_ty=='percentage_range')
				{
					$to_per=$_POST['to_per'];
					$from_per=$_POST['from_per'];
					if($to_per >= $percentage[$i] &&  $from_per<= $percentage[$i])
					{
						$per_range[$j]=$i;
						$j++;
					}
					else
					{
						$per_range[$j]=5000000;
						$j++;
					}
				}
				$flag=1;
			}
			$name_stu=mysql_query("SELECT first_name,middle_name,last_name FROM students WHERE gr_no='$gr_is'") or die(mysql_error());
			while($row_name=mysql_fetch_array($name_stu))
			{
				$first[$i]=$row_name['first_name'];
				$last[$i]=$row_name['last_name'];
				$middle[$i]=$row_name['middle_name'];
			}
			$i++;
		}
		$count=mysql_num_rows($student);
		if($count!="0" && $flag!="0")
		{
			echo"<br/><u>Number of Records generated</u> : ".$count;
			echo "<br/><table><tr bgcolor=\"#99FF99\"><td>Roll no</td><td>Gr No</td><td></td><td>Name</td><td></td><td>Attended hrs</td><td>Total Hours</td><td>Percentage</td></tr>";
	
			for($i=0;$i<$count;$i++)
			{
				if($val_ty=='percentage_range')
				{ 
					if($i==$per_range[$i])
					{
						echo "<tr align=\"center\" bgcolor=\"#FF3366\"><td>".$roll_no[$i]."</td><td>".$gr[$i]."</td><td>".$first[$i]."</td><td>".$middle[$i]."</td><td>".$last[$i]."</td><td>".$slot_att[$i]."</td><td>".$slot[$i]."</td><td>".round($percentage[$i],2);
					}
					else if($i%2!=0)
					{
						echo "<tr  align=\"center\" bgcolor=\"#FFFFFF\"><td>".$roll_no[$i]."</td><td>".$gr[$i]."</td><td>".$first[$i]."</td><td>".$middle[$i]."</td><td>".$last[$i]."</td><td>".$slot_att[$i]."</td><td>".$slot[$i]."</td><td>".round($percentage[$i],2);
					}
					else
					{
						echo "<tr align=\"center\" bgcolor=\"#C9C9C9\"><td>".$roll_no[$i]."</td><td>".$gr[$i]."</td><td>".$first[$i]."</td><td>".$middle[$i]."</td><td>".$last[$i]."</td><td>".$slot_att[$i]."</td><td>".$slot[$i]."</td><td>".round($percentage[$i],2);
					}
				}
		
				else if($i%2!=0)
				{
					
					echo "<tr bgcolor=\"#FFFFFF\" align=\"center\"><td>".$roll[$i]."</td><td>".$gr[$i]."</td><td>".$first[$i]."</td><td>".$middle[$i]."</td><td>".$last[$i]."</td><td>".$slot_att[$i]."</td><td>".$slot[$i]."</td><td>".round($percentage[$i],2)."</td></tr>";			
				}
				else
				{
					echo "<tr bgcolor=\"#C9C9C9\" align=\"center\"><td>".$roll[$i]."</td><td>".$gr[$i]."</td><td>".$first[$i]."</td><td>".$middle[$i]."</td><td>".$last[$i]."</td><td>".$slot_att[$i]."</td><td>".$slot[$i]."</td><td>".round($percentage[$i],2)."</td></tr>";			
				}
			}
			echo"</table></center>";
		}
		else
		{
			echo"<br/> No Attendance record exists for your selection";
		}
	}
	else if($_POST['select_type']=="teacher")
	{
		echo"<center><u>You Selected</u> : ".$fac_name;
		echo"<br/><u>Stream</u> : ".$stream." <u>Trim</u> : ".$trim." <u>Subject</u> : ".$subj." <u>Div</u> :".$div."</center>";          
		$k=0;
		$date_get=mysql_query("SELECT trim_start,trim_end FROM subject_allocation WHERE faculty_code='$get_fac' AND subject_code='$sub_code' AND trim='$trim' AND year='$batch' AND division='$div' AND branch_name='$stream'") or die(mysql_error());   
		while($row_date=mysql_fetch_array($date_get))		
		{
			$strt=$row_date['trim_start'];
			$end=$row_date['trim_end'];
		}
		
			$teacher=mysql_query("SELECT date,slot,SUM(att_hours),start_time FROM $att_type WHERE faculty_code='$get_fac' AND subject_code='$sub_code' AND type_lec='$batch_pr' AND date>='$strt' AND date<='$end' GROUP BY date,faculty_code") or die(mysql_error());
			
			while($teach_row=mysql_fetch_array($teacher))
			{
				$date[$k]=$teach_row['date'];
				$time[$k]=$teach_row['start_time'];
				$slot[$k]=$teach_row['slot'];
				$total[$k]=$teach_row['SUM(att_hours)']/$slot[$k];
				$k++;
			}	
			$count=mysql_num_rows($teacher);
			if($count!=0)
			{
				echo"<br/><table align=\"center\"><tr bgcolor=\"#99FF99\"><td align=\"center\">Date</td><td align=\"center\">slot</td><td align=\"center\">Total</td><td align=\"center\">Time</td></tr>";
				for($i=0;$i<$count;$i++)
				{
					if($i%2!=0)
					{
						echo"<tr bgcolor=\"#FFFFFF\"><td align=\"center\">".$date[$i]."</td><td align=\"center\">".$slot[$i]."</td><td align=\"center\">".$total[$i]."</td><td align=\"center\">".$time[$i]."</td></tr>";
					}
					else
					{
						echo"<tr bgcolor=\"#C9C9C9\"><td align=\"center\">".$date[$i]."</td><td align=\"center\">".$slot[$i]."</td><td align=\"center\">".$total[$i]."</td><td align=\"center\">".$time[$i]."</td></tr>";
					}
						
				}
				echo"</table>";		
			}
			else
			{
				echo"No lectures taken";
			}
	}
	else
	{
		echo"<br/>Please Select from drop down Menu";
	} 
}
?>