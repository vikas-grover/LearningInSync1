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
<h1>Edit a country information</h1>
 <p>Please select the country to edit, enter the new name in the box and click Udpate Country.</p>
  <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
 
<?php
	$dbc = mysqli_connect('localhost', 'LearningInSync', 'HackedMY1', 'learninginsync')
    or die('Error connecting to MySQL server.');
	$countUpdates = 0;
	$x =0;
	$update_country_code =array(1);	unset($update_country_code);
	$update_country_name =array(1);unset($update_country_name);
	
	if (isset($_POST['updcountry'])) {
    foreach ($_POST['toupdateFrom'] as $update_code)  {
	$update_country_code[$x] =$update_code;//store array of to be updated codes
	$x++;
	}
	$x =0;
	foreach ($_POST['toupdateTo'] as $update_name)  {
		if (!$update_name=="") {
			$update_country_name[$x] =$update_name;
			$x++;
		}//store array of new country names
	}
	
	$countUpdates = count($update_country_name);
	/* if(!$countUpdates==0){
	echo $countUpdates. '<br />';
	echo count($update_country_code). '<br />';
	}
	for($x=0;$x<$countUpdates;$x++)  {
	echo $update_country_name[$x]. '<br />';//store array of new country names
	} */ //for checking the working of update_country_name
	
	for($x=0;$x<$countUpdates;$x++)  {
	$query = "Update country Set Country_Name = '$update_country_name[$x]' WHERE Country_code = '$update_country_code[$x]'";
     echo $query.'<br />';
	 mysqli_query($dbc, $query)
		or die('Error querying database.');
    } 
    echo $countUpdates.' Country(-ies) updated.<br />';
	}

	
  // Display all the countries
  $query = "SELECT * FROM country Order by Country_name";
  $result = mysqli_query($dbc, $query);
  while ($row = mysqli_fetch_array($result)) {
    echo '<input type="checkbox" value="' . $row['Country_code'] .'" name="toupdateFrom[]" />';
	echo 'Country Code: '. $row['Country_code'] .', Country Name: '. $row['Country_name'];
	echo '<input type="text" id="country_name" name="toupdateTo[]" />';
	echo '<br />';
	}// close the while
	mysqli_close($dbc); 
?>
    <input type="submit" name="updcountry" value="Update Country" />
  </form>
</body>
</html>