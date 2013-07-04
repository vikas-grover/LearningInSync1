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
<h1>Downloading Content</h1>
<p></p>
 <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
<?php
	$File_ID = $_GET['id'];
	$dbc = mysqli_connect('localhost', 'LearningInSync', 'HackedMY1', 'learninginsync')
    or die('Error connecting to MySQL server.');
	$query = "Select name,type,size,filecontent from content where FileID = $File_ID";
	echo $query;
	$result = mysqli_query($dbc, $query)
      or die ('No File Found.'); //on error display message 
	$row = mysqli_fetch_array( $result);
	if (!empty($row['filecontent']))
	{  
	header("Content-Type: ". $row['type']);
  //  header("Content-Length: ". $row['size']);
   // header("Content-Disposition: attachment; filename=". $row['name']);
	echo $row['filecontent'];
	}
  	mysqli_close($dbc); 
 // close the if (!empty($country_name) && !empty($country_code)) 
?>
 </form>
</body>
</html>