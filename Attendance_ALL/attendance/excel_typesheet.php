<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<script src="SpryAssets/SpryValidationSelect.js" type="text/javascript"></script>
<link href="SpryAssets/SpryValidationSelect.css" rel="stylesheet" type="text/css" />
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
<form name="form1" method="post" action="excel_typesheet.php">
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
<input type="submit" name="submit" id="submit" value="Submit"/>
</form>
</center>
<script type="text/javascript">
var spryselect1 = new Spry.Widget.ValidationSelect("spryselect1", {validateOn:["blur"]});
var spryselect2 = new Spry.Widget.ValidationSelect("spryselect2", {validateOn:["blur"]});
</script>
</body>
</html>

<?
session_start();
$faculty_code=$_SESSION['faculty'];
if(isset($_POST['submit']))
{
	$subject_name=$_POST['subject_select'];	
	$div=$_POST['div_select'];
	$split=explode("|",$div);
	$div=$split[0];
	$batch=$split[1];

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
									
								$query="SELECT DISTINCT gr_no FROM $table WHERE division='$div' AND `trim`='$trim_ch' AND `year`='$year_ch' AND year<='$cur_year' AND year>='$valid_year' AND batch='$batch' AND subject_code='$subject_name' ORDER BY roll_no";
								}
								else
								{
									$query="SELECT DISTINCT gr_no FROM $table WHERE division='$div' AND `trim`='$trim_ch' AND `year`='$year_ch' AND year<='$cur_year' AND year>='$valid_year' AND batch='$batch' ORDER BY roll_no";
								}
								$finresult=mysql_query($query) or die(mysql_error());
	
							}
			}
						$i=0;
						$flag=0;

						while($rows=mysql_fetch_array($finresult))
						{
							$gr[$i]=$rows['gr_no'];
							$gr_no=$gr[$i];
							$name=mysql_query("SELECT first_name,middle_name,last_name FROM students WHERE gr_no='$gr_no'");	
							$att_date="SELECT DISTINCT date,start_time,slot FROM $att_type WHERE gr_no='$gr_no' AND subject_code='$subject_name' AND faculty_code='$faculty_code' AND type_lec='$batch'";
							$result_dt=mysql_query($att_date) or die(mysql_error());
							$k=0;
							while($r_d=mysql_fetch_array($result_dt))
							{
								$att_slot=$r_d['slot'];
								$date=$r_d['date'];
								$time=$r_d['start_time'];
								$att_s[$k]=$att_slot;
								$dt[$k]=$date;
								$tym[$k]=$time;
								$att_q="SELECT att_hours FROM $att_type WHERE gr_no='$gr_no' AND subject_code='$subject_name'  AND faculty_code='$faculty_code' AND type_lec='$batch' AND slot='$att_slot' AND date='$date' AND start_time='$time'" ;		 	
								$att_result=mysql_query($att_q) or die(mysql_error());
								while($rows_att=mysql_fetch_array($att_result))
	
								{
									$att[$i][$k]=$rows_att['att_hours'];
									$flag=1;
									$k++;

								}
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
			
						
					}

					$count=mysql_num_rows($finresult);
					$count_dt=$k;
				
					if($count!="0" && $flag!='0')
					{
						echo "<br/><table><tr align=\"center\" bgcolor=\"#99FF99\"><td>Roll no</td><td></td><td>Name</td><td></td>";
						for($j=0;$j<$count_dt;$j++)
						{
							echo"<td width=\"10\">".date('d/m/y', strtotime($dt[$j]))."<br/>".$tym[$j]."<br/>(".$att_s[$j].")</td>";
						}
	
						for($i=0;$i<$count;$i++)
						{
								if($i%2!=0)
								{
									echo "<tr align=\"center\" bgcolor=\"#FFFFFF\"><td>".$roll_no[$i]."</td><td>".$first_name[$i]."</td><td>".$middle_name[$i]."</td><td>".$last_name[$i]."</td>";
									for($j=0;$j<$count_dt;$j++)
									{
										$add_col="<td>".$att[$i][$j]."</td>";
										echo $add_col;
									}
								}
								else
								{
									echo "<tr align=\"center\" bgcolor=\"#C9C9C9\"><td>".$roll_no[$i]."</td><td>".$first_name[$i]."</td><td>".$middle_name[$i]."</td><td>".$last_name[$i]."</td>";
									for($j=0;$j<$count_dt;$j++)
									{
										$add_col="<td>".$att[$i][$j]."</td>";
										echo $add_col;
									}	
								}
						}
						
					}
					else
					{
						echo"No record Exists for your Selection";
					}
}
	
?>