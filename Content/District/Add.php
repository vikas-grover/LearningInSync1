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
<h1>Add District</h1>
<p></p>
 
<?php
	if (isset($_POST['addDistrict'])) {
    $District_name = $_POST['District_name']; //take posted student name
    $country_code = $_POST['country_code']; // take posted country code
    $output_form = 'no'; // if posted, then dont show add country again.
	
	if (empty($District_name)||empty($country_code)) {
      // We know at least one of the input fields is blank 
      echo 'Please fill out all of the information.<br />';
      $output_form = 'yes';
    }
  }
  else {
    $output_form = 'yes'; // if not posted
  }
  
  if (!empty($District_name) && !empty($country_code)) {
  $dbc = mysqli_connect('localhost', 'LearningInSync', 'HackedMY1', 'learninginsync')
    or die('Error connecting to MySQL server.');

  // If all values were properly input, insert new country
  $query = "INSERT INTO District (District_name, country_code) VALUES ('$District_name', '$country_code')";
	mysqli_query($dbc, $query)
      or die ('Data not inserted.'); //on error display message
    
	echo 'District added successfully';
  
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
    <label for="District_name">Enter District name:</label>
    <input type="text" id="District_name" name="District_name" /><br />
    <label for="country_code">Enter country Code:</label>
    <input type="text" id="country_code" name="country_code" /><br />
    <input type="submit" name="addDistrict" value="Add District" />
  </form>
  
  <?php
  }
?>
</body>
</html>