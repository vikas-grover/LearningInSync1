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
<h1>Delete a city</h1>
 <p>Please select the school to delete from list and click Remove School.</p>
  <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
 
<?php
	if (!isset($_POST['remschool'])&& empty($_POST['remschool'])) {	//if posted from findcity.html
	$city_name = $_POST['city_name'];
	}
	else{
	$city_name = $_POST['thiscity_name']; //if posted from within
	}
	$dbc = mysqli_connect('localhost', 'LearningInSync', 'HackedMY1', 'learninginsync')
    or die('Error connecting to MySQL server.');
  
	if (isset($_POST['remschool'])) { //if posted from within
    foreach ($_POST['todelete'] as $delete_school) { // delete the posted todelete
      $query = "DELETE FROM school WHERE school_name = '$delete_school'";
      mysqli_query($dbc, $query)
        or die('Error querying database.');
    } 
    echo 'School(s) removed.<br />';
  }
	//echo $country_code.'<br />';
  $query = "SELECT * FROM school WHERE city_name = '$city_name' order by school_name";// if posted from within, gets value from thiscity_name
  //echo $query.'<br />';
  $result = mysqli_query($dbc, $query);
  while ($row = mysqli_fetch_array($result)) {
    echo '<input type="checkbox" value="' . $row['school_name'] .'" name="todelete[]" />';
	echo 'School Name: '. $row['school_name'] .', City: '. $row['city_name'];
	echo '<br />';
	$thiscity_name = $row['city_name'];
	}	// close the while
	mysqli_close($dbc); 
?>
	<input type="hidden" name="thiscity_name" value="<?php echo $thiscity_name; ?>" />
    <input type="submit" name="remschool" value="Remove School" />
  </form>
</body>
</html>