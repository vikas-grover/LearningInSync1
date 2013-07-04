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
<h1>School City Report</h1>
<p></p>
  <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
  
<?php
 include("pChart/pData.class");  
 include("pChart/pChart.class");  
  
  $dbc = mysqli_connect('localhost', 'LearningInSync', 'HackedMY1', 'learninginsync')
    or die('Error connecting to MySQL server.');

  // Display all the countries
	$query = "SELECT COUNT(*) as Total,city_name FROM school group by city_name order by count(*) DESC";
	$result = mysqli_query($dbc, $query);
	$DataSet = new pData;
	//$SerieNumber = 1;
	while($row = mysqli_fetch_array($result))
	{
	//echo $row['city_name'].'<br />';
	$DataSet->AddPoint($row['Total'],"NoOfSchools");
	$DataSet->AddPoint($row['city_name'],"CityName");
	//$DataSet->SetSerieName($row['city_name'],"Serie");	
	}
	//$count = $row[0];
	
	$DataSet->AddAllSeries();
	$DataSet->SetAbsciseLabelSerie("CityName");  
	 // Initialise the graph  
 $Test = new pChart(680,300); //main chart object
 $Test->setFontProperties("Fonts/tahoma.ttf",8);  
 $Test->setGraphArea(50,30,600,200);  
 $Test->drawFilledRoundedRectangle(7,7,600,223,5,244,244,244);  
 $Test->drawRoundedRectangle(5,5,650,300,5,230,230,230);  
 $Test->drawGraphArea(255,255,255,TRUE);  //graph  color
 $Test->drawScale($DataSet->GetData(),$DataSet->GetDataDescription(),SCALE_NORMAL,150,150,150,TRUE,90,0,TRUE);     
 $Test->drawGrid(4,TRUE,230,230,230,50);  
 $Test->setFixedScale(0,50,2,0,50,2);  
 $Test->addBorder($Width=2); 
  $Test->clearShadow();  
 // Draw the 0 line  
 $Test->setFontProperties("Fonts/tahoma.ttf",6);  
 $Test->drawTreshold(0,143,55,72,TRUE,TRUE);  
  
 // Draw the bar graph  
 $Test->drawBarGraph($DataSet->GetData(),$DataSet->GetDataDescription(),TRUE);  
  
 // Finish the graph  
 $Test->setFontProperties("Fonts/tahoma.ttf",8);  
 $Test->drawLegend(500,150,$DataSet->GetDataDescription(),255,255,255);  
 $Test->setFontProperties("Fonts/tahoma.ttf",10);  
 $Test->drawTitle(50,22,"Number of Schools in Each City",50,50,50,585);  
 //$Test->stroke();
 $Test->render("Rendered.png");  
		
  	//echo 'Total number of entries in the database = ' . $count;
	
	//echo '<input type="checkbox" value="' . $row['Country_code'] .'" name="todelete[]" />';
	//echo $row['Country_name'];
	//echo '<br />';
  mysqli_close($dbc);
?>
<IMG SRC='Rendered.png' WIDTH=800 HEIGHT=600>
</body>
</html>