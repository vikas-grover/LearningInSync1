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
<h1>Enter a school id</h1>
<p></p>
<form method="GET" action="ListAll.php">    
	<?php
	 echo 'Select a school id ';
	$dbc = mysqli_connect('localhost', 'LearningInSync', 'HackedMY1', 'learninginsync')
		or die('Error connecting to MySQL server.');
	$query = "Select * From school";
	$result= mysqli_query($dbc, $query)
      or die ('Cannot find school.'); //on error display message
	echo '<select name="school_id">';
	 while ($row = mysqli_fetch_array($result)) {
	echo '<option value="'.$row['id'].'"</option>';
	echo $row['id'].' '. $row['school_name'];
	}
	 echo '</select>';
	mysqli_close($dbc); 
	?>
	<input type="submit" name="findcontent" value="Show content" />
  </form>
</body>
</html>