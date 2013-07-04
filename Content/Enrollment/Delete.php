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
<h1>Delete a city</h1>
 <p>Please select the city to delete from list and click Remove City.</p>
  <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
 
<?php
	if (!isset($_POST['remcity'])&& empty($_POST['remcity'])) {	//if posted from findcity.html
	$country_code = $_POST['country_code'];
	}
	else{
	$country_code = $_POST['thiscountry_code']; //if posted from within
	}
	$dbc = mysqli_connect('localhost', 'LearningInSync', 'HackedMY1', 'learninginsync')
    or die('Error connecting to MySQL server.');
  
	if (isset($_POST['remcity'])) { //if posted from within
    foreach ($_POST['todelete'] as $delete_city) { // delete the posted todelete
      $query = "DELETE FROM city WHERE city_name = '$delete_city'";
      mysqli_query($dbc, $query)
        or die('Error querying database.');
    } 
    echo 'City(-ies) removed.<br />';
  }
	//echo $country_code.'<br />';
  $query = "SELECT * FROM city WHERE country_code = '$country_code' order by city_name";// if posted from within, gets value from thiscountry_code
  //echo $query.'<br />';
  $result = mysqli_query($dbc, $query);
  while ($row = mysqli_fetch_array($result)) {
    echo '<input type="checkbox" value="' . $row['city_name'] .'" name="todelete[]" />';
	echo 'City Name: '. $row['city_name'] .', Country code: '. $row['country_code'];
	echo '<br />';
	$thiscountry_code = $row['country_code'];
	}	// close the while
	mysqli_close($dbc); 
?>
	<input type="hidden" name="thiscountry_code" value="<?php echo $thiscountry_code; ?>" />
    <input type="submit" name="remcity" value="Remove City" />
  </form>
</body>
</html>