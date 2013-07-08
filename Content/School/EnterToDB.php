<?php
	if (isset($_POST['Addschool'])) {
	     $city_name = $_POST['city_name']; //take posted student name
    $school_name = $_POST['school_name']; // take posted country code
	$district_name = $_POST['District_name']; // take posted country code	
	if (empty($city_name)||empty($school_name)) {
      // We know at least one of the input fields is blank 
      echo 'Please fill out all of the information.<br />';
    }
    if (!empty($city_name) && !empty($school_name)) {	
  $dbc = mysqli_connect('localhost', 'LearningInSync', 'HackedMY1', 'learninginsync')
    or die('Error connecting to MySQL server.');

  // If all values were properly input, insert new country
  $query = "INSERT INTO school (city_name, school_name,District_name) VALUES ('$city_name', '$school_name','$district_name')";
	mysqli_query($dbc, $query)
      or die ('Data not inserted.'); //on error display message
    
	echo 'School added successfully';
  
  //while ($row = mysqli_fetch_array($result)) {
    
	//echo  $row['Country_code'] .' '. $row['Country_name'];
	
	//echo '<input type="checkbox" value="' . $row['Country_code'] .'" name="todelete[]" />';
	//echo $row['Country_name'];
	//echo '<br />';
	mysqli_close($dbc); 
 } 
 }// close the if (!empty($country_name) && !empty($country_code)) 
?>
