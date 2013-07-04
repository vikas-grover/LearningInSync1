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
<h1>Edit a subject information</h1>
 <p>Please select the subject to edit, enter the new name in the box and click Udpate subject.</p>
  <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
 
<?php
	$dbc = mysqli_connect('localhost', 'LearningInSync', 'HackedMY1', 'learninginsync')
    or die('Error connecting to MySQL server.');
	$countUpdates = 0;
	$x =0;
	$update_subject_code =array(1);	unset($update_subject_code);
	$update_subject_name =array(1);unset($update_subject_name);
	
	if (isset($_POST['updsubject'])) {
    foreach ($_POST['toupdateFrom'] as $update_code)  {
	$update_subject_code[$x] =$update_code;//store array of to be updated codes
	$x++;
	}
	$x =0;
	foreach ($_POST['toupdateTo'] as $update_name)  {
		if (!$update_name=="") {
			$update_subject_name[$x] =$update_name;
			$x++;
		}//store array of new country names
	}
	
	$countUpdates = count($update_subject_name);
	
	
	for($x=0;$x<$countUpdates;$x++)  {
	$query = "Update subject Set subject_Name = '$update_subject_name[$x]' WHERE subject_code = '$update_subject_code[$x]'";
     echo $query.'<br />';
	 mysqli_query($dbc, $query)
		or die('Error querying database.');
    } 
    echo $countUpdates.' Subject(s) updated.<br />';
	}

	
  // Display all the countries
  $query = "SELECT * FROM subject Order by subject_name";
  $result = mysqli_query($dbc, $query);
  while ($row = mysqli_fetch_array($result)) {
    echo '<input type="checkbox" value="' . $row['subject_code'] .'" name="toupdateFrom[]" />';
	echo 'subject Code: '. $row['subject_code'] .', subject Name: '. $row['subject_name'];
	echo '<input type="text" id="subject_name" name="toupdateTo[]" />';
	echo '<br />';
	}// close the while
	mysqli_close($dbc); 
?>
    <input type="submit" name="updsubject" value="Update subject" />
  </form>
</body>
</html>