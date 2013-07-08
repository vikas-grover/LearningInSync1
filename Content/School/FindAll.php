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
<h1>Select search criteria</h1>
<p></p>
<form method="GET" action="ListAll.php">    
	<?php
	$TableName =$_GET['Criteria'];
	//echo $TableName.'<br>';
	if($TableName=='city')
	{
	echo 'Select a city id/name <br>';
	$dbc = mysqli_connect('localhost', 'LearningInSync', 'HackedMY1', 'learninginsync')
		or die('Error connecting to MySQL server.');
	$query = "Select * From $TableName order by country_code, $TableName"."_name";
	//echo $query;
	$result= mysqli_query($dbc, $query)
      or die ('Cannot find city.'); //on error display message
	echo '<select name="'.$TableName.'_name">';
	 while ($row = mysqli_fetch_array($result)) {
	echo '<option value="'.$row[$TableName.'_name'].'"</option>';
	echo $row['id'].' '. $row[$TableName.'_name'];
	}
	 echo '</select><br>';
	mysqli_close($dbc);
	}
	if($TableName=='District')
	{
	echo 'Select a district id/name <br>';
	$dbc = mysqli_connect('localhost', 'LearningInSync', 'HackedMY1', 'learninginsync')
		or die('Error connecting to MySQL server.');
	$query = "Select * From $TableName order by country_code, $TableName"."_name";
	//echo $query;
	$result= mysqli_query($dbc, $query)
      or die ('Cannot find district.'); //on error display message
	echo '<select name="'.$TableName.'_name">';
	 while ($row = mysqli_fetch_array($result)) {
	echo '<option value="'.$row[$TableName.'_name'].'"</option>';
	echo $row['id'].' '. $row[$TableName.'_name'];
	}
	 echo '</select><br>';
	mysqli_close($dbc);
	}
	?>
	<input type="submit" name="findschool" value="Show all schools" />
	<input type="hidden" name="SubmittedTable" value="<?php echo "$TableName" ?>"/>
	</form>
</body>
</html>