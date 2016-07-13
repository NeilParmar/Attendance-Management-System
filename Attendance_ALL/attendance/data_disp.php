<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
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
  		echo "<tr>";
   		for ($col = 0; $col < $highestColumnIndex; $col++) 
		{  
			/*if($col=="7" && $row!="1")
			{
				$temp=($arr_data[$row][$col]-25568)*60*60*24;
				$arr_data[$row][$col]=date('Y-m-d',$temp);
				echo "<td>".$arr_data[$row][$col]."</td>"; 
			}
			else if($col=="8" && $row!="1")
			{
				$temp=($arr_data[$row][$col]-25568)*60*60*24;
				$arr_data[$row][$col]=date('Y-m-d',$temp);
				echo "<td>".$arr_data[$row][$col]."</td>"; 
			}
			else
			{*/
				echo "<td>".$arr_data[$row][$col]."</td>"; 
			//}
		}
   		echo"</tr>";
	}
}


echo"</table></center>";


for($row=2;$row<= $highestRow;$row++)
{
	if($arr_data[$row][0]!=NULL)
	{
		
		$temp0=$arr_data[$row][0]; //gr_no
		$splitdata=explode(' ',strtolower($arr_data[$row][3]));
		$temp1=ucwords($splitdata[1]); //first name
		if($splitdata[2]==NULL)
		{
			$temp3=ucwords($splitdata[0]);//last name
		}
		else
		{
			$temp3=ucwords($splitdata[0]);  //last_name
			$temp2=ucwords($splitdata[2]);  //middle name
		}
		$temp9=strtolower($arr_data[$row][6]); //degree
		$temp10=strtolower($arr_data[$row][7]); //stream
		$temp19=$arr_data[$row][8]; //batch
		
		$temp15=$arr_data[$row][1]; //roll no
		$temp16=strtolower($arr_data[$row][2]); //div
		$temp17=$arr_data[$row][4];  //year of admin
		$temp18=$arr_data[$row][5]; //trim
		
	
 $sub_query="INSERT INTO students(gr_no,first_name,middle_name,last_name,year_of_admission,deg_name,stream) VALUES('$temp0','$temp1','$temp2','$temp3','$temp17','$temp9','$temp10')";
			$sub_result=mysql_query($sub_query) or die(mysql_error());
			$temp1=" ";
			$temp2=" ";
			$temp3=" ";
			
			
			if(strtoupper($temp10)=="IT")
			{
				$table_name="information_technology";
			}
			else if(strtoupper($temp10)=="EXTC")
			{
				$table_name="extc";
			}
			else if(strtoupper($temp10)=="CS")
			{
				$table_name="computer_science";
			}
			else if(strtoupper($temp10)=="CIVIL")
			{
				$table_name="civil";
			}
			else if(strtoupper($temp10)=="ELEX")
			{
				$table_name="electronics";
			}
			else if(strtoupper($temp10)=="MECH")
			{
				$table_name="mechanical";
			}
			
$query2="INSERT INTO $table_name(gr_no,roll_no,trim,year,division,batch) VALUES('$temp0','$temp15','$temp18','$temp17','$temp16','$temp19')";
	$result2=mysql_query($query2) or die(mysql_error());
	
	}
}
if($result2!=true && $sub_result!=true)
{
	unlink($inputFileName);

	echo "<script>alert('Error!!')</script>";
	return false;
}
else
{
	echo "<script>alert('Sucessful Update!')</script>";
	return true;
}


?>

</body>
</html>

