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
<h1>Add subject</h1>
<p></p>
 
<?php
	if (isset($_POST['addsubject'])) {
    $subject_name = $_POST['subject_name']; //take posted subject name
    $subject_code = $_POST['subject_code']; // take posted subject code
    $output_form = 'no'; // if posted, then dont show add country again.
	
	if (empty($subject_name) || empty($subject_code)) {
      // We know at least one of the input fields is blank 
      echo 'Please fill out all of the email information.<br />';
      $output_form = 'yes';
    }
  }
  else {
    $output_form = 'yes'; // if not posted
  }
  
  if (!empty($subject_name) && !empty($subject_code)) {
  $dbc = mysqli_connect('localhost', 'LearningInSync', 'HackedMY1', 'learninginsync')
    or die('Error connecting to MySQL server.');

  // If all values were properly input, insert new subject
  $query = "INSERT INTO subject (subject_name, subject_code) VALUES ('$subject_name', '$subject_code')";
	mysqli_query($dbc, $query)
      or die ('Data not inserted.'); //on error display message
    
	echo 'Subject added successfully';
  
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
    <label for="subject_name">Enter subject name:</label>
    <input type="text" id="subject_name" name="subject_name" /><br />
    <label for="subject_code">Enter subject Code:</label>
    <input type="text" id="subject_code" name="subject_code" /><br />
    <input type="submit" name="addsubject" value="Add subject" />
  </form>
  
  <?php
  }
?>
</body>
</html>