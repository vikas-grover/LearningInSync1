<html>
<head>
<title>Content</title>
<style type="text/css">
body {
	font-family:verdana,arial,sans-serif;
	margin:30px;
	background-color:#ffffff;
	}
</style>
</head>
<body>
<h1>Edit student information</h1>
 <p>Please select the student to edit, enter the new values in the box and click Udpate Student.</p>
  <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
 
<?php
	$dbc = mysqli_connect('localhost', 'LearningInSync', 'HackedMY1', 'learninginsync')
    or die('Error connecting to MySQL server.');
	$countUpdates = 0;
	$x =0;
	$student_id=array(1);	unset($student_id);
	$update_ccode =array(1);	unset($update_ccode);
	$update_fname =array(1);unset($update_fname);
	$update_lname =array(1);unset($update_lname);
	
	if (isset($_POST['updstudent'])) {
    foreach ($_POST['toupdateFrom'] as $sid)  {
	$student_id[$x] =$sid;//store array of to be updated codes
	$x++;
	}
	$x =0;
	foreach ($_POST['toupdateToFName'] as $name)  {
		if (!$name=="") {
			$update_fname[$x] =$name;
			$x++;
		}//store array of new country names
	}
	$x =0;
	foreach ($_POST['toupdateToLName'] as $name)  {
		if (!$name=="") {
			$update_lname[$x] =$name;
			$x++;
		}//store array of new country names
	}
		$x =0;
	foreach ($_POST['toupdateToCC'] as $ccode)  {
		if (!$ccode=="") {
			$update_ccode[$x] =$ccode;
			$x++;
		}//store array of new country names
	}
	$countUpdates = count($student_id);
	/* if(!$countUpdates==0){
	echo $countUpdates. '<br />';
	echo count($update_country_code). '<br />';
	}
	for($x=0;$x<$countUpdates;$x++)  {
	echo $update_country_name[$x]. '<br />';//store array of new country names
	} */ //for checking the working of update_country_name
	
	for($x=0;$x<$countUpdates;$x++)  {
	$query = "Update student Set first_Name = '$update_fname[$x]', last_Name = '$update_lname[$x]', country_code = '$update_ccode[$x]' WHERE id = '$student_id[$x]'";
     echo $query.'<br />';
	 mysqli_query($dbc, $query)
		or die('Error querying database.');
    } 
    echo $countUpdates.' Student(s) updated.<br />';
	}

	
  // Display all the countries
  $query = "SELECT * FROM student Order by country_code";
  $result = mysqli_query($dbc, $query);
  while ($row = mysqli_fetch_array($result)) {
    echo '<input type="checkbox" value="' . $row['id'] .'" name="toupdateFrom[]" />';
	echo 'Student ID: '. $row['id'];
	echo ' First Name: '. $row['first_name'];
	echo '<input type="text" id="first_name" name="toupdateToFName[]" />';
	echo 'Last Name: '. $row['last_name'];
	echo '<input type="text" id="last_name" name="toupdateToLName[]" />';
	echo 'Country Code: '. $row['country_code'];
	echo '<input type="text" id="country_code" name="toupdateToCC[]" />';
	echo '<br />';
	}// close the while
	mysqli_close($dbc); 
?>
    <input type="submit" name="updstudent" value="Update Student" />
  </form>
</body>
</html>