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
<h1>Upload Content</h1>
<p></p>
<form method="post" enctype="multipart/form-data" action="Upload.php">
<?php
  $dbc = mysqli_connect('localhost', 'LearningInSync', 'HackedMY1', 'learninginsync')
		or die('Error connecting to MySQL server.');
  	echo '<table border="0" width="500">';
	//subject code
	echo '<tr>';
	echo '<td>';
	echo 'Select a subject code ';
	echo '</td>';
	$query1 = "Select * From subject";
	$result1= mysqli_query($dbc, $query1)
      or die ('Cannot find subject.'); //on error display message
	echo '<td>';
	echo '<select name="subjectcode">';
	 while ($row = mysqli_fetch_array($result1)) {
	echo '<option value="'.$row['subject_code'].'"</option>';
	echo $row['subject_code'].' '. $row['subject_name'];
	}
	 echo '</select> <br />';
	 echo '</td>';
	echo '</tr>';
	//Term id
	echo '<tr>';
	echo '<td>';
  	echo 'Select a Term id ';
	echo '</td>';
	$query2 = "Select * From term";
	$result2= mysqli_query($dbc, $query2)
      or die ('Cannot find term.'); //on error display message
	echo '<td>';
	echo '<select name="termid">';
	 while ($row = mysqli_fetch_array($result2)) {
	echo '<option value="'.$row['id'].'"</option>';
	echo $row['id'].' '. $row['Term_name'];
	}
	 echo '</select>';
	 echo '</td>';
	echo '</tr>';
	// Grade id
	echo '<tr>';
	echo '<td>';
  	echo 'Select a Grade id ';
	echo '</td>';
	$query3 = "Select * From grade";
	$result3= mysqli_query($dbc, $query3)
      or die ('Cannot find term.'); //on error display message
	echo '<td>';
	echo '<select name="gradeid">';
	 while ($row = mysqli_fetch_array($result3)) {
	echo '<option value="'.$row['id'].'"</option>';
	echo $row['id'].' '. $row['name'];
	}
	 echo '</select>';
	 echo '</td>';
	echo '</tr>';
		// School id
	echo '<tr>';
	echo '<td>';
  	echo 'Select a School id ';
	echo '</td>';
	$query4 = "Select * From school";
	$result4= mysqli_query($dbc, $query4)
      or die ('Cannot find term.'); //on error display message
	echo '<td>';
	echo '<select name="schoolid">';
	 while ($row = mysqli_fetch_array($result4)) {
	echo '<option value="'.$row['id'].'"</option>';
	echo $row['id'].' '. $row['school_name'];
	}
	 echo '</select>';
	 echo '</td>';
	echo '</tr>';
	 mysqli_close($dbc);	
echo '</table>'; 
	 
?>	 
	<input type="hidden" name="MAX_FILE_SIZE" value="15000000"> <!-- //15 mb file size-->
	<label for="BrowseFile">Browse File to Upload:</label>
	<input name="BrowseFile" type="file"><br />
	<input type="submit" name="UploadFile" value="Upload File" />
  </form>
</body>
</html>