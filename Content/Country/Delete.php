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
<h1>Delete a country</h1>
 <p>Please select the country to delete from list and click Remove Country.</p>
  <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
 
<?php
	$dbc = mysqli_connect('localhost', 'LearningInSync', 'HackedMY1', 'learninginsync')
    or die('Error connecting to MySQL server.');
  
	if (isset($_POST['remcountry'])) {
    foreach ($_POST['todelete'] as $delete_country_code) {
      $query = "DELETE FROM country WHERE Country_code = '$delete_country_code'";
      mysqli_query($dbc, $query)
        or die('Error querying database.');
    } 
    echo 'Country(-ies) removed.<br />';
  }
	
  // Display all the countries
  $query = "SELECT * FROM country Order by Country_name";
  $result = mysqli_query($dbc, $query);
  while ($row = mysqli_fetch_array($result)) {
    echo '<input type="checkbox" value="' . $row['Country_code'] .'" name="todelete[]" />';
	echo 'Country Code: '. $row['Country_code'] .', Country Name: '. $row['Country_name'];
	
	echo '<br />';
	}// close the while
	mysqli_close($dbc); 
?> 
    <input type="submit" name="remcountry" value="Remove Country" />
  </form>
</body>
</html>