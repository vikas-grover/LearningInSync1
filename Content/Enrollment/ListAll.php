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
<h1>List of all enrollment</h1>
<p></p>
 <?php
	
	if (isset($_GET['findenrollment'])) {
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
  $query = "Select en.sid as SID,st.first_name as FNAME,st.last_name as LNAME,en.scid as SCHOOLID,sc.school_name as SCHOOLNAME,en.gid as GRADEID,gr.name as GRADENAME,en.tid as TERMID,te.Term_name as TERMNAME,en.subid as SUBJECTID,su.subject_name as SUBJECTNAME, en.score as SCORE From student st, school sc,grade gr,term te,subject su,enrollment en 
  Where en.scid ='$school_id' AND
  en.sid = st.id AND
  en.scid = sc.id AND
  en.tid = te.id AND
  en.gid = gr.id AND
  en.subid = su.subject_code";

	$result= mysqli_query($dbc, $query)
      or die ('Cannot find any enrollment.'); //on error display message
   	while ($row = mysqli_fetch_array($result)) {
	echo 'sid: '. $row['SID'].' name: '. $row['FNAME'].' '. $row['LNAME'].', Term: '. $row['TERMNAME']. ', Subject: '. $row['SUBJECTNAME'].', Grade: '. $row['GRADENAME'].', School: '. $row['SCHOOLNAME']. ', Score: '. $row['SCORE'].'<br />';

	}
	mysqli_close($dbc); 
 } // close the if (!empty($country_code)) 
 }
 // if ($output_form == 'yes') {
?>

</body>
</html>