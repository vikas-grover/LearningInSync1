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
<h1>List of uploaded contents</h1>
<p></p>
 <?php
	
	if (isset($_GET['findcontent'])) {
	$school_id = $_GET['school_id'];  // take posted country code
    $output_form = 'no'; // if posted, then dont show add country again.

	if (empty($school_id)) {
      // We know at least one of the input fields is blank 
      echo 'Please fill out all of the information.<br />';
      $output_form = 'yes';
    }
  
  if (!empty($school_id)) {

  $dbc = mysqli_connect('localhost', 'LearningInSync', 'HackedMY1', 'learninginsync')
    or die('Error connecting to MySQL server.');

  // If all values were properly input, insert new country
  $query = "Select subject_code, termid, gradeid, schoolid, name, FileID,size from content where schoolid = $school_id";
	$result= mysqli_query($dbc, $query)
      or die ('Cannot find any content.'); //on error display message
	echo '<table border="0" width="550">';
	echo '<tr>';
	echo '<td>'.'Subject'.'</td>';
	echo '<td>'.'Term'.'</td>';
	echo '<td>'.'Grade'.'</td>';
	echo '<td>'.'School'.'</td>';
	echo '<td>'.'File ID'.'</td>';
	echo '<td>'.'File'.'</td>';
	echo '</tr>';
	
	  while ($row = mysqli_fetch_array($result)) {
		echo '<tr>';
	echo '<td>'.$row['subject_code'].'</td>';
	echo '<td>'.$row['termid'].'</td>';
	echo '<td>'.$row['gradeid'].'</td>';
	echo '<td>'. $row['schoolid'].'</td>';
	echo '<td>'. $row['FileID'].'</td>';
	echo '<td>'.'<a href="../Content/Download.php?id='.$row['FileID'].'" target="content">'. $row['name'] .'</a>'.'</td>';
	echo '</tr>';
	}
	echo '</table>'; 
	mysqli_close($dbc); 
 } // close the if (!empty($country_code)) 
 }
 // if ($output_form == 'yes') {
?>

</body>
</html>