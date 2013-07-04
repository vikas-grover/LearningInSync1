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
<h1>Delete a subject</h1>
 <p>Please select the subject to delete from list and click Remove subject.</p>
  <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
 
<?php
	$dbc = mysqli_connect('localhost', 'LearningInSync', 'HackedMY1', 'learninginsync')
    or die('Error connecting to MySQL server.');
  
	if (isset($_POST['remsubject'])) {
    foreach ($_POST['todelete'] as $delete_subject_code) {
      $query = "DELETE FROM subject WHERE subject_code = '$delete_subject_code'";
      mysqli_query($dbc, $query)
        or die('Error querying database.');
    } 
    echo 'Subject(s) removed.<br />';
  }
	
  // Display all the countries
  $query = "SELECT * FROM subject Order by subject_name";
  $result = mysqli_query($dbc, $query);
  while ($row = mysqli_fetch_array($result)) {
    echo '<input type="checkbox" value="' . $row['subject_code'] .'" name="todelete[]" />';
	echo 'subject Code: '. $row['subject_code'] .', subject Name: '. $row['subject_name'];
	
	echo '<br />';
	}// close the while
	mysqli_close($dbc); 
?> 
    <input type="submit" name="remsubject" value="Remove subject" />
  </form>
</body>
</html>