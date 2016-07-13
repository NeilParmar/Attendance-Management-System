<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Faculty-List</title>
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


echo "<center><table border=\"1\">";

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
		$temp0=strtolower($arr_data[$row][0]);
		$temp1=strtolower($arr_data[$row][1]);
		$temp2=strtolower($arr_data[$row][2]);
		
		$splitdata=explode(' ',$temp1);
		$firstname=ucwords($splitdata[0]);
		if($splitdata[2]==NULL)
		{
			$lastname=ucwords($splitdata[1]);
		}
		else
		{
			$lastname=ucwords($splitdata[2]);
			$middlename=ucwords($splitdata[1]);
		}
					
 $sub_query="INSERT INTO faculty(first_name,middle_name,last_name,Faculty_code,password) VALUES('$firstname','$middlename','$lastname','$temp0',PASSWORD('$temp2'))";
			$sub_result=mysql_query($sub_query) or die(mysql_error());		
			
			$firstname=" ";
			$middlename=" ";
			$lastname=" ";
			
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

