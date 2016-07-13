<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<script src="SpryAssets/SpryValidationSelect.js" type="text/javascript"></script>
<script type="text/javascript" src="calendar.js"></script>
<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<link href="SpryAssets/SpryValidationSelect.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="calendar.css" />
<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />

<script language="javascript">
 function makeChoice()
 {
	 var val=0;
	 for(i=0;i<document.form1.view_type.length;i++)
	 {
		 if( document.form1.view_type[i].checked == true )
		{
			val = document.form1.view_type[i].value;
		
	 
		if(val=='range')
		{
			for(j=0;j<document.form1.searchby.length;j++)
		    {
		    	document.form1.searchby[j].disabled=true;
				document.form1.searchby[j].checked=false;
			}
				document.form1.from_date.disabled=false;
				document.form1.from_date.focus();
				document.form1.to_date.disabled=false;
				document.form1.to_date.focus();
				
				document.form1.from_per.disabled=true;
				document.form1.to_per.disabled=true;
				document.form1.from_per.value="";
				document.form1.to_per.value="";
			
				document.form1.input_name.disabled=true;
				document.form1.input_name.value="";
				document.form1.input_gr.disabled=true;
				document.form1.input_gr.value="";
				document.form1.input_roll.disabled=true;
				document.form1.input_roll.value="";
				document.form1.input_key.disabled=true;
				document.form1.input_key.value="";
				

		} 
		else if(val=='single')
		{
			for(j=0;j<document.form1.searchby.length;j++)
			{
				document.form1.searchby[j].disabled=false;
				document.form1.searchby[j].focus();
			 }
			document.form1.from_date.disabled=true;
			document.form1.to_date.disabled=true;
			document.form1.from_date.value="click here!";
			document.form1.to_date.value="click here!";
			
			document.form1.from_per.disabled=true;
			document.form1.to_per.disabled=true;
			document.form1.from_per.value="";
			document.form1.to_per.value="";

		}
		else if(val=='percentage_range')
		{
			for(j=0;j<document.form1.searchby.length;j++)
		    {
		    	document.form1.searchby[j].disabled=true;
				document.form1.searchby[j].checked=false;
			}
			document.form1.from_per.disabled=false;
			document.form1.from_per.focus();
	   		document.form1.to_per.disabled=false;
			document.form1.to_per.focus();
			
			document.form1.from_date.disabled=true;
			document.form1.to_date.disabled=true;
			document.form1.from_date.value="click here!";
			document.form1.to_date.value="click here!";
			
				document.form1.input_name.disabled=true;
				document.form1.input_name.value="";
				document.form1.input_gr.disabled=true;
				document.form1.input_gr.value="";
				document.form1.input_roll.disabled=true;
				document.form1.input_roll.value="";
				document.form1.input_key.disabled=true;
				document.form1.input_key.value="";

		} 
		else
		{
			for(j=0;j<document.form1.searchby.length;j++)
		    {
		    	document.form1.searchby[j].disabled=true;
				document.form1.searchby[j].checked=false;
			}
			document.form1.from_date.disabled=true;
			document.form1.to_date.disabled=true;
			document.form1.from_date.value="click here!";
			document.form1.to_date.value="click here!";
			
			document.form1.from_per.disabled=true;
			document.form1.to_per.disabled=true;
			document.form1.from_per.value="";
			document.form1.to_per.value="";

				document.form1.input_name.disabled=true;
				document.form1.input_name.value="";
				document.form1.input_gr.disabled=true;
				document.form1.input_gr.value="";
				document.form1.input_roll.disabled=true;
				document.form1.input_roll.value="";
				document.form1.input_key.disabled=true;
				document.form1.input_key.value="";

		}
			
	}
  } 
}

function inChoice()
{
	 var val1=0;
	 for(i=0;i<document.form1.searchby.length;i++)
	 {
		 if( document.form1.searchby[i].checked == true )
		{
			val1 = document.form1.searchby[i].value;
			
			if(val1=='roll_no')
			{
				document.form1.input_roll.disabled=false;
			    document.form1.input_roll.focus();
				document.form1.input_gr.disabled=true;
				document.form1.input_gr.value="";
				document.form1.input_key.disabled=true;
				document.form1.input_key.value="";
				document.form1.input_name.disabled=true;
				document.form1.input_name.value="";
			}
			else if(val1=='name')
			{
				document.form1.input_name.disabled=false;
			    document.form1.input_name.focus();
				document.form1.input_gr.disabled=true;
				document.form1.input_gr.value="";
				document.form1.input_key.disabled=true;
				document.form1.input_key.value="";
				document.form1.input_roll.disabled=true;
				document.form1.input_roll.value="";
			}
			else if(val1=='gr_no')
			{
				document.form1.input_gr.disabled=false;
			    document.form1.input_gr.focus();
				document.form1.input_name.disabled=true;
				document.form1.input_name.value="";
				document.form1.input_key.disabled=true;
				document.form1.input_key.value="";
				document.form1.input_roll.disabled=true;
				document.form1.input_roll.value="";
			}
			else
			{
				document.form1.input_key.disabled=false;
			    document.form1.input_key.focus();
				document.form1.input_name.disabled=true;
				document.form1.input_name.value="";
				document.form1.input_gr.disabled=true;
				document.form1.input_gr.value="";
				document.form1.input_roll.disabled=true;
				document.form1.input_roll.value="";

			}
		}
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
<form name="form1" method="post" action="attendance_view.php">
<table cellspacing="15">
<tr>
<td>Subject</td>
<td><span id="spryselect1">
  <select name="subject_select">
  <option name="init1">SELECT</option>
    <?=$options?>
  </select>
  <span class="selectRequiredMsg">Please select an item.</span></span></td>
<td>Division</td>
<td><span id="spryselect2">
  <select name="div_select">
    <option name="init">SELECT</option>
    <?=$opt_div?>
    </select>
  <span class="selectRequiredMsg">Please select an item.</span></span></td>
  </tr>
</table>
<table>
  <tr>
      <td><input name="view_type" type="radio" value="single" onclick="makeChoice();"/></td>
      <td><strong>Single</strong></td><td width="826"><table><tr><td height="46"><label>
          <input type="radio" name="searchby" value="roll_no" disabled="disabled" onclick="inChoice();"/>
          Roll No</label>
              <span id="sprytextfield3">
              <input name="input_roll" type="text" disabled="disabled" />
              <span class="textfieldRequiredMsg">A value is required.</span></span></td><td>
        <label>
          <input type="radio" name="searchby" value="gr_no" disabled="disabled" onclick="inChoice();"/>
          Gr
          No
          <input name="input_gr" type="text" disabled="disabled"/>
        </label>
        <span id="sprytextfield4"><span class="textfieldRequiredMsg">A value is required.</span></span></td>
        <td><label>
          <input type="radio" name="searchby" value="name" disabled="disabled" onclick="inChoice();"/>
          Name</label>
          <span id="sprytextfield5">
          <input name="input_name" type="text" disabled="disabled"/>
          <span class="textfieldRequiredMsg">A value is required.</span></span></td><td>
        <label>
          <input type="radio" name="searchby" value="key" disabled="disabled" onclick="inChoice();"/>
          Last Name</label>
        <span id="sprytextfield6">
        <input name="input_key" type="text" disabled="disabled"/>
        <span class="textfieldRequiredMsg">A value is required.</span></span></td></tr></table>
       </td>
  </tr>
  <tr>
    <td><input type="radio" name="view_type" value="all" onclick="makeChoice();" checked="checked"/></td>
      <td><strong>All</strong></td>
  </tr>
  <tr>
      <td><input type="radio" name="view_type" value="range" onclick="makeChoice();"/></td>
      <td><strong>Range</strong></td><td>
             From:
               <span id="sprytextfield1">
               <input name="from_date" id="from_date" type="text" value="click here!" disabled="disabled"/>
               <span class="textfieldRequiredMsg">A value is required.</span><span class="textfieldInvalidFormatMsg">Invalid format.</span></span>        <script type="text/javascript">

  	calendar.set("from_date");

  </script>&emsp;
        To: 
        <span id="sprytextfield2">
        <input name="to_date" type="text" id="to_date"  value="click here!" disabled="disabled"/>
        <span class="textfieldRequiredMsg">A value is required.</span><span class="textfieldInvalidFormatMsg">Invalid format.</span></span>        <script type="text/javascript">

  		calendar.set("to_date");

  </script></td>
  </tr>
  <tr>
  <td>
  <input type="radio" name="view_type" value="percentage_range" onclick="makeChoice();"/></td>
  <td><strong>Percentage</strong>
  </td>
  <td>
  From:
    <span id="sprytextfield7">
    <input type="text" name="from_per" id="from_per" disabled="disabled" />
    <span class="textfieldRequiredMsg">A value is required.</span><span class="textfieldInvalidFormatMsg">Invalid format.</span><span class="textfieldMaxCharsMsg">Exceeded maximum number of characters.</span><span class="textfieldMaxValueMsg">The entered value is greater than the maximum allowed.</span></span>&emsp;
  To:
  <span id="sprytextfield8">
  <input type="text" name="to_per" id="to_per" disabled="disabled" />
  <span class="textfieldRequiredMsg">A value is required.</span><span class="textfieldInvalidFormatMsg">Invalid format.</span><span class="textfieldMaxCharsMsg">Exceeded maximum number of characters.</span><span class="textfieldMaxValueMsg">The entered value is greater than the maximum allowed.</span></span></td>
  </tr>
</table>
<center>
<input type="submit" name="submit" id="submit" value="Submit"/>
</center>
</table>
</form>
<script type="text/javascript">
var spryselect1 = new Spry.Widget.ValidationSelect("spryselect1");
var spryselect2 = new Spry.Widget.ValidationSelect("spryselect2");
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "date", {format:"yyyy-mm-dd"});
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2", "date", {format:"yyyy-mm-dd"});
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3");
var sprytextfield4 = new Spry.Widget.ValidationTextField("sprytextfield4");
var sprytextfield5 = new Spry.Widget.ValidationTextField("sprytextfield5");
var sprytextfield6 = new Spry.Widget.ValidationTextField("sprytextfield6");
var sprytextfield7 = new Spry.Widget.ValidationTextField("sprytextfield7", "integer", {validateOn:["change"], maxChars:3, maxValue:100});
var sprytextfield8 = new Spry.Widget.ValidationTextField("sprytextfield8", "integer", {validateOn:["change"], maxChars:3, maxValue:100});
</script>
</body>
</html>

<?

session_start();
$faculty_code=$_SESSION['faculty'];
if(isset($_POST['submit']))
{
	$report=$_POST['report'];
	$subject_name=$_POST['subject_select'];	
	$div=$_POST['div_select'];
	$split=explode("|",$div);
	$div=$split[0];
	$batch=$split[1];
	$view_type=$_POST['view_type'];
	if(isset($view_type))
	{
		$val=$view_type;
		if($val=='single')
		{
			$searchby=$_POST['searchby'];
			if(isset($searchby))
			{
				$val_search=$searchby;
				if($val_search=='roll_no')
				{
					$roll_is=$_POST['input_roll'];
					$sub="SELECT branch_name,elective FROM subject WHERE subject_code='$subject_name'";
					$table_name=mysql_query($sub);
					while($row=mysql_fetch_array($table_name))
					{
						$elective=$row['elective'];
						if($elective=="yes")
						{
							$table="elective";
							$att_type="att_elective";
						}
						else
						{
							$table=$row['branch_name'];
							$att_type="attendance";
						}
						$yr_query=mysql_query("SELECT trim,year FROM subject_allocation WHERE subject_code='$subject_name' AND faculty_code='$faculty_code' AND division='$div'") or die(mysql_error());
						while($row_yr=mysql_fetch_array($yr_query))
						{
							$trim_ch=$row_yr['trim'];
							$year_ch=$row_yr['year'];
							$cur_year=date('Y');
							$valid_year=$cur_year-4;

if($batch=="0")
{
	if($elective=="yes")
	{
			$query="SELECT DISTINCT gr_no FROM $table WHERE division='$div' AND `trim`='$trim_ch' AND `year`='$year_ch' AND year<='$cur_year' AND year>='$valid_year' AND roll_no='$roll_is' AND subject_code='$subject_name' ORDER BY roll_no";
	}
	else
	{
		$query="SELECT DISTINCT gr_no FROM $table WHERE division='$div' AND `trim`='$trim_ch' AND `year`='$year_ch' AND year<='$cur_year' AND year>='$valid_year' AND roll_no='$roll_is' ORDER BY roll_no";
	}
						$finresult=mysql_query($query) or die(mysql_error());
}
else
{
	if($elective=="yes")
	{
			$query="SELECT DISTINCT gr_no FROM $table WHERE division='$div' AND `trim`='$trim_ch' AND `year`='$year_ch' AND year<='$cur_year' AND year>='$valid_year' AND roll_no='$roll_is' AND batch=$batch AND subject_code='$subject_name' ORDER BY roll_no";
	}
	else
	{
		$query="SELECT DISTINCT gr_no FROM $table WHERE division='$div' AND `trim`='$trim_ch' AND `year`='$year_ch' AND year<='$cur_year' AND year>='$valid_year' AND roll_no='$roll_is' AND batch=$batch ORDER BY roll_no";
	}
						$finresult=mysql_query($query) or die(mysql_error());
}
						}
					}

$gr=array();
$first_name=array();
$last_name=array();
$att=array();
$att_slot=array();
$roll_no=array();
$percentage=array();
$i=0;
$flag=0;


while($rows=mysql_fetch_array($finresult))
{
	$gr[$i]=$rows['gr_no'];
	$gr_no=$gr[$i];
	$name=mysql_query("SELECT first_name,middle_name,last_name FROM students WHERE gr_no='$gr_no'");
	$att_q="SELECT SUM(att_hours),SUM(slot) FROM $att_type WHERE gr_no='$gr_no' AND subject_code='$subject_name' AND faculty_code='$faculty_code' AND type_lec=$batch GROUP BY gr_no";		 	
	$att_result=mysql_query($att_q) or die(mysql_error());
	
	while($rows_att=mysql_fetch_array($att_result))
	
	{
		$att[$i]=$rows_att['SUM(att_hours)'];
		$att_slot[$i]=$rows_att['SUM(slot)'];
		$percentage[$i]=($att[$i]/$att_slot[$i])*100;
		$flag=1;

	}
	while($rows1=mysql_fetch_array($name))
	{
		$first_name[$i]=$rows1['first_name'];
		$last_name[$i]=$rows1['last_name'];
		$middle_name[$i]=$rows1['middle_name'];
	}
	
	$roll=mysql_query("SELECT roll_no FROM $table WHERE gr_no='$gr_no'");
	while($row_rol=mysql_fetch_array($roll))
	{
		$roll_no[$i]=$row_rol['roll_no'];
	}
	$i++;
}


$count=mysql_num_rows($finresult);
	}
	
				else if($val_search=='gr_no')
				{
					$gr_is=$_POST['input_gr'];
					$sub="SELECT branch_name,elective FROM subject WHERE subject_code='$subject_name'";
					$table_name=mysql_query($sub);
					while($row=mysql_fetch_array($table_name))
					{
						$elective=$row['elective'];
						if($elective=="yes")
						{
							$table="elective";
							$att_type="att_elective";
						}
						else
						{
							$table=$row['branch_name'];
							$att_type="attendance";
						}
						$yr_query=mysql_query("SELECT trim,year FROM subject_allocation WHERE subject_code='$subject_name' AND faculty_code='$faculty_code' AND division='$div'") or die(mysql_error());
						while($row_yr=mysql_fetch_array($yr_query))
						{
							$trim_ch=$row_yr['trim'];
							$year_ch=$row_yr['year'];
							$cur_year=date('Y');
							$valid_year=$cur_year-4;
if($batch=="0")
{
	if($elective=="yes")
	{
							$query="SELECT DISTINCT gr_no FROM $table WHERE division='$div' AND `trim`='$trim_ch' AND `year`='$year_ch' AND year<='$cur_year' AND year>='$valid_year' AND gr_no='$gr_is' AND subject_code='$subject_name' ORDER BY roll_no";
	}
	else
	{
		$query="SELECT DISTINCT gr_no FROM $table WHERE division='$div' AND `trim`='$trim_ch' AND `year`='$year_ch' AND year<='$cur_year' AND year>='$valid_year' AND gr_no='$gr_is' ORDER BY roll_no";
	}
	$finresult=mysql_query($query) or die(mysql_error());
}
else
{
	if($elective=="yes")
	{
			$query="SELECT DISTINCT gr_no FROM $table WHERE division='$div' AND `trim`='$trim_ch' AND `year`='$year_ch' AND year<='$cur_year' AND year>='$valid_year' AND gr_no='$gr_is' AND batch=$batch AND subject_code='$subject_name' ORDER BY roll_no";
	}
	else
	{
		$query="SELECT DISTINCT gr_no FROM $table WHERE division='$div' AND `trim`='$trim_ch' AND `year`='$year_ch' AND year<='$cur_year' AND year>='$valid_year' AND gr_no='$gr_is' AND batch=$batch ORDER BY roll_no";
	}
	$finresult=mysql_query($query) or die(mysql_error());
}
						}
					}

$gr=array();
$first_name=array();
$last_name=array();
$att=array();
$att_slot=array();
$roll_no=array();
$percentage=array();
$i=0;
$flag=0;


while($rows=mysql_fetch_array($finresult))
{
	$gr[$i]=$rows['gr_no'];
	$gr_no=$gr[$i];
	$name=mysql_query("SELECT first_name,middle_name,last_name FROM students WHERE gr_no='$gr_no'");
	$att_q="SELECT SUM(att_hours),SUM(slot) FROM $att_type WHERE gr_no='$gr_no' AND subject_code='$subject_name' AND faculty_code='$faculty_code' AND type_lec=$batch GROUP BY gr_no";		 	
	$att_result=mysql_query($att_q) or die(mysql_error());
	
	while($rows_att=mysql_fetch_array($att_result))
	
	{
		$att[$i]=$rows_att['SUM(att_hours)'];
		$att_slot[$i]=$rows_att['SUM(slot)'];
		$percentage[$i]=($att[$i]/$att_slot[$i])*100;
		$flag=1;

	}
	while($rows1=mysql_fetch_array($name))
	{
		$first_name[$i]=$rows1['first_name'];
		$last_name[$i]=$rows1['last_name'];
		$middle_name[$i]=$rows1['middle_name'];
	}
	
	$roll=mysql_query("SELECT roll_no FROM $table WHERE gr_no='$gr_no'");
	while($row_rol=mysql_fetch_array($roll))
	{
		$roll_no[$i]=$row_rol['roll_no'];
	}
	$i++;
}


$count=mysql_num_rows($finresult);
	

				}
				else if($val_search=='name')
				{
					$name_is=ucwords(strtolower($_POST['input_name']));
					
					$sub="SELECT branch_name,elective FROM subject WHERE subject_code='$subject_name'";
					$table_name=mysql_query($sub);
					while($row=mysql_fetch_array($table_name))
					{
						$elective=$row['elective'];
						if($elective=="yes")
						{
							$table="elective";
							$att_type="att_elective";
						}
						else
						{
							$table=$row['branch_name'];
							$att_type="attendance";
						}
						$yr_query=mysql_query("SELECT trim,year FROM subject_allocation WHERE subject_code='$subject_name' AND faculty_code='$faculty_code' AND division='$div'") or die(mysql_error());
						while($row_yr=mysql_fetch_array($yr_query))
						{
							$trim_ch=$row_yr['trim'];
							$year_ch=$row_yr['year'];
							$cur_year=date('Y');
							$valid_year=$cur_year-4;
if($batch=="0")
{
	if($elective=="yes")
	{
							$query="SELECT DISTINCT t.gr_no FROM $table as t,students WHERE division='$div' AND `trim`='$trim_ch' AND `year`='$year_ch' AND year<='$cur_year' AND year>='$valid_year' AND LOWER(first_name)='$name_is' AND t.gr_no=students.gr_no AND subject_cod'$subject_name' ORDER BY roll_no";
	}
	else
	{
		$query="SELECT DISTINCT t.gr_no FROM $table as t,students WHERE division='$div' AND `trim`='$trim_ch' AND `year`='$year_ch' AND year<='$cur_year' AND year>='$valid_year' AND LOWER(first_name)='$name_is' AND t.gr_no=students.gr_no ORDER BY roll_no";
	}
						$finresult=mysql_query($query) or die(mysql_error());
						}
else
{
	if($elective=="yes")
	{
							$query="SELECT DISTINCT t.gr_no FROM $table as t,students WHERE division='$div' AND `trim`='$trim_ch' AND `year`='$year_ch' AND year<='$cur_year' AND year>='$valid_year' AND LOWER(first_name)='$name_is' AND t.gr_no=students.gr_no AND batch=$batch AND subject_code='$subject_name' ORDER BY roll_no";
	}
	else
	{
		$query="SELECT DISTINCT t.gr_no FROM $table as t,students WHERE division='$div' AND `trim`='$trim_ch' AND `year`='$year_ch' AND year<='$cur_year' AND year>='$valid_year' AND LOWER(first_name)='$name_is' AND t.gr_no=students.gr_no AND batch=$batch ORDER BY roll_no";
	}
						$finresult=mysql_query($query) or die(mysql_error());
						}

						
						}
						
					}

$gr=array();
$first_name=array();
$last_name=array();
$att=array();
$att_slot=array();
$roll_no=array();
$percentage=array();
$i=0;
$flag=0;


while($rows=mysql_fetch_array($finresult))
{
	$gr[$i]=$rows['gr_no'];
	$gr_no=$gr[$i];
	$name=mysql_query("SELECT first_name,middle_name,last_name FROM students WHERE gr_no='$gr_no'");
	$att_q="SELECT SUM(att_hours),SUM(slot) FROM $att_type WHERE gr_no='$gr_no' AND subject_code='$subject_name' AND faculty_code='$faculty_code' AND type_lec=$batch GROUP BY gr_no";		 	
	$att_result=mysql_query($att_q) or die(mysql_error());
	
	while($rows_att=mysql_fetch_array($att_result))
	
	{
		$att[$i]=$rows_att['SUM(att_hours)'];
		$att_slot[$i]=$rows_att['SUM(slot)'];
		$percentage[$i]=($att[$i]/$att_slot[$i])*100;
		$flag=1;

	}
	while($rows1=mysql_fetch_array($name))
	{
		$first_name[$i]=$rows1['first_name'];
		$last_name[$i]=$rows1['last_name'];
		$middle_name[$i]=$rows1['middle_name'];
	}
	
	$roll=mysql_query("SELECT roll_no FROM $table WHERE gr_no='$gr_no'");
	while($row_rol=mysql_fetch_array($roll))
	{
		$roll_no[$i]=$row_rol['roll_no'];
	}
	$i++;
}


$count=mysql_num_rows($finresult);
	

				}
				else if($val_search=='key')
				{
					$key_is=ucwords(strtolower($_POST['input_key']));
					
					$sub="SELECT branch_name,elective FROM subject WHERE subject_code='$subject_name'";
					$table_name=mysql_query($sub);
					while($row=mysql_fetch_array($table_name))
					{
						$elective=$row['elective'];
						if($elective=="yes")
						{
							$table="elective";
							$att_type="att_elective";
						}
						else
						{
							$table=$row['branch_name'];
							$att_type="attendance";
						}
						$yr_query=mysql_query("SELECT trim,year FROM subject_allocation WHERE subject_code='$subject_name' AND faculty_code='$faculty_code' AND division='$div'") or die(mysql_error());
						while($row_yr=mysql_fetch_array($yr_query))
						{
							$trim_ch=$row_yr['trim'];
							$year_ch=$row_yr['year'];
							$cur_year=date('Y');
							$valid_year=$cur_year-4;

if($batch=="0")
{
	if($elective=="yes")
	{
							$query="SELECT DISTINCT t.gr_no FROM $table as t,students WHERE division='$div' AND `trim`='$trim_ch' AND `year`='$year_ch' AND year<='$cur_year' AND year>='$valid_year' AND LOWER(last_name)='$key_is' AND t.gr_no=students.gr_no AND subject_code='$subject_name' ORDER BY roll_no";
	}
	else
	{
		$query="SELECT DISTINCT t.gr_no FROM $table as t,students WHERE division='$div' AND `trim`='$trim_ch' AND `year`='$year_ch' AND year<='$cur_year' AND year>='$valid_year' AND LOWER(last_name)='$key_is' AND t.gr_no=students.gr_no ORDER BY roll_no";
	}
	$finresult=mysql_query($query) or die(mysql_error());

}
else
{
	if($elective=="yes")
	{	
							$query="SELECT DISTINCT t.gr_no FROM $table as t,students WHERE division='$div' AND `trim`='$trim_ch' AND `year`='$year_ch' AND year<='$cur_year' AND year>='$valid_year' AND LOWER(last_name)='$key_is' AND t.gr_no=students.gr_no AND batch=$batch AND subject_code='$subject_name' ORDER BY roll_no";
	}
	else
	{
			$query="SELECT DISTINCT t.gr_no FROM $table as t,students WHERE division='$div' AND `trim`='$trim_ch' AND `year`='$year_ch' AND year<='$cur_year' AND year>='$valid_year' AND LOWER(last_name)='$key_is' AND t.gr_no=students.gr_no AND batch=$batch ORDER BY roll_no";
	}
	
						$finresult=mysql_query($query) or die(mysql_error());
}
						}
					}

$gr=array();
$first_name=array();
$last_name=array();
$att=array();
$att_slot=array();
$roll_no=array();
$percentage=array();
$i=0;
$flag=0;


while($rows=mysql_fetch_array($finresult))
{
	$gr[$i]=$rows['gr_no'];
	$gr_no=$gr[$i];
	$name=mysql_query("SELECT first_name,middle_name,last_name FROM students WHERE gr_no='$gr_no'");
	$att_q="SELECT SUM(att_hours),SUM(slot) FROM $att_type WHERE gr_no='$gr_no' AND subject_code='$subject_name' AND faculty_code='$faculty_code' AND type_lec=$batch GROUP BY gr_no";		 	
	$att_result=mysql_query($att_q) or die(mysql_error());
	
	while($rows_att=mysql_fetch_array($att_result))
	
	{
		$att[$i]=$rows_att['SUM(att_hours)'];
		$att_slot[$i]=$rows_att['SUM(slot)'];
		$percentage[$i]=($att[$i]/$att_slot[$i])*100;
		$flag=1;

	}
	while($rows1=mysql_fetch_array($name))
	{
		$first_name[$i]=$rows1['first_name'];
		$last_name[$i]=$rows1['last_name'];
		$middle_name[$i]=$rows1['middle_name'];
	}
	
	$roll=mysql_query("SELECT roll_no FROM $table WHERE gr_no='$gr_no'");
	while($row_rol=mysql_fetch_array($roll))
	{
		$roll_no[$i]=$row_rol['roll_no'];
	}
	$i++;
}


$count=mysql_num_rows($finresult);

				}
			}
			else
			{
				echo"Search type should be specified first";
			}
		}
		else if($val=='range')
		{
			$from=$_POST['from_date'];
			$to=$_POST['to_date'];
			echo"from: ".$from." to: ".$to;
			
					$sub="SELECT branch_name,elective FROM subject WHERE subject_code='$subject_name'";
					$table_name=mysql_query($sub);
					while($row=mysql_fetch_array($table_name))
					{
						$elective=$row['elective'];
						if($elective=="yes")
						{
							$table="elective";
							$att_type="att_elective";
						}
						else
						{
							$table=$row['branch_name'];
							$att_type="attendance";
						}
						$yr_query=mysql_query("SELECT trim,year FROM subject_allocation WHERE subject_code='$subject_name' AND faculty_code='$faculty_code' AND division='$div'") or die(mysql_error());
						while($row_yr=mysql_fetch_array($yr_query))
						{
							$trim_ch=$row_yr['trim'];
							$year_ch=$row_yr['year'];
							$cur_year=date('Y');
							$valid_year=$cur_year-4;
if($batch=="0")
{
	if($elective=="yes")
	{
							$query="SELECT DISTINCT gr_no FROM $table WHERE division='$div' AND `trim`='$trim_ch' AND `year`='$year_ch' AND year<='$cur_year' AND year>='$valid_year' AND subject_code='$subject_name' ORDER BY roll_no";
	}
	else
	{
								$query="SELECT DISTINCT gr_no FROM $table WHERE division='$div' AND `trim`='$trim_ch' AND `year`='$year_ch' AND year<='$cur_year' AND year>='$valid_year' ORDER BY roll_no";
	}
						$finresult=mysql_query($query) or die(mysql_error());
}
else
{
	if($elective=="yes")
	{
		
		$query="SELECT DISTINCT gr_no FROM $table WHERE division='$div' AND `trim`='$trim_ch' AND `year`='$year_ch' AND year<='$cur_year' AND year>='$valid_year' AND batch=$batch AND subject_code='$subject_name' ORDER BY roll_no";
	}
	else
	{
		$query="SELECT DISTINCT gr_no FROM $table WHERE division='$div' AND `trim`='$trim_ch' AND `year`='$year_ch' AND year<='$cur_year' AND year>='$valid_year' AND batch=$batch ORDER BY roll_no";
	}
						$finresult=mysql_query($query) or die(mysql_error());
}
}
					}

$gr=array();
$first_name=array();
$last_name=array();
$att=array();
$att_slot=array();
$roll_no=array();
$percentage=array();
$i=0;
$flag=0;

while($rows=mysql_fetch_array($finresult))
{
	$gr[$i]=$rows['gr_no'];
	$gr_no=$gr[$i];
	$att_query="SELECT gr_no FROM attendance WHERE gr_no='$gr_no' AND date>='$from' AND date<='$to'";
	$att_gr=mysql_query($att_query);
	while($rowofatt=mysql_fetch_array($att_gr))
	{
		$gr[$i]=$rowofatt['gr_no'];
		$gr_no=$gr[$i];
	}
	
	$name=mysql_query("SELECT first_name,middle_name,last_name FROM students WHERE gr_no='$gr_no'");
	$att_q="SELECT SUM(att_hours),SUM(slot) FROM $att_type WHERE gr_no='$gr_no' AND subject_code='$subject_name' AND faculty_code='$faculty_code' AND type_lec=$batch AND date>='$from' AND date<='$to' GROUP BY gr_no";		 	
	$att_result=mysql_query($att_q) or die(mysql_error());
	
	while($rows_att=mysql_fetch_array($att_result))
	
	{
		$att[$i]=$rows_att['SUM(att_hours)'];
		$att_slot[$i]=$rows_att['SUM(slot)'];
		$percentage[$i]=($att[$i]/$att_slot[$i])*100;
		$flag=1;

	}
	while($rows1=mysql_fetch_array($name))
	{
		$first_name[$i]=$rows1['first_name'];
		$last_name[$i]=$rows1['last_name'];
		$middle_name[$i]=$rows1['middle_name'];
	}
	
	$roll=mysql_query("SELECT roll_no FROM $table WHERE gr_no='$gr_no'");
	while($row_rol=mysql_fetch_array($roll))
	{
		$roll_no[$i]=$row_rol['roll_no'];
	}
	$i++;
}


$count=mysql_num_rows($finresult);
	

		}
	else if($val=='all' ||$val=='percentage_range')
	{
		
		$sub="SELECT branch_name,elective FROM subject WHERE subject_code='$subject_name'";
		$table_name=mysql_query($sub);
		while($row=mysql_fetch_array($table_name))
		{
						$elective=$row['elective'];
						if($elective=="yes")
						{
							$table="elective";
							$att_type="att_elective";
						}
						else
						{
							$table=$row['branch_name'];
							$att_type="attendance";
						}	
						$yr_query=mysql_query("SELECT trim,year FROM subject_allocation WHERE subject_code='$subject_name' AND faculty_code='$faculty_code' AND division='$div'") or die(mysql_error());
		while($row_yr=mysql_fetch_array($yr_query))
		{
			$trim_ch=$row_yr['trim'];
			$year_ch=$row_yr['year'];
			$cur_year=date('Y');
			$valid_year=$cur_year-4;
if($batch=="0")
{
	if($elective=="yes")
	{
			$query="SELECT DISTINCT gr_no FROM $table WHERE division='$div' AND `trim`='$trim_ch' AND `year`='$year_ch' AND year<='$cur_year' AND year>='$valid_year' AND subject_code='$subject_name' ORDER BY roll_no";
	}
	else
	{
				$query="SELECT DISTINCT gr_no FROM $table WHERE division='$div' AND `trim`='$trim_ch' AND `year`='$year_ch' AND year<='$cur_year' AND year>='$valid_year' ORDER BY roll_no";
	}
			$finresult=mysql_query($query) or die(mysql_error());
}
else
{
	if($elective=="yes")
	{
		
	$query="SELECT DISTINCT gr_no FROM $table WHERE division='$div' AND `trim`='$trim_ch' AND `year`='$year_ch' AND year<='$cur_year' AND year>='$valid_year' AND batch=$batch AND subject_code='$subject_name' ORDER BY roll_no";
	}
	else
	{
			$query="SELECT DISTINCT gr_no FROM $table WHERE division='$div' AND `trim`='$trim_ch' AND `year`='$year_ch' AND year<='$cur_year' AND year>='$valid_year' AND batch=$batch ORDER BY roll_no";
	}
			$finresult=mysql_query($query) or die(mysql_error());
}
		}
	}

$gr=array();
$first_name=array();
$last_name=array();
$att=array();
$att_slot=array();
$roll_no=array();
$percentage=array();
$per_range=array();
$i=0;
$flag=0;
$j=0;

while($rows=mysql_fetch_array($finresult))
{
	$gr[$i]=$rows['gr_no'];
	$gr_no=$gr[$i];
	$name=mysql_query("SELECT first_name,middle_name,last_name FROM students WHERE gr_no='$gr_no'");
	$att_q="SELECT SUM(att_hours),SUM(slot) FROM $att_type WHERE gr_no='$gr_no' AND subject_code='$subject_name'  AND faculty_code='$faculty_code' AND type_lec=$batch GROUP BY gr_no";		 	
	$att_result=mysql_query($att_q) or die(mysql_error());
	while($rows_att=mysql_fetch_array($att_result))
	
	{
		$att[$i]=$rows_att['SUM(att_hours)'];
		$att_slot[$i]=$rows_att['SUM(slot)'];
		$percentage[$i]=($att[$i]/$att_slot[$i])*100;
		if($val=='percentage_range')
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
			
	while($rows1=mysql_fetch_array($name))
	{
		$first_name[$i]=$rows1['first_name'];
		$last_name[$i]=$rows1['last_name'];
		$middle_name[$i]=$rows1['middle_name'];
		
	}
	
	$roll=mysql_query("SELECT roll_no FROM $table WHERE gr_no='$gr_no'");
	while($row_rol=mysql_fetch_array($roll))
	{
		$roll_no[$i]=$row_rol['roll_no'];
	}
	$i++;
}


$count=mysql_num_rows($finresult);
	}
	
	if($count!="0" && $flag!='0')
	{
		echo "<br/><table align=\"center\"><tr bgcolor=\"#99FF99\"><td>Roll no</td><td>Gr No</td><td></td><td>Name</td><td></td><td>Attended hrs</td><td>Total Hours</td><td>Percentage</td></tr>";
	
	
for($i=0;$i<$count;$i++)
{
	if($val=='percentage_range')
	{ 
		if($i==$per_range[$i])
		{
			echo "<tr align=\"center\" bgcolor=\"#FF3366\"><td>".$roll_no[$i]."</td><td>".$gr[$i]."</td><td>".$first_name[$i]."</td><td>".$middle_name[$i]."</td><td>".$last_name[$i]."</td><td>".$att[$i]."</td><td>".$att_slot[$i]."</td><td>".round($percentage[$i],2);
		}
		else if($i%2!=0)
		{
			echo "<tr  align=\"center\" bgcolor=\"#FFFFFF\"><td>".$roll_no[$i]."</td><td>".$gr[$i]."</td><td>".$first_name[$i]."</td><td>".$middle_name[$i]."</td><td>".$last_name[$i]."</td><td>".$att[$i]."</td><td>".$att_slot[$i]."</td><td>".round($percentage[$i],2);
		}
		else
		{
			echo "<tr align=\"center\" bgcolor=\"#C9C9C9\"><td>".$roll_no[$i]."</td><td>".$gr[$i]."</td><td>".$first_name[$i]."</td><td>".$middle_name[$i]."</td><td>".$last_name[$i]."</td><td>".$att[$i]."</td><td>".$att_slot[$i]."</td><td>".round($percentage[$i],2);
		}
		
	}
	else if($i%2!=0)
	{
		echo "<tr  align=\"center\" bgcolor=\"#FFFFFF\"><td>".$roll_no[$i]."</td><td>".$gr[$i]."</td><td>".$first_name[$i]."</td><td>".$middle_name[$i]."</td><td>".$last_name[$i]."</td><td>".$att[$i]."</td><td>".$att_slot[$i]."</td><td>".round($percentage[$i],2);
	}
	else
	{
		echo "<tr align=\"center\" bgcolor=\"#C9C9C9\"><td>".$roll_no[$i]."</td><td>".$gr[$i]."</td><td>".$first_name[$i]."</td><td>".$middle_name[$i]."</td><td>".$last_name[$i]."</td><td>".$att[$i]."</td><td>".$att_slot[$i]."</td><td>".round($percentage[$i],2);
	}

}
	}
	else
	{
		
		echo"<br/> No attendance records exist for your selection ";
	}
}
else if(isset($report))
{
	session_start();
	session_register("subject_select");
	session_register("div_select"); 
	header("location:teacher_homehtml.php");
	
}
else
{
	echo"<br/>PLEASE SELECT A RADIO BUTTON";
}
}
?>