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
<h1>List of all schools</h1>
<p></p>
 
<?php
	if (isset($_GET['findschool'])) {
	$MyTable=$_GET['SubmittedTable'];
//	echo $MyTable;
    $criteria_name = $_GET['SubmittedTable'].'_name'; 
	//echo $criteria_name;
	$criteria_value=$_GET[$MyTable.'_name']; 
	// take posted country code
    $output_form = 'no'; // if posted, then dont show add country again.
	
	if (empty($MyTable)) {
      // We know at least one of the input fields is blank 
      echo 'Go back and please fill out all of the information.<br />';
      $output_form = 'yes';
    }
  }
  else {
    $output_form = 'yes'; // if not posted
  }
  
  if (!empty($MyTable)) {
  $dbc = mysqli_connect('localhost', 'LearningInSync', 'HackedMY1', 'learninginsync')
    or die('Error connecting to MySQL server.');

  // If all values were properly input, insert new country
  $query = "Select * From school Where $criteria_name ='$criteria_value' order by school_name";
	$result= mysqli_query($dbc, $query)
      or die ('Cannot find any school.'); //on error display message
    
	while ($row = mysqli_fetch_array($result)) {
	echo ' ID: '. $row['id'].', School Name: '. $row['school_name'].'<br />';
	}
	mysqli_close($dbc); 
 } // close the if (!empty($country_code)) 
 
?>
</body>
</html>