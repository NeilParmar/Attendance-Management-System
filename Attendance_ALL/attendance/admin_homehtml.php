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
<title>Untitled Document</title>	

</head>

<body>
<table align="center">

<tr>
<td>

</td>
<td width="200" align="center">
<a href="view_att_adminhtml.php" target="_top"><img src="image_home/attendance_view.gif" width="100" height="100"/></a>
<p>View Attendance Records</p>
</td>
<td width="200" align="center">
<a href="att_modifyhtml.php" target="_top"><img src="image_home/modify_attendance.png" width="100" height="100"/></a>
<p>Modify Attendance Records</p>
</td>
<td width="200" align="center">
<a href="delete_atthtml.php" target="_top"><img src="image_home/attendance_delete.jpg" width="100" height="100"/></a>
<p>Delete Attendance Records</p>
</td>
</tr>

<tr>
<td width="200" align="center">
<a href="faculty_feedhtml.php" target="_top"><img src="image_home/faculty_entry.jpg" width="100" height="100"/></a>
<p>Faculty Entry</p>
</td>
<td width="200" align="center">
<a href="fac-uploadhtml.php" target="_top"><img src="image_home/multiple.teacher.jpg" width="100" height="100"/></a>
<p>Faculty multiple </br> Entry</p>
</td>
<td align="center">
<a href="faculty_displayhtml.php" target="_top"><img src="image_home/faculty_display.jpg" width="100" height="100"/></a>
<p>Faculty Display</p>
</td>
<td width="200" align="center">
<a href="delete_fachtml.php" target="_top"><img src="image_home/delete_fac.png" width="100" height="100"/></a>
<p>Faculty Delete</p>
</td>
</tr>

<tr>
<td align="center">
<a href="student_feedhtml.php" target="_top"><img src="image_home/students_entry.gif" width="100" height="100"/></a>
<p>Student Entry</p>
</td>
<td align="center">
<a href="upload_excelhtml.php" target="_top"><img src="image_home/multiplestudent.jpg" width="100" height="100"/></a>
<p>Multiple Student </br> Entry</p>
</td>
<td align="center">
<a href="student_displayhtml.php" target="_top"><img src="image_home/student_display.jpg" width="100" height="100"/></a>
<p>Student Display</p>
</td>
<td width="200" align="center">
<a href="promotehtml.php" target="_top"><img src="image_home/student_promotion.jpg" width="100" height="100"/></a>
<p>Students Promotion</p>
</td>
</tr>

<tr>
<td width="200" align="center">
<a href="student_deletehtml.php" target="_top"><img src="image_home/studentdelete.jpg" width="100" height="100"/></a>
<p>Students Delete</p>
</td>
<td align="center">
<a href="electivehtml.php" target="_top"><img src="image_home/elective.jpg" width="100" height="100"/></a>
<p>Elective subject</br>student entry </p>
</td>
<td align="center">
<a href="elec_displayhtml.php" target="_top"><img src="image_home/elective_display.png" width="100" height="100"/></a>
<p>Elective subject</br>students Display</p>
</td>
<td align="center">
<a href="elective_delhtml.php" target="_top"><img src="image_home/electivedelete.png" width="100" height="100"/></a>
<p>Elective subject</br>students Delete</p>
</td>
</tr>

<tr>
<td align="center">
<a href="subjecthtml.php" target="_top"><img src="image_home/subject_entry.jpg" width="100" height="100"/></a>
<p>Subject Entry</p>
<td align="center">
<a href="sub-uploadhtml.php" target="_top"><img src="image_home/multisubentry.gif" width="100" height="100" /></a>
<p>Subjects Multiple</br>Entry</p>
</td>
<td align="center">
<a href="subject_displayhtml.php" target="_top"><img src="image_home/subjectdisplay.jpg" width="100" height="100" /></a>
<p>Subjects Display</p>
</td>
<td align="center">
<a href="subject_deletehtml.php" target="_top"><img src="image_home/deletesub.jpg" width="100" height="100" /></a>
<p>Subjects Delete</p>
</td>

<tr>
<td align="center">
<a href="allocatehtml.php" target="_top"><img src="image_home/dispallsub.jpg" width="100" height="100" /></a>
<p>Allocation of Subjects</p>
</td>
<td align="center">
<a href="subject_all_displayhtml.php" target="_top"><img src="image_home/subject_allocation.png" width="100" height="100" /></a>
<p>Display Allocated </br> Subjects</p>
</td>
<td align="center">
<a href="subject_all_delhtml.php" target="_top"><img src="image_home/suballdel.jpg" width="100" height="100" /></a>
<p>Delete Allocated </br> Subjects</p>
</td>
<td width="200" align="center">
<a href="practicalhtml.php" target="_top"><img src="image_home/practicals.jpg" width="100" height="100"/></a>
<p>Practicals</p>
</td>
</tr>

</table>
</body>
</html>
