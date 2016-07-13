<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" dir="ltr" lang="en-US"><head>
<?php

session_start();

if(!isset($_SESSION['loggedin']))
{

header("location:indexhtml.php");

}

?>
<!-- Created by Artisteer v3.0.0.33215 Base template (without user's data) checked by http://validator.w3.org : "This page is valid XHTML 1.0 Transitional" -->
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /><title>Attendance Management</title>

<link rel="stylesheet" href="style.css" type="text/css" media="screen" />
<!--[if IE 6]><link rel="stylesheet" href="style.ie6.css" type="text/css" media="screen" /><![endif]--><!--[if IE 7]><link rel="stylesheet" href="style.ie7.css" type="text/css" media="screen" /><![endif]-->
<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript" src="script.js"></script>
</head>
<body>
<div id="art-page-background-glare">
<div id="art-page-background-glare-image">
<div id="art-main">
<div class="art-sheet">
<div class="art-sheet-tl"></div>
<div class="art-sheet-tr"></div>
<div class="art-sheet-bl"></div>
<div class="art-sheet-br"></div>
<div class="art-sheet-tc"></div>
<div class="art-sheet-bc"></div>
<div class="art-sheet-cl"></div>
<div class="art-sheet-cr"></div>
<div class="art-sheet-cc"></div>
<div class="art-sheet-body">
<div class="art-header">
<div class="art-header-center">
<div class="art-header-jpeg"></div>
</div>
<div class="art-logo">
<h1 id="name-text" class="art-logo-name"><a href="#">Attendance Management System</a></h1>
</div>
</div>
<div class="art-nav">
<div class="l"></div>
<div class="r"></div>
<ul class="art-menu">
<li> <a href="admin_home_temphtml.php" ><span class="l"></span><span class="r"></span><span class="t">Home</span></a> </li>
<li>
<a href="#"><span class="l"></span><span class="r"></span><span class="t">Faculty</span></a>
<ul>
<li><a href="faculty_feedhtml.php">Faculty Entry</a></li>
<li><a href="fac-uploadhtml.php">Faculty Multiple Entry</a></li>
<li><a href="faculty_displayhtml.php">Display Faculty</a></li>
<li><a href="delete_fachtml.php" >Delete Entry</a></li>
</ul>
</li>
<li>
<a href="#"><span class="l"></span><span class="r"></span><span class="t">Attendance Records</span></a>
<ul>
<li><a href="view_att_adminhtml.php" >View Attendance Records</a></li>
<li><a href="att_modifyhtml.php">Modify Attendance Records</a></li>
<li><a href="delete_atthtml.php" >Delete Attendance Records</a></li>
</ul>
</li>
<li>
<a href="#"><span class="l"></span><span class="r"></span><span class="t">Students</span></a>
<ul>
<li><a href="student_feedhtml.php" class="active">Student Entry</a></li>
<li><a href="upload_excelhtml.php">Student Multiple Entry</a></li>
<li><a href="student_displayhtml.php" >Student Display</a></li>
<li><a href="promotehtml.php">Student Promotion</a></li>
<li><a href="student_deletehtml.php" >Student Delete</a></li>

</ul>
</li>
<li>
<a href="#"><span class="l"></span><span class="r"></span><span class="t">Subjects</span></a>
<ul>
<li><a href="subjecthtml.php" >Subject Entry</a></li>
<li><a href="sub-uploadhtml.php">Subject Multiple Entry</a></li>
<li><a href="subject_displayhtml.php" >Subject display</a></li>
<li><a href="allocatehtml.php" >Subject Allocation</a></li>
<li><a href="subject_all_displayhtml.php" >Subject Allocation display</a></li>
<li><a href="subject_all_delhtml.php" >Subject allocation delete</a></li>
<li><a href="subject_deletehtml.php" >Subject delete </a></li>
</ul>
</li>
<li>
<a href="#"><span class="l"></span><span class="r"></span><span class="t">Elective</span></a>
<ul>
<li><a href="electivehtml.php" >Elective entry</a></li>
<li><a href="elec_displayhtml.php" >Elective display</a></li>
<li><a href="elective_delhtml.php" >Elective delete</a></li>
</li>
</ul>
<li> <a href="practicalhtml.php"><span class="l"></span><span class="r"></span><span class="t">Practical</span></a>
</li>
</ul></div>
<div class="art-content-layout">
<div class="art-content-layout-row">
<div class="art-layout-cell art-content">
<div class="art-post">
<div class="art-post-body">
<div class="art-post-inner art-article">
<p align="right"><a href="indexhtml.php"><img src="image_home/Logout_Button.gif" alt="logout"></img></a><a href="change_passhtml.php"><img src="image_home/change.gif" alt="change_passwaord" /></a></img>
</p>
<h2 class="art-postheader">Student Display</h2>
<iframe src="student_disp.php" align="middle" frameborder="0" height="850" width="850"></iframe>
<div class="art-postcontent"><span class="art-button-wrapper"><a class="art-button" href="javascript:void(0)">
  </a> </span>
  <div class="art-content-layout overview-table">
<div class="art-content-layout-row"><br />
<div class="art-layout-cell"> </div>
<br />
</div>
<br />
</div>
<br />
</div>
<div class="cleared"></div>
</div>
<div class="cleared"></div>
</div>
</div>
<div class="art-post">
<div class="art-post-body">
<div class="art-post-inner art-article">
<div class="art-postcontent"><br />
<br />
<p> <span class="art-button-wrapper"> <span class="art-button-r"></span><br />
</span> </p>
</div>
<div class="cleared"></div>
</div>
<div class="cleared"></div>
</div>
</div>
</div>
</div>
</div>
<div class="cleared"></div>
</div>
</div>
<div class="cleared"></div>
</div>
</div>
</div>
</body></html>