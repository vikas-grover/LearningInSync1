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
<h1>Add an Enrollment</h1>
<p></p>
 
<?php
	if (isset($_POST['addenrollment'])) {
	 $score =0;
    $student_id = $_POST['sid']; //take posted student name
	$term_id = $_POST['tid']; //take posted student name
    $subject_id = $_POST['subid']; //take posted student name
    $grade_id = $_POST['gid']; //take posted student name
    $school_id = $_POST['scid']; //take posted student name
    $score = $_POST['score']; //take posted student name
    $output_form = 'no'; // if posted, then dont show add country again.

	if (empty($student_id)||empty($term_id)||empty($subject_id)||empty($grade_id)||empty($school_id)) {
	
      // We know at least one of the input fields is blank 
      echo 'Please fill out all of the information';
	  if (empty($student_id)) echo ' student'.'<br />';
	  if (empty($term_id)) echo 'term'.'<br />';
	  if (empty($subject_id)) echo 'subject'.'<br />';
	  if (empty($grade_id)) echo 'grade_id'.'<br />';
	  if (empty($school_id)) echo 'school_id'.'<br />';
	  if (empty($score)) echo 'score'.'<br />';
	  
      $output_form = 'yes';
    }
  }
  else {
    $output_form = 'yes'; // if not posted
  }
  
  if (!empty($student_id)&& !empty($term_id)&& !empty($subject_id)&& !empty($grade_id)&& !empty($school_id)) {
  $dbc = mysqli_connect('localhost', 'LearningInSync', 'HackedMY1', 'learninginsync')
    or die('Error connecting to MySQL server.');

  // If all values were properly input, insert new country
  $query = "INSERT INTO enrollment (sid, tid,subid,gid,scid,score) VALUES ('$student_id', '$term_id', '$subject_id', '$grade_id', '$school_id', '$score')";
	mysqli_query($dbc, $query)
      or die ('Data not inserted.'); //on error display message
    
	echo 'Enrollment added successfully';
  	mysqli_close($dbc); 
 } // close the if (!empty($country_name) && !empty($country_code)) 
 
  if ($output_form == 'yes') {
?>

 <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <label for="sid">Enter Student id:</label>
    <input type="text" id="sid" name="sid" /><br />
	<label for="tid">Enter Term id:</label>
    <input type="text" id="tid" name="tid" /><br />
	<label for="subid">Enter Subject id:</label>
    <input type="text" id="subid" name="subid" /><br />
	<label for="gid">Enter Grade id:</label>
    <input type="text" id="gid" name="gid" /><br />
	<label for="scid">Enter School id:</label>
    <input type="text" id="scid" name="scid" /><br />
	<label for="score">Enter score (Enter 0 if new student)</label>
    <input type="text" id="score" name="score" /><br />
	
    <input type="submit" name="addenrollment" value="Create enrollment" />
  </form>
  
  <?php
  }
?>
</body>
</html>