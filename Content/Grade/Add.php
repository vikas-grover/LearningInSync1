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
<h1>Add Grade</h1>
<p></p>
 
<?php
	if (isset($_POST['addgrade'])) {
    $grade_id = $_POST['grade_id']; //take posted student name
    $grade_name = $_POST['grade_name']; // take posted country code
    $output_form = 'no'; // if posted, then dont show add country again.
	
	if (empty($grade_id)||empty($grade_name)) {
      // We know at least one of the input fields is blank 
      echo 'Please fill out all of the information.<br />';
      $output_form = 'yes';
    }
  }
  else {
    $output_form = 'yes'; // if not posted
  }
  
  if (!empty($grade_id) && !empty($grade_name)) {
  $dbc = mysqli_connect('localhost', 'LearningInSync', 'HackedMY1', 'learninginsync')
    or die('Error connecting to MySQL server.');

  // If all values were properly input, insert new country
  $query = "INSERT INTO grade (id, name) VALUES ('$grade_id', '$grade_name')";
	mysqli_query($dbc, $query)
      or die ('Data not inserted.'); //on error display message
    
	echo 'Grade added successfully';
  
  
	mysqli_close($dbc); 
  
 }
  if ($output_form == 'yes') {
?>

 <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <label for="grade_id">Enter Grade ID:</label>
    <input type="text" id="grade_id" name="grade_id" /><br />
    <label for="grade_name">Enter Grade Name:</label>
    <input type="text" id="grade_name" name="grade_name" /><br />
    <input type="submit" name="addgrade" value="Add Grade" />
  </form>
  
  <?php
  }
?>
</body>
</html>