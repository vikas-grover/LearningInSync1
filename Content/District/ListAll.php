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
<h1>List of all districts</h1>
<p></p>
 
<?php
	if (isset($_GET['findDistrict'])) {
    $country_code = $_GET['country_code']; // take posted country code
    $output_form = 'no'; // if posted, then dont show add country again.
	
	if (empty($country_code)) {
      // We know at least one of the input fields is blank 
      echo 'Please fill out all of the information.<br />';
      $output_form = 'yes';
    }
  }
  else {
    $output_form = 'yes'; // if not posted
  }
  
  if (!empty($country_code)) {
  $dbc = mysqli_connect('localhost', 'LearningInSync', 'HackedMY1', 'learninginsync')
    or die('Error connecting to MySQL server.');

  // If all values were properly input, insert new country
  $query = "Select * From District Where country_code ='$country_code' order by District_name";
	$result= mysqli_query($dbc, $query)
      or die ('Cannot find any District.'); //on error display message
    
	while ($row = mysqli_fetch_array($result)) {
	echo ' District Name: '. $row['District_name'].'<br />';
	}
	mysqli_close($dbc); 
 } // close the if (!empty($country_code)) 
 ?>

</body>
</html>