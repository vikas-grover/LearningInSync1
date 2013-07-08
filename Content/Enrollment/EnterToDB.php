<?php
	if (isset($_POST['addenrollment'])) {
	 $score =0;
	$country_code = $_POST['Country_code'];
	$district_id = $_POST['District_id'];
	$city_id = $_POST['city_id'];
	$school_id = $_POST['school_id']; //take posted student name
	$term_id = $_POST['term_id']; //take posted student name
    $grade_id = $_POST['grade_id']; //take posted student name
	$form_id = $_POST['form_id']; //take posted student name
    $subject_code = $_POST['subject_code']; //take posted student name
    $score = $_POST['score']; //take posted student name
	$student_id = $_POST['student_id']; //take posted student name
	
	if (empty($student_id)||empty($term_id)||empty($subject_code)||empty($grade_id)||empty($school_id)||empty($city_id)||empty($district_id)||empty($country_code)||empty($form_id)) {

      // We know at least one of the input fields is blank 
      echo 'Please fill out all of the information';
	  if (empty($student_id)) echo ' student'.'<br />';
	  if (empty($term_id)) echo 'term'.'<br />';
	  if (empty($subject_id)) echo 'subject'.'<br />';
	  if (empty($grade_id)) echo 'grade_id'.'<br />';
	  if (empty($school_id)) echo 'school_id'.'<br />';
	  if (empty($score)) echo 'score'.'<br />';

      $output_form = 'yes';
    }
  if (!empty($student_id)&&!empty($term_id)&&!empty($subject_code)&&!empty($grade_id)&&!empty($school_id)&&!empty($city_id)&&!empty($district_id)&&!empty($country_code)&&!empty($form_id)) {
  $dbc = mysqli_connect('localhost', 'LearningInSync', 'HackedMY1', 'learninginsync')
    or die('Error connecting to MySQL server.');

  // If all values were properly input, insert new country
  $query = "INSERT INTO enrollment (student_id, term_id,subject_code,grade_id,school_id,score,city_id,country_code,district_id,form_id) VALUES ('$student_id', '$term_id', '$subject_code','$grade_id', '$school_id', '$score','$city_id','$country_code','$district_id','$form_id')";
  echo $query.'<br>';
	mysqli_query($dbc, $query)
      or die ('Data not inserted.'); //on error display message
    
	echo 'Enrollment added successfully';
  	mysqli_close($dbc); 
 } // close the if (!empty($country_name) && !empty($country_code)) 
 // close the if (!empty($country_name) && !empty($country_code)) 
 }
?>
