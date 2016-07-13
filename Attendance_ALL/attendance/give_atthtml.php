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
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /><title>Faculty</title>

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
<li> <a href="teacher_home_temphtml.php"><span class="l"></span><span class="r"></span><span class="t">Home</span></a> </li>
<li> <a href="give_atthtml.php" class="active"><span class="l"></span><span class="r"></span><span class="t">Give Attendance</span></a> </li>
<li> <a href="view_atthtml.php"><span class="l"></span><span class="r"></span><span class="t">View Attendance Records</span></a> </li>
<li> <a href="excel_view.php"><span class="l"></span><span class="r"></span><span class="t">Daily Attendance</span></a> </li>
<li> <a href="excel_attendhtml.php"><span class="l"></span><span class="r"></span><span class="t">Excel Upload</span></a> </li>

</ul>
</div>
<div class="art-content-layout">
<div class="art-content-layout-row">
<div class="art-layout-cell art-content">
<div class="art-post">
<div class="art-post-body">
<div class="art-post-inner art-article">
<p align="right"><a href="indexhtml.php"><img src="image_home/Logout_Button.gif" alt="logout"></img></a><a href="change_passhtml.php"><img src="image_home/change.gif" alt="change_password" /></a></img>
</p><h2 class="art-postheader">Give Attendance</h2>
<center><iframe src="teacher_interface.php" align="middle" frameborder="0" height="850" width="850"></iframe></center>
<div class="art-postcontent"><span class="art-button-wrapper"><a class="art-button" href="javascript:void(0)"><br />
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