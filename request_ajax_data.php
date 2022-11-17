<?php
include_once 'db.php';

$sql = "SELECT * FROM users_ajax";

$result = $mysqli->query($sql) or die($mysqli->error);

header('Content-Type: application/json', false, 200);
echo json_encode($result->fetch_all(MYSQLI_ASSOC));