<?php
	$TableName =$_Get('Tname');
	echo '<tr>';
	echo '<td>';
	echo 'Select a country code/name ';
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
?>