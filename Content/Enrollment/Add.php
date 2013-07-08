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
<h1>Add an Enrollment</h1>
<p></p>
 <form method="Post" action="EnterToDB.php">    
	<?php
	$dbc = mysqli_connect('localhost', 'LearningInSync', 'HackedMY1', 'learninginsync')
		or die('Error connecting to MySQL server.');
		
	echo '<table width ="100%">';
	echo '<col width="350">';
	echo '<col width="350">';
	
	//include_once("CreateList.php?TName=country");
	$TableName ='Country';
	echo '<tr>';
	echo '<td>';
	echo 'Select a country code/name ';
	$query = "Select * From $TableName order by country_code, $TableName"."_name";
	//echo $query;
	$result= mysqli_query($dbc, $query)
      or die ('Cannot find district.'); //on error display message
	echo '</td>';
	echo '<td>';
	echo '<select name="'.$TableName.'_code">';
	 while ($row = mysqli_fetch_array($result)) {
	echo '<option value="'.$row[$TableName.'_code'].'"</option>';
	echo $row['Country_code'].' '. $row[$TableName.'_name'];
	}
	 echo '</select><br>';
	 echo '</td>';
	 echo '</tr>';
	 echo '<tr>';

	$TableName ='District';
	echo '<tr>';
	echo '<td>';
	echo 'Select a district id/name ';
	$query = "Select * From $TableName order by country_code, $TableName"."_name";
	//echo $query;
	$result= mysqli_query($dbc, $query)
      or die ('Cannot find district.'); //on error display message
	echo '</td>';
	echo '<td>';
	echo '<select name="'.$TableName.'_id">';
	 while ($row = mysqli_fetch_array($result)) {
	echo '<option value="'.$row['id'].'"</option>';
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
	$query = "Select * From $TableName order by country_code, $TableName"."_name";
	//echo $query;
	$result= mysqli_query($dbc, $query)
      or die ('Cannot find city.'); //on error display message
	echo '</td>';
	echo '<td>';
	echo '<select name="'.$TableName.'_id">';
	 while ($row = mysqli_fetch_array($result)) {
	echo '<option value="'.$row['id'].'"</option>';
	echo $row['id'].' '. $row[$TableName.'_name'];
	}
	 echo '</select><br>';
	 echo '</td>';
	 echo '</tr>';
	
	 $TableName ='school';
	//echo $TableName.'<br>';
	echo '<td>';
	echo 'Select a school ';
	$query = "Select * From $TableName order by $TableName"."_name";
	//echo $query;
	$result= mysqli_query($dbc, $query)
      or die ('Cannot find city.'); //on error display message
	echo '</td>';
	echo '<td>';
	echo '<select name="'.$TableName.'_id">';
	 while ($row = mysqli_fetch_array($result)) {
	echo '<option value="'.$row['id'].'"</option>';
	echo $row['id'].' '. $row[$TableName.'_name'];
	}
	 echo '</select><br>';
	 echo '</td>';
	 echo '</tr>';
	
	$TableName ='term';
	//echo $TableName.'<br>';
	echo '<td>';
	echo 'Select a term ';
	$query = "Select * From $TableName order by $TableName"."_name";
	//echo $query;
	$result= mysqli_query($dbc, $query)
      or die ('Cannot find city.'); //on error display message
	echo '</td>';
	echo '<td>';
	echo '<select name="'.$TableName.'_id">';
	 while ($row = mysqli_fetch_array($result)) {
	echo '<option value="'.$row['id'].'"</option>';
	echo $row['id'].' '. $row[$TableName.'_name'];
	}
	 echo '</select><br>';
	 echo '</td>';
	 echo '</tr>';
	
	$TableName ='grade';
	//echo $TableName.'<br>';
	echo '<td>';
	echo 'Select a grade';
	$query = "Select * From $TableName order by $TableName"."_name";
	//echo $query;
	$result= mysqli_query($dbc, $query)
      or die ('Cannot find city.'); //on error display message
	echo '</td>';
	echo '<td>';
	echo '<select name="'.$TableName.'_id">';
	 while ($row = mysqli_fetch_array($result)) {
	echo '<option value="'.$row['id'].'"</option>';
	echo $row['id'].' '. $row[$TableName.'_name'];
	}
	 echo '</select><br>';
	 echo '</td>';
	 echo '</tr>';
	 
	$TableName ='form';
	//echo $TableName.'<br>';
	echo '<td>';
	echo 'Select a form ';
	$query = "Select * From $TableName order by $TableName"."_name";
	//echo $query;
	$result= mysqli_query($dbc, $query)
      or die ('Cannot find city.'); //on error display message
	echo '</td>';
	echo '<td>';
	echo '<select name="'.$TableName.'_id">';
	 while ($row = mysqli_fetch_array($result)) {
	echo '<option value="'.$row['id'].'"</option>';
	echo $row['id'].' '. $row[$TableName.'_name'];
	}
	 echo '</select><br>';
	 echo '</td>';
	 echo '</tr>';
	 
	$TableName ='subject';
	echo '<tr>';
	echo '<td>';
	echo 'Select a subject ';
	$query = "Select * From $TableName order by subject_code, $TableName"."_name";
	//echo $query;
	$result= mysqli_query($dbc, $query)
      or die ('Cannot find district.'); //on error display message
	echo '</td>';
	echo '<td>';
	echo '<select name="'.$TableName.'_code">';
	 while ($row = mysqli_fetch_array($result)) {
	echo '<option value="'.$row[$TableName.'_code'].'"</option>';
	echo $row['subject_code'].' '. $row[$TableName.'_name'];
	}
	 echo '</select><br>';
	 echo '</td>';
	 echo '</tr>';
	 echo '<tr>';
	 
	 $TableName ='student';
	//echo $TableName.'<br>';
	echo '<td>';
	echo 'Select a student';
	$query = "Select * From $TableName order by first_name,last_name";
	//echo $query;
	$result= mysqli_query($dbc, $query)
      or die ('Cannot find city.'); //on error display message
	echo '</td>';
	echo '<td>';
	echo '<select name="'.$TableName.'_id">';
	 while ($row = mysqli_fetch_array($result)) {
	echo '<option value="'.$row['id'].'"</option>';
	echo $row['id'].' '.$row['first_name'].','.$row['last_name'];
	}
	 echo '</select><br>';
	 echo '</td>';
	 echo '</tr>';
		
	echo '</table>'; 
	mysqli_close($dbc);
	?>
	<table>
	<col width="350">
	<col width="350">
	<tr>
	<td>
	<label for="score">Enter score (Enter 0 if new student)</label>
	</td>
	<td>   <input type="text" id="score" name="score" />
	<td>
	</tr>
	<tr>
	<td>
	<input type="submit" name="addenrollment" value="Create enrollment" />
	</td>
	<td>
	<label size="35"></label>
	</td>
	</tr>
	</table>
	</form>
</body>
</html>