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
<h1>Download Content</h1>
<p></p>
<form method="post" action="ListAllS.php">
<?php
  $dbc = mysqli_connect('localhost', 'LearningInSync', 'HackedMY1', 'learninginsync')
		or die('Error connecting to MySQL server.');
  	echo '<table border="0" width="500">';
	//school id
	echo '<tr>';
	echo '<td>';
  	echo 'Select a School id ';
	echo '</td>';
	$query1 = "Select * From school";
	$result1= mysqli_query($dbc, $query1)
      or die ('Cannot find term.'); //on error display message
	echo '<td>';
	echo '<select name="schoolid">';
	 while ($row = mysqli_fetch_array($result1)) {
	echo '<option value="'.$row['id'].'"</option>';
	echo $row['id'].' '. $row['school_name'];
	}
	 echo '</select>';
	 echo '</td>';
	echo '</tr>';
	 mysqli_close($dbc);	
echo '</table>';
?>
	<input type="submit" name="findcontent" value="Show Files" />
  </form>
</body>
</html>