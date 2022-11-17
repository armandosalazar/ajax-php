<?php
include_once 'db.php';

$name = $_POST['name'];
$lastname = $_POST['lastname'];


if (!($name && $lastname)) {
  header('Content-Type: application/json', false, 400);
  echo json_encode(['status' => 'error', 'empty' => empty($name)]);
  die();
}

$sql = "SELECT * FROM users_ajax WHERE name = '$name' AND lastname = '$lastname'";
$result = $mysqli->query($sql) or die($mysqli->error);

// while ($row = $result->fetch_assoc()) {
//   $data[] = $row;
// }

if ($result->num_rows > 0) {
  $status = true;
} else {
  $status = false;
}

header('Content-Type: application/json', false, 200);
echo json_encode(['exist' => $status, 'payload' => $row = $result->fetch_assoc()]);

// if ($result) {
//   echo json_encode(['status' => 'success']);
// } else {
//   echo json_encode(['status' => 'error']);
// }