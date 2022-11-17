<?php
class User {
  function __construct($mysqli) {
    $this->mysqli = $mysqli;
  }

  function insert($name, $lastname) {
    $sql = "INSERT INTO users_ajax (`name`, `lastname`) VALUES (?, ?)";
    $stmt = $this->mysqli->prepare($sql);
    $stmt->bind_param("ss", $name, $lastname);
    $result = $stmt->execute();
    return $result;
  }
}
?>