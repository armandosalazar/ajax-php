<?php
$mysqli = new mysqli('127.0.0.1', 'root', 'root', 'test_db', 8889) or die(mysqli_error($mysqli));
if ($mysqli->connect_errno) {
  echo "Error: Fallo al conectarse a MySQL debido a: \n";
  echo "Errno: " . $mysqli->connect_errno . "\n";
  echo "Error: " . $mysqli->connect_error . "\n";
  exit;
}

$mysqli->set_charset("utf8");
?>