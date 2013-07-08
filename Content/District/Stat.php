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
<h1>District Database Stats</h1>
<p></p>
  <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
  
<?php
  $dbc = mysqli_connect('localhost', 'LearningInSync', 'HackedMY1', 'learninginsync')
    or die('Error connecting to MySQL server.');

  // Display all the countries
	$query = "SELECT COUNT(*) FROM District";
	$result = mysqli_query($dbc, $query);
	if(!$result==0){
	$row = mysqli_fetch_array($result);
	$count = $row[0];

  	echo 'Total number of entries in the database = ' . $count;
	
	//echo '<input type="checkbox" value="' . $row['Country_code'] .'" name="todelete[]" />';
	//echo $row['Country_name'];
	echo '<br />';
}
  mysqli_close($dbc);
?>

</body>
</html>