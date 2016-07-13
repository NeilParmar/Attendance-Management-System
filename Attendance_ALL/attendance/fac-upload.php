<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script language="javascript">

function checkFile()
{
        str=document.getElementById('excel').value.toUpperCase();
        suffix=".XLS";
        suffix2=".XLSX";
        if(!(str.indexOf(suffix, str.length - suffix.length) !== -1||
                       str.indexOf(suffix2, str.length - suffix2.length) !== -1)){
        alert('File type not allowed,\nAllowed file: *.xls,*.xlsx');
            document.getElementById('excel').value='';
        }
    }
</script>
<title>Faculty-Upload</title>
</head>

<body>
<center>
<form action="fac-upload.php" method="post" name="form1" enctype="multipart/form-data">
<input type="file" name="excel" id="excel" onchange="checkFile()" />
<input type="submit" name="submit" value="Submit"/>
<br /><br />
<a href="Format/TeacherFormat.xlsx">Download the Format File</a>
</form>
</center>
</body>
</html>

<?php
if(isset($_POST['submit']))
{
	//$excel=$_POST['excel'];		
	if(isset($_FILES['excel']))
	{$count=0;
  if ($_FILES['excel']['error'] > 0)
    {
    echo "Return Code: " . $_FILES['excel']['error'] . "<br />";
    }	
  else
    {
 // echo "Upload: " . $_FILES['excel']['name'] . "<br />";
 // echo "Type: " . $_FILES['excel']['type'] . "<br />";
 // echo "Size: " . ($_FILES['excel']['size'] / 1024) . " Kb<br />";
 // echo "Temp file: " . $_FILES['excel']['tmp_name'] . "<br />";
	 $count++;
   if (file_exists("dir/" . $_FILES['excel']['name']))
      {
		  //echo $_FILES['excel']['name']." this file already exists";
		  $file=$_FILES['excel']['name'];
		  echo "<script>alert('$file ' + ' already exists')</script>";
      }
    else
      {
    move_uploaded_file($_FILES['excel']['tmp_name'], "dir/" . $_FILES['excel']['name']);
    //  echo "Stored in: " . "dir/" . $_FILES['excel']['name'];
	  session_start();
	  $_SESSION['excel']=$_FILES['excel']['name'];
	  //echo"sess : ".$_SESSION['excel'];
	 echo"<script>document.location.href = \"fac-display.php\";</script>";

	  }
	}
}
	else
	{
		echo "<br/>there is nothing in _files";
	}	
}
?>