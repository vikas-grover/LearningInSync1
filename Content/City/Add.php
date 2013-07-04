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
<h1>Add City</h1>
<p></p>
 
<?php
	if (isset($_POST['addcity'])) {
    $city_name = $_POST['city_name']; //take posted student name
    $country_code = $_POST['country_code']; // take posted country code
    $output_form = 'no'; // if posted, then dont show add country again.
	
	if (empty($city_name)||empty($country_code)) {
      // We know at least one of the input fields is blank 
      echo 'Please fill out all of the information.<br />';
      $output_form = 'yes';
    }
  }
  else {
    $output_form = 'yes'; // if not posted
  }
  
  if (!empty($city_name) && !empty($country_code)) {
  $dbc = mysqli_connect('localhost', 'LearningInSync', 'HackedMY1', 'learninginsync')
    or die('Error connecting to MySQL server.');

  // If all values were properly input, insert new country
  $query = "INSERT INTO city (city_name, country_code) VALUES ('$city_name', '$country_code')";
	mysqli_query($dbc, $query)
      or die ('Data not inserted.'); //on error display message
    
	echo 'City added successfully';
  
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
    <label for="city_name">Enter city name:</label>
    <input type="text" id="city_name" name="city_name" /><br />
    <label for="country_code">Enter country Code:</label>
    <input type="text" id="country_code" name="country_code" /><br />
    <input type="submit" name="addcity" value="Add City" />
  </form>
  
  <?php
  }
?>
</body>
</html>