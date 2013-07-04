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
<h1>Delete a file</h1>
 <p>Please select the file to delete from list and click Remove File.</p>
  <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
 
<?php
	$dbc = mysqli_connect('localhost', 'LearningInSync', 'HackedMY1', 'learninginsync')
    or die('Error connecting to MySQL server.');
  
	if (isset($_POST['remfile'])) {
    $file_id = $_POST['file_id'];
      $query = "DELETE FROM content WHERE FileID = $file_id";
      mysqli_query($dbc, $query)
        or die('Error querying database.');
     
    echo 'File removed.<br />';
  }
	
  // Display all the countries
  $query = "SELECT * FROM content";
  $result = mysqli_query($dbc, $query);
  	echo '<select name="file_id">';   
  while ($row = mysqli_fetch_array($result)) {
	echo '<option value="'.$row['FileID'].'"</option>';
	echo $row['FileID'].' '. $row['name'];
	//echo '<br />';
	}// close the while
	 echo '</select>';
	mysqli_close($dbc); 
?> 
    <input type="submit" name="remfile" value="Remove File" />
  </form>
</body>
</html>