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
<h1>Delete a student</h1>
 <p>Please select the student to delete from list and click Remove Student.</p>
  <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
 
<?php
	$dbc = mysqli_connect('localhost', 'LearningInSync', 'HackedMY1', 'learninginsync')
    or die('Error connecting to MySQL server.');
  
	if (isset($_POST['remstudent'])) {
    foreach ($_POST['todelete'] as $delete_id) {
      $query = "DELETE FROM student WHERE id = $delete_id";
      mysqli_query($dbc, $query)
        or die('Error querying database.');
    } 
    echo 'Student(s) removed.<br />';
  }
	
  // Display all the countries
  $query = "SELECT * FROM student";
  $result = mysqli_query($dbc, $query);
  while ($row = mysqli_fetch_array($result)) {
    echo '<input type="checkbox" value="' . $row['id'] .'" name="todelete[]" />';
	echo 'First Name: '. $row['first_name'] .', Last Name: '. $row['last_name'] .', School id: '. $row['school_id'];
	
	echo '<br />';
	}// close the while
	mysqli_close($dbc); 
?> 
    <input type="submit" name="remstudent" value="Remove Student" />
  </form>
</body>
</html>