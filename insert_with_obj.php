<?php
include_once 'db.php';
include_once 'User.php';

$user = new User($mysqli);
$user->insert();
