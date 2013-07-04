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
<h1>Student Details</h1>
<p></p>
  <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
  
<?php
  $dbc = mysqli_connect('localhost', 'LearningInSync', 'HackedMY1', 'learninginsync')
    or die('Error connecting to MySQL server.');

  // Display all the countries
	$query = "SELECT s.first_name, s.last_name, c.country_name FROM Student s, Country c WHERE s.id=" .$_GET['id']." AND s.country_code = c.country_code";
	$result = mysqli_query($dbc, $query);
	echo $query .'<br />'.'<br />';
	if(!$result==0){
	echo str_pad('Name:',30,"_",STR_PAD_RIGHT).' '.str_pad('Country:',30,"_",STR_PAD_RIGHT).'<br />';
	$row = mysqli_fetch_array($result);
	
  	echo  str_pad($row['first_name'].','. $row['last_name'],30,"_",STR_PAD_RIGHT).' '.str_pad($row['country_name'],30,"_",STR_PAD_RIGHT).'<br />';
	
	//echo '<input type="checkbox" value="' . $row['Country_code'] .'" name="todelete[]" />';
	//echo $row['Country_name'];
	echo '<br />';
}
  mysqli_close($dbc);
?>

</body>
</html>