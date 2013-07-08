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
<h1>Add School</h1>
<p></p>
	<form method="Post" action="EnterToDB.php">    
	<?php
	echo '<table width =600px>';
	$TableName ='District';
	echo '<tr>';
	echo '<td>';
	echo 'Select a district id/name ';
	$dbc = mysqli_connect('localhost', 'LearningInSync', 'HackedMY1', 'learninginsync')
		or die('Error connecting to MySQL server.');
	$query = "Select * From $TableName order by country_code, $TableName"."_name";
	//echo $query;
	$result= mysqli_query($dbc, $query)
      or die ('Cannot find district.'); //on error display message
	echo '</td>';
	echo '<td>';
	echo '<select name="'.$TableName.'_name">';
	 while ($row = mysqli_fetch_array($result)) {
	echo '<option value="'.$row[$TableName.'_name'].'"</option>';
	echo $row['id'].' '. $row[$TableName.'_name'];
	}
	 echo '</select><br>';
	 echo '</td>';
	 echo '</tr>';
	 echo '<tr>';
		$TableName ='city';
	//echo $TableName.'<br>';
	echo '<td>';
	echo 'Select a city id/name ';
	$dbc = mysqli_connect('localhost', 'LearningInSync', 'HackedMY1', 'learninginsync')
		or die('Error connecting to MySQL server.');
	$query = "Select * From $TableName order by country_code, $TableName"."_name";
	//echo $query;
	$result= mysqli_query($dbc, $query)
      or die ('Cannot find city.'); //on error display message
	echo '</td>';
	echo '<td>';
	echo '<select name="'.$TableName.'_name">';
	 while ($row = mysqli_fetch_array($result)) {
	echo '<option value="'.$row[$TableName.'_name'].'"</option>';
	echo $row['id'].' '. $row[$TableName.'_name'];
	}
	 echo '</select><br>';
	 echo '</td>';
	 echo '</tr>';
	echo '</table>'; 
	mysqli_close($dbc);
	?>
	<table width =650px>
	<tr>
	<td>
	<label size="35" for="school_name">Enter school name:</label>
	</td>
	<td>   <input type="text" size ="30" id="school_name" name="school_name" />
	<td>
	</tr>
	<tr>
	<td>
	<input type="submit" name="Addschool" value="Add school" />
	</td>
	<td>
	<label size="35"></label>
	</td>
	</tr>
	</table>
</form>
</body>
</html>