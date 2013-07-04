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
<h1>Select a city id</h1>
<p></p>
<form method="GET" action="ListAll.php">    
	<?php
	 echo 'Select a city id';
	$dbc = mysqli_connect('localhost', 'LearningInSync', 'HackedMY1', 'learninginsync')
		or die('Error connecting to MySQL server.');
	$query = "Select * From city order by country_code, city_name";
	$result= mysqli_query($dbc, $query)
      or die ('Cannot find city.'); //on error display message
	echo '<select name="city_name">';
	 while ($row = mysqli_fetch_array($result)) {
	echo '<option value="'.$row['city_name'].'"</option>';
	echo $row['id'].' '. $row['city_name'];
	}
	 echo '</select>';
	mysqli_close($dbc); 
	?>
	<input type="submit" name="findschool" value="Show all schools" />
  </form>
</body>
</html>