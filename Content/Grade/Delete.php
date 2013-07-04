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
<h1>Delete Grade</h1>
 <p>Please select the grade to delete from list and click Remove Grade.</p>
  <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
 
<?php
	$dbc = mysqli_connect('localhost', 'LearningInSync', 'HackedMY1', 'learninginsync')
    or die('Error connecting to MySQL server.');
  
	if (isset($_POST['remgrade'])) {
    foreach ($_POST['todelete'] as $delete_id) {
      $query = "DELETE FROM grade WHERE id = $delete_id";
      mysqli_query($dbc, $query)
        or die('Error querying database.');
    } 
    echo 'Grade(s) removed.<br />';
  }
	
  // Display all the countries
  $query = "SELECT * FROM grade";
  $result = mysqli_query($dbc, $query);
  while ($row = mysqli_fetch_array($result)) {
    echo '<input type="checkbox" value="' . $row['id'] .'" name="todelete[]" />';
	echo 'Grade ID: '. $row['id'] .', Grade Name: '. $row['name'];
	
	echo '<br />';
	}// close the while
	mysqli_close($dbc); 
?> 
    <input type="submit" name="remgrade" value="Remove Grade" />
  </form>
</body>
</html>