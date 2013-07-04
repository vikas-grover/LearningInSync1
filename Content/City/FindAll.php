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
<h1>Enter a country code</h1>
<p></p>
<form method="GET" action="ListAll.php">    
	<?php
	 echo 'Select a country code';
	$dbc = mysqli_connect('localhost', 'LearningInSync', 'HackedMY1', 'learninginsync')
		or die('Error connecting to MySQL server.');
	$query = "Select * From country";
	$result= mysqli_query($dbc, $query)
      or die ('Cannot find school.'); //on error display message
	echo '<select name="country_code">';
	 while ($row = mysqli_fetch_array($result)) {
		echo '<option value="'.$row['Country_code'].'"</option>';
	echo $row['Country_code'].' ' .$row['Country_name'];
	}
	 echo '</select>';
	mysqli_close($dbc); 
	?>
	<input type="submit" name="findcity" value="Show all cities" />
  </form>
</body>
</html>