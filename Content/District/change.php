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
<h1>Add City</h1>
<p></p>
 <form action="Stat.php" method="post" name="test" >
<select name="District" onchange="this.form.submit();">
<option <?php if ($_POST['District'] == 'G1') print 'selected '; ?> value="G1">G1</option>
<option <?php if ($_POST['District'] == 'G2') print 'selected '; ?> value="G2">G2</option>
<option <?php if ($_POST['District'] == 'G3') print 'selected '; ?> value="G3">G3</option>
<option <?php if ($_POST['District'] == 'G4') print 'selected '; ?> value="G4">G4</option>
</select> </form>
</body>
</html>