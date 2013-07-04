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
<h1>Add School</h1>
<p></p>
 
<?php
	if (isset($_POST['addschool'])) {
    $city_name = $_POST['city_name']; //take posted student name
    $school_name = $_POST['school_name']; // take posted country code
    $output_form = 'no'; // if posted, then dont show add country again.
	
	if (empty($city_name)||empty($school_name)) {
      // We know at least one of the input fields is blank 
      echo 'Please fill out all of the information.<br />';
      $output_form = 'yes';
    }
  }
  else {
    $output_form = 'yes'; // if not posted
  }
  
  if (!empty($city_name) && !empty($school_name)) {
  $dbc = mysqli_connect('localhost', 'LearningInSync', 'HackedMY1', 'learninginsync')
    or die('Error connecting to MySQL server.');

  // If all values were properly input, insert new country
  $query = "INSERT INTO school (city_name, school_name) VALUES ('$city_name', '$school_name')";
	mysqli_query($dbc, $query)
      or die ('Data not inserted.'); //on error display message
    
	echo 'School added successfully';
  
  //while ($row = mysqli_fetch_array($result)) {
    
	//echo  $row['Country_code'] .' '. $row['Country_name'];
	
	//echo '<input type="checkbox" value="' . $row['Country_code'] .'" name="todelete[]" />';
	//echo $row['Country_name'];
	//echo '<br />';
	mysqli_close($dbc); 
 } // close the if (!empty($country_name) && !empty($country_code)) 
 
  if ($output_form == 'yes') {
?>

 <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <label for="school_name">Enter school name:</label>
    <input type="text" id="school_name" name="school_name" /><br />
	<label for="city_name">Enter city name:</label>
    <input type="text" id="city_name" name="city_name" /><br />
    <input type="submit" name="addschool" value="Add School" />
  </form>
  
  <?php
  }
?>
</body>
</html>