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
<h1>Delete a District</h1>
 <p>Please select the District to delete from list and click Remove District.</p>
  <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
 
<?php
	if (!isset($_POST['remDistrict'])&& empty($_POST['remDistrict'])) {	//if posted from findDistrict.html
	$country_code = $_POST['country_code'];
	}
	else{
	$country_code = $_POST['thiscountry_code']; //if posted from within
	}
	$dbc = mysqli_connect('localhost', 'LearningInSync', 'HackedMY1', 'learninginsync')
    or die('Error connecting to MySQL server.');
  
	if (isset($_POST['remDistrict'])) { //if posted from within
    foreach ($_POST['todelete'] as $delete_District) { // delete the posted todelete
      $query = "DELETE FROM District WHERE District_name = '$delete_District'";
      mysqli_query($dbc, $query)
        or die('Error querying database.');
    } 
    echo 'District(-ies) removed.<br />';
  }
	//echo $country_code.'<br />';
  $query = "SELECT * FROM District WHERE country_code = '$country_code' order by District_name";// if posted from within, gets value from thiscountry_code
  //echo $query.'<br />';
  $result = mysqli_query($dbc, $query);
  while ($row = mysqli_fetch_array($result)) {
    echo '<input type="checkbox" value="' . $row['District_name'] .'" name="todelete[]" />';
	echo 'District Name: '. $row['District_name'] .', Country code: '. $row['country_code'];
	echo '<br />';
	$thiscountry_code = $row['country_code'];
	}	// close the while
	mysqli_close($dbc); 
?>
	<input type="hidden" name="thiscountry_code" value="<?php echo $thiscountry_code; ?>" />
    <input type="submit" name="remDistrict" value="Remove District" />
  </form>
</body>
</html>