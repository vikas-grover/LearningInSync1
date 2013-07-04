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
<h1>Delete Term</h1>
 <p>Please select the term to delete from list and click Remove Term.</p>
  <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
 
<?php
	$dbc = mysqli_connect('localhost', 'LearningInSync', 'HackedMY1', 'learninginsync')
    or die('Error connecting to MySQL server.');
  
	if (isset($_POST['remterm'])) {
    foreach ($_POST['todelete'] as $delete_id) {
      $query = "DELETE FROM term WHERE id = '$delete_id'";
      mysqli_query($dbc, $query)
        or die('Error querying database.');
    } 
    echo 'Term(s) removed.<br />';
  }
	
  // Display all the countries
  $query = "SELECT * FROM term";
  $result = mysqli_query($dbc, $query);
  while ($row = mysqli_fetch_array($result)) {
    echo '<input type="checkbox" value="' . $row['id'] .'" name="todelete[]" />';
	echo 'Term ID: '. $row['id'] .', Term Name: '. $row['Term_name'];
	
	echo '<br />';
	}// close the while
	mysqli_close($dbc); 
?> 
    <input type="submit" name="remterm" value="Remove Term" />
  </form>
</body>
</html>