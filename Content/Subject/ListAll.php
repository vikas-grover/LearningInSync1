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
<h1>List of all subjects</h1>
<p></p>
  <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
  
<?php
  $dbc = mysqli_connect('localhost', 'LearningInSync', 'HackedMY1', 'learninginsync')
    or die('Error connecting to MySQL server.');

  // Display all the countries
  $query = "SELECT * FROM subject Order by subject_name";
  $result = mysqli_query($dbc, $query);
  while ($row = mysqli_fetch_array($result)) {
    
	echo  $row['subject_code'] .' '. $row['subject_name'];
	
	//echo '<input type="checkbox" value="' . $row['Country_code'] .'" name="todelete[]" />';
	//echo $row['Country_name'];
	echo '<br />';
  }

  mysqli_close($dbc);
?>

</body>
</html>