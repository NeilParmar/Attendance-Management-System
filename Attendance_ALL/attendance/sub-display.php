<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Subject-List</title>
</head>

<body>
<?php
error_reporting(E_ALL);
require_once dirname(__FILE__).'/Classes/PHPExcel.php';
session_start();
$inputFileName = "dir/".$_SESSION['excel'];  
$inputFileType = PHPExcel_IOFactory::identify($inputFileName);  
$objReader = PHPExcel_IOFactory::createReader($inputFileType);  
$objReader->setReadDataOnly(true);  
/**  Load $inputFileName to a PHPExcel Object  **/  
$objPHPExcel = $objReader->load($inputFileName);  
$total_sheets=$objPHPExcel->getSheetCount(); 
$allSheetName=$objPHPExcel->getSheetNames();  
$objWorksheet = $objPHPExcel->setActiveSheetIndex(0);  
$highestRow = $objWorksheet->getHighestRow(); 
$highestColumn = $objWorksheet->getHighestColumn();  
$highestColumnIndex = PHPExcel_Cell::columnIndexFromString($highestColumn);    

mysql_connect("localhost","root","shabnam") or die(mysql_error());
mysql_select_db("attendance");


for ($row = 1; $row <= $highestRow; $row++) 
{
    for ($col = 0; $col < $highestColumnIndex; $col++) 
	{  
    	$value=$objWorksheet->getCellByColumnAndRow($col, $row)->getValue(); 
		$arr_data[$row][$col]=$value;
    } 
}


echo "<center><table border=\"0\">";

for ($row = 1; $row <= $highestRow; $row++) 
{
	if($arr_data[$row][0]!=NULL)
	{
  		if($row%2!=0)
		{
	
  			echo "<tr bgcolor=\"#FFFFFF\">";
   			for ($col = 0; $col < $highestColumnIndex; $col++) 
			{  
					echo "<td>".$arr_data[$row][$col]."</td>"; 
			}
   			echo"</tr>";
		}
		else
		{
			echo "<tr bgcolor=\"#CCCCCC\">";
   			for ($col = 0; $col < $highestColumnIndex; $col++) 
			{  
					echo "<td>".$arr_data[$row][$col]."</td>"; 
			}
   			echo"</tr>";
		}
	}
}


echo"</table></center>";


for($row=2;$row<= $highestRow;$row++)
{
	if($arr_data[$row][0]!=NULL)
	{

		$temp1=strtolower($arr_data[$row][0]); //subject name
		$temp2=$arr_data[$row][1]; //trim
		$temp3=strtolower($arr_data[$row][2]); //branch
		$temp4=$arr_data[$row][3]; //no_of_hours
		$temp5=strtolower($arr_data[$row][4]); //type
		$temp6=strtolower($arr_data[$row][5]); //elective
		$temp7=strtolower($arr_data[$row][6]);//degree
		$temp8=$temp1;
		if($temp6=="yes")
			{
				$temp1.=" [elec]";
			}	

			//subject name based on stream and degree
			$temp1.=" [".$temp7."-".$temp3."]";
		
		if(strtoupper($temp3)=="IT")
			{
				$temp3="information_technology";
			}
			else if(strtoupper($temp3)=="EXTC")
			{
				$temp3="extc";
			}
			else if(strtoupper($temp3)=="CS")
			{
				$temp3="computer_science";
			}
			else if(strtoupper($temp3)=="CIVIL")
			{
				$temp3="civil";
			}
			else if(strtoupper($temp3)=="ELEX")
			{
				$temp3="electronics";
			}
			else if(strtoupper($temp3)=="MECH")
			{
				$temp3="mechanical";
			}
			//subject code generation
			$temp0=$temp7."_".$temp3."_".$temp8."_".$temp2;
			
 $sub_query="INSERT INTO subject(subject_code,no_of_hours,subject_name,trim,branch_name,type_lec,elective) VALUES('$temp0','$temp4','$temp1','$temp2','$temp3','$temp5','$temp6')";
			$sub_result=mysql_query($sub_query) or die(mysql_error());		
	}
}
if($sub_result==true)
{
	unlink($inputFileName);
	echo "<script>alert('Sucessful Update!')</script>";
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

