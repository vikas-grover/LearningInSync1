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
<h1>Edit school information</h1>
 <p>Please select the school to edit, enter the new values in the box and click Udpate School.</p>
  <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
 
<?php
	$dbc = mysqli_connect('localhost', 'LearningInSync', 'HackedMY1', 'learninginsync')
    or die('Error connecting to MySQL server.');
	$countUpdates = 0;
	$x =0;
	$school_id=array(1);	unset($school_id);
	$update_school_name =array(1);unset($update_school_name);
	
	if (isset($_POST['updschool'])) {
    foreach ($_POST['toupdateFrom'] as $sid)  {
	$school_id[$x] =$sid;//store array of to be updated codes
	$x++;
	}
	$x =0;
	foreach ($_POST['toupdateToSName'] as $school_name)  {
		if (!$school_name=="") {
			$update_school_name[$x] =$school_name;
			$x++;
		}//store array of new country names
	}
	$x =0;
	$countUpdates = count($school_id);
	
	for($x=0;$x<$countUpdates;$x++)  {
	$query = "Update school Set school_name = '$update_school_name[$x]' WHERE id = '$school_id[$x]'";
     echo $query.'<br />';
	 mysqli_query($dbc, $query)
		or die('Error querying database.');
    } 
    echo $countUpdates.' School(s) updated.<br />';
	}	
  // Display all the countries
  $query = "SELECT * FROM school Order by school_name";
  $result = mysqli_query($dbc, $query);
  while ($row = mysqli_fetch_array($result)) {
    echo '<input type="checkbox" value="' . $row['id'] .'" name="toupdateFrom[]" />';
	echo 'School Name: '. $row['school_name'];
	echo '<input type="text" id="first_name" name="toupdateToSName[]" />';
	echo ' City Name: '. $row['city_name'];
	echo '<br />';
	}// close the while
	mysqli_close($dbc); 
?>
    <input type="submit" name="updschool" value="Update School" />
  </form>
</body>
</html>