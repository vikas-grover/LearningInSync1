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
<h1>Upload Content</h1>
<p></p>
 
<?php
	if (isset($_POST['UploadFile'])) {
	//$score =0;
    $subject_code= $_POST['subjectcode']; //take posted subject code
	$term_id = $_POST['termid']; //take posted student name
    $grade_id = $_POST['gradeid']; //take posted student name
    $school_id = $_POST['schoolid']; //take posted student name
	$fileName = $_FILES['BrowseFile']['name'];
	$tmpName  = $_FILES['BrowseFile']['tmp_name'];
	$fileSize = $_FILES['BrowseFile']['size'];
	$fileType = $_FILES['BrowseFile']['type'];
	$fp      = fopen($tmpName, 'r');
	$filecontent = fread($fp, filesize($tmpName));
	$filecontent = addslashes($filecontent);
	fclose($fp);
		if(!get_magic_quotes_gpc())
		{
			$fileName = addslashes($fileName);
		}
    $output_form = 'no'; // if posted, then dont show add country again.

	if (empty($subject_code)||empty($term_id)||empty($grade_id)||empty($school_id)||$_FILES['BrowseFile']['size'] <= 0) {
      // We know at least one of the input fields is blank 
      echo 'Please fill out all of the information';
	  if (empty($subject_code)) echo ' subject_code'.'<br />';
	  if (empty($term_id)) echo 'term'.'<br />';
	  if (empty($grade_id)) echo 'grade_id'.'<br />';
	  if (empty($school_id)) echo 'school_id'.'<br />';	  
      $output_form = 'yes';
    }
  }
  else {
    $output_form = 'yes'; // if not posted
  }
  if (!empty($subject_code)&& !empty($term_id)&& !empty($grade_id)&& !empty($school_id)&& $_FILES['BrowseFile']['size'] > 0 ) {
	$dbc = mysqli_connect('localhost', 'LearningInSync', 'HackedMY1', 'learninginsync')
    or die('Error connecting to MySQL server.');
	$query = "INSERT INTO content ( subject_code, termid, gradeid, schoolid, name, size, type, filecontent) VALUES ('$subject_code', '$term_id', '$grade_id', '$school_id','$fileName', '$fileSize', '$fileType', '$filecontent')";
	$result = mysqli_query($dbc, $query)
      or die ('Data not inserted.'); //on error display message 
	echo '<br>File '.$fileName.' uploaded';
  	mysqli_close($dbc); 
 } // close the if (!empty($country_name) && !empty($country_code)) 
?>
</body>
</html>