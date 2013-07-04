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
<h1>List of all students</h1>
<p></p>
  <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
  
<?php
  $dbc = mysqli_connect('localhost', 'LearningInSync', 'HackedMY1', 'learninginsync')
    or die('Error connecting to MySQL server.');

  // Display all the countries
  $query = "SELECT * FROM student";
  $result = mysqli_query($dbc, $query);
  while ($row = mysqli_fetch_array($result)) {
    
	echo '<a href="../Student/Details.php?id='.$row['id'].'" target="content"> Name: '. $row['first_name'] .' '. $row['last_name'].', School: '. $row['school_id'] .'</a>';
	
	//echo '<input type="checkbox" value="' . $row['Country_code'] .'" name="todelete[]" />';
	//echo $row['Country_name'];
	echo '<br />';
  }

  mysqli_close($dbc);
?>
 </form>
</body>
</html>