<?php
if (isset($_POST['register'])) {
  $username = trim($_POST['username']);
  $password = trim($_POST['pwd']);
  $retyped = trim($_POST['conf_pwd']);
  require_once('../includes/register_user_mysqli.inc.php');
}
?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>Register</title>
<style type="text/css">
body {
	font-family:verdana,arial,sans-serif;
	margin:30px;
	background-color:#ffffff;
	}
</style>
</head>
<body>
<h1>Register</h1>
<?php
if (isset($success)) {
  echo "<p>$success</p>";
} elseif (isset($errors) && !empty($errors)) {
  echo '<ul>';
  foreach ($errors as $error) {
	echo "<li>$error</li>";
  }
  echo '</ul>';
}
?>
<form id="form1" method="post" action="">
	<table>
	<tr>
		<td>
			<label for="username">Username:</label>
		</td>
		<td>  
			<input type="text" name="username" id="username" required>
		</td>
	</tr>
	<tr>	
		<td>  
			<label for="pwd">Password:</label>
		</td>
		<td>  
			<input type="password" name="pwd" id="pwd" required>
		</td>
	</tr>
	<tr>
		<td>  
			<label for="conf_pwd">Confirm password:</label>
		</td>
		<td>  
			<input type="password" name="conf_pwd" id="conf_pwd" required>
		</td>
	</tr>
	</table>
  <p>
    <input name="register" type="submit" id="register" value="Register">
  </p>
  </form>
</body>
</html>
