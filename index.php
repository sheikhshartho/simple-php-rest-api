<?php

header('content-type:application/json');

include 'config/Database.php';
include 'controllers/UserController.php';
include 'models/User.php';

$db = (new Database())->connect();

$controller = new UserController($db);
$controller->handleRequst($_SERVER['REQUEST_METHOD']);
?>