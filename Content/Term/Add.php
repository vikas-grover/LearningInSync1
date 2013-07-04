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
<h1>Add Term</h1>
<p></p>
 
<?php
	if (isset($_POST['addterm'])) {
    $term_id = $_POST['term_id']; //take posted student name
    $term_name = $_POST['term_name']; // take posted country code
    $output_form = 'no'; // if posted, then dont show add country again.
	
	if (empty($term_id)||empty($term_name)) {
      // We know at least one of the input fields is blank 
      echo 'Please fill out all of the information.<br />';
      $output_form = 'yes';
    }
  }
  else {
    $output_form = 'yes'; // if not posted
  }
  
  if (!empty($term_id) && !empty($term_name)) {
  $dbc = mysqli_connect('localhost', 'LearningInSync', 'HackedMY1', 'learninginsync')
    or die('Error connecting to MySQL server.');

  // If all values were properly input, insert new country
  $query = "INSERT INTO term (id, term_name) VALUES ('$term_id', '$term_name')";
	mysqli_query($dbc, $query)
      or die ('Data not inserted.'); //on error display message
    
	echo 'Term added successfully';
  
  //while ($row = mysqli_fetch_array($result)) {
    
	//echo  $row['id'] .' '. $row['term_name'];
	
	//echo '<input type="checkbox" value="' . $row['Country_code'] .'" name="todelete[]" />';
	//echo $row['Country_name'];
	//echo '<br />';
	mysqli_close($dbc); 
 } // close the if (!empty($country_name) && !empty($country_code)) 
 
  if ($output_form == 'yes') {
?>

 <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <label for="term_id">Enter Term:</label>
    <input type="text" id="term_id" name="term_id" /><br />
    <label for="term_name">Enter Term Name:</label>
    <input type="text" id="term_name" name="term_name" /><br />
    <input type="submit" name="addterm" value="Add Term" />
  </form>
  
  <?php
  }
?>
</body>
</html>