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
<h1>List of all grades</h1>
<p></p>
  <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
  
<?php
$selection = $_GET['Criteria'];
echo $selection.'<br>';
 $dbc = mysqli_connect('localhost', 'LearningInSync', 'HackedMY1', 'learninginsync')
    or die('Error connecting to MySQL server.');
if($selection =='ByGrade'){ 
  // Display all the countries
  $query = "SELECT * FROM grade";
  $result = mysqli_query($dbc, $query);
  while ($row = mysqli_fetch_array($result)) {
	echo 'id: '. $row['id'] .', Name : '. $row['grade_name'] .'</a>';
	echo '<br />';
  }
}
if($selection =='ByForm'){ 
  // Display all the countries
  $query = "SELECT * FROM Form";
  $result = mysqli_query($dbc, $query);
  while ($row = mysqli_fetch_array($result)) {
	echo 'id: '. $row['id'] .', Name : '. $row['form_name'] .'</a>';
	echo '<br />';
  }
}
  mysqli_close($dbc);
?>

</body>
</html>