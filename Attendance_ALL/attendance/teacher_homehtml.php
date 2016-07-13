<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php

session_start();

if(!isset($_SESSION['loggedin']))
{

header("location:indexhtml.php");

}

?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Attendance Management</title>
</head>

<body>
<table align="center">
<tr>
<td width="200" align="center">
<a href="give_atthtml.php" target="_top"><img src="image_home/create_attendane.jpg" width="100" height="100" /></a>
<p>Give Attendance</p>
</td>

<td width="200" align="center">
<a href="view_atthtml.php" target="_top"><img src="image_home/attendance_view.gif" width="100" height="100"/></a>
<p>View Attendance Records</p>
</td>

<td width="200" align="center">
<a href="excel_view.php" target="_top"><img src="image_home/excel-view.jpg" width="100" height="100"/></a>
<p>Daily  Attendance records</p>
</td>
<td width="200" align="center">
<a href="excel_attendhtml.php" target="_top"><img src="image_home/excel_img.png" width="100" height="100"/></a>
<p>Excel Upload</p>
</td>

</tr>

</table>



</body>
</html>
