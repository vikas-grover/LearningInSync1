<?php session_start(); ?>

<html>
<head>
<title>HTML Frames Example - Top Nav</title>
<link rel="stylesheet" type="text/css" href="../CSS/Button2.css">
<link rel="stylesheet" type="text/css" href="../CSS/Body.css">
<SCRIPT language="JavaScript">
<!--hide
function changemenu(TableNameSelected)
{
switch(TableNameSelected)
{
case 'Student':
	parent.menu.location="../SideMenu/Student.html";
	parent.content.location="../Content/Student/stat.php";
	break;
case 'Teacher':
 	parent.menu.location="../SideMenu/Teacher.html";
	parent.content.location="../Content/Teacher/Main.html";
  break;
case 'Country':
 	parent.menu.location="../SideMenu/Country.html";
	parent.content.location="../Content/Country/stat.php";
  break;
case 'Region':
 	parent.menu.location="../SideMenu/Region.html";
	parent.content.location="../Content/Region/stat.php";
  break;  
  case 'City':
 	parent.menu.location="../SideMenu/City.html";
	parent.content.location="../Content/City/stat.php";
  break;  
    case 'School':
 	parent.menu.location="../SideMenu/School.html";
	parent.content.location="../Content/School/stat.php";
  break; 
    case 'Subject':
 	parent.menu.location="../SideMenu/Subject.html";
	parent.content.location="../Content/Subject/stat.php";
  break;
    case 'Enrollment':
 	parent.menu.location="../SideMenu/Enrollment.html";
	parent.content.location="../Content/Enrollment/stat.php";
  break;   
    case 'Grade':
 	parent.menu.location="../SideMenu/Grade.html";
	parent.content.location="../Content/Grade/stat.php";
  break;   
    case 'Term':
 	parent.menu.location="../SideMenu/Term.html";
	parent.content.location="../Content/Term/stat.php";
  break;   
    case 'Report':
 	parent.menu.location="../SideMenu/Report.html";
	parent.content.location="../Content/Report/stat.php";
  break;   
    case 'Content':
 	parent.menu.location="../SideMenu/Content.html";
	parent.content.location="../Content/Content/stat.php";
  break;   
     case 'User':
 	parent.menu.location="../SideMenu/User.html";
	parent.content.location="../Content/Content/stat.php";
  break; 
    case 'LogOff':
	parent.location = "../index.html";
 	//parent.menu.location="../SideMenu/User.html";
	//parent.content.location="../Content/Content/stat.php";
  break; 
  default:
}
}

//-->
</SCRIPT>
</head>

<body>
<h3>Welcome to PHP MySQL, <?php echo $_SESSION['authenticated']; ?></h3>
<p><a href="javascript:changemenu('Student')" target="menu">Students</a> <a href="javascript:changemenu('Teacher')" target="menu">Teachers</a>
 <a href="javascript:changemenu('Country')" target="menu">Countries</a> <a href="javascript:changemenu('City')" target="menu">Cities</a> <a href="javascript:changemenu('Region')" target="menu">Regions</a>
 <a href="javascript:changemenu('School')" target="menu">Schools</a> <a href="javascript:changemenu('Subject')" target="menu">Subjects</a> <a href="javascript:changemenu('Enrollment')" target="menu">Enrollments</a> <a href="javascript:changemenu('Grade')" target="menu">Grades</a> <a href="javascript:changemenu('Term')" target="menu">Terms</a> <a href="javascript:changemenu('Report')" target="menu">Reports</a> <a href="javascript:changemenu('Content')" target="menu">Contents</a> <a href="javascript:changemenu('User')" target="menu">Manage Users</a> <a href="javascript:changemenu('LogOff')" target="menu">Log Out</a></p>
</body>
</html>