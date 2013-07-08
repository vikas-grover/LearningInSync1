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
<h1>Add Form</h1>
<p></p>
 
<?php
	if (isset($_POST['addform'])) {
    $form_id = $_POST['form_id']; //take posted student name
    $form_name = $_POST['form_name']; // take posted country code
    $output_form = 'no'; // if posted, then dont show add country again.
	
	if (empty($form_id)||empty($form_name)) {
      // We know at least one of the input fields is blank 
      echo 'Please fill out all of the information.<br />';
      $output_form = 'yes';
    }
  }
  else {
    $output_form = 'yes'; // if not posted
  }
  
  if (!empty($form_id) && !empty($form_name)) {
  $dbc = mysqli_connect('localhost', 'LearningInSync', 'HackedMY1', 'learninginsync')
    or die('Error connecting to MySQL server.');

  // If all values were properly input, insert new country
  $query = "INSERT INTO form (id, form_name) VALUES ('$form_id', '$form_name')";
	mysqli_query($dbc, $query)
      or die ('Data not inserted.'); //on error display message
    
	echo 'Form added successfully';
  
  
	mysqli_close($dbc); 
  
 }
  if ($output_form == 'yes') {
?>

 <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <label for="form_id">Enter Form ID:</label>
    <input type="text" id="form_id" name="form_id" /><br />
    <label for="form_name">Enter Form Name:</label>
    <input type="text" id="form_name" name="form_name" /><br />
    <input type="submit" name="addform" value="Add Form" />
  </form>
  
  <?php
  }
?>
</body>
</html>