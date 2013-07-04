<?php
function dbConnect($usertype, $connectionType = 'mysqli') {
  $host = 'localhost';
  $db = 'learninginsync';
  if ($usertype  == 'read') {
	$user = 'LearningInSync';
	$pwd = 'HackedMY1';
  } elseif ($usertype == 'write') {
	$user = 'LearningInSync';
	$pwd = 'HackedMY1';
  } else {
	exit('Unrecognized connection type');
  }
  if ($connectionType == 'mysqli') {
	return new mysqli($host, $user, $pwd, $db);
//	or die ('Cannot open database');
  } else {
    try {
      return new PDO("mysql:host=$host;dbname=$db", $user, $pwd);
    } catch (PDOException $e) {
      echo 'Cannot connect to database';
      exit;
    }
  }
}
