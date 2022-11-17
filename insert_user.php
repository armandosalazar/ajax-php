<?php
include_once 'db.php';

$name = $_POST['name'];
$lastname = $_POST['lastname'];

if (!($name && $lastname)) {
  header('Content-Type: application/json', false, 400);
  echo json_encode(['status' => 'error', 'empty' => empty($name)]);
  die();
}

$stmt = $mysqli->prepare("INSERT INTO users_ajax (`name`, `lastname`) VALUES (?, ?)");
$stmt->bind_param("ss", $name, $lastname); // "s" means the database expects a string
// $result = $stmt->execute([$name, $lastname]);
$result = $stmt->execute();

if ($result) {
  echo json_encode(array('status' => 'success'));
} else {
  echo json_encode(['status' => 'error']);
}


