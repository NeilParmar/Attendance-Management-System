<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Excel Attend</title>
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


for ($row = 0; $row <= $highestRow; $row++) 
{
    for ($col = 0; $col < $highestColumnIndex; $col++) 
	{  
		if($row==2 && $col>0)
		{
    			$value=$objWorksheet->getCellByColumnAndRow($col, $row);
			$cell_value = PHPExcel_Style_NumberFormat::toFormattedString($value->getCalculatedValue(), 'hh:mm:ss');
			$arr_data[$row][$col]=$cell_value;
		}
		else if($row==1 && $col>0)
		{
			$value=$objWorksheet->getCellByColumnAndRow($col, $row);
			$cell_value = PHPExcel_Style_NumberFormat::toFormattedString($value->getCalculatedValue(), 'YYYY-MM-DD');
			$arr_data[$row][$col]=$cell_value;
		}
		else
		{
			$value=$objWorksheet->getCellByColumnAndRow($col, $row)->getValue(); 
			$arr_data[$row][$col]=$value;
		}
		
	}
}


echo "<center><table border=\"0\">";

for ($row = 0; $row <= $highestRow; $row++) 
{
	if($arr_data[$row][0]!=NULL)
	{
	if($row<=4)
		{
			echo "<tr bgcolor=\'#FF3366\'>";
	   			for ($col = 0; $col < $highestColumnIndex; $col++) 
				{  
				   if($arr_data[1][$col]!=NULL)
				   {	
				   	echo "<td>".$arr_data[$row][$col]."</td>"; 					 
				   }

				}
	   			echo"</tr>";
		}
		else
		{
  			if($row%2!=0)
			{
	
	  			echo "<tr bgcolor=\"#FFFFFF\">";
	   			for ($col = 0; $col < $highestColumnIndex; $col++) 
				{  if($arr_data[1][$col]!=NULL)
				   {	
				   
						echo "<td>".$arr_data[$row][$col]."</td>"; 
				    }

				}
	   			echo"</tr>";
			}
			else
			{
				echo "<tr bgcolor=\"#CCCCCC\">";
   				for ($col = 0; $col < $highestColumnIndex; $col++) 
				{  
					if($arr_data[1][$col]!=NULL)
				   {	
				   
					echo "<td>".$arr_data[$row][$col]."</td>"; 
				    }
				}
   				echo"</tr>";
			}
		}
	}
}
$fac_code=$_SESSION['faculty'];
$sub_code=$_SESSION['sub_code'];
$batch_r=$_SESSION['batch_e'];
$ch_query=mysql_query("SELECT elective FROM subject WHERE subject_code='$sub_code'");

while($r_s=mysql_fetch_array($ch_query))
{
	$elec=$r_s['elective'];

	if($elec=="yes")
	{
		$att_tab="att_elective";
	}
	else
	{
		$att_tab="attendance";
	}
}

echo"</table></center>";
$i=0;
for($col=1;$col<=$highestColumnIndex-1;$col++)
{    
				   
	$date_r=$arr_data[1][$col];
	$strt_time=$arr_data[2][$col];
	$slot_r=$arr_data[3][$col];
	for($row=5;$row<= $highestRow;$row++)
	{
		if($arr_data[$row][0]!=NULL && $arr_data[1][$col]!=NULL)
		{
			$gr=$arr_data[$row][0];
			$att=$arr_data[$row][$col];
									
			$sub_query="INSERT INTO $att_tab(faculty_code,subject_code,gr_no,date,slot,start_time,att_hours,type_lec) VALUES('$fac_code','$sub_code','$gr','$date_r','$slot_r','$strt_time','$att','$batch_r')";
			$sub_result=mysql_query($sub_query) or die(mysql_error());		
		}
	}	
	$i++;
	
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

