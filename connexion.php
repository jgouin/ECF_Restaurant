<?php
require_once 'session.php';

require_once ('Entity/User.php');
require_once ('Controller/UserController.php');

$userController = new UserController();
$user = $userController->getUserByEmail($_POST['email']);


$_SESSION["user"] = $user;

$_SESSION["id"] = $user->getId();
$_SESSION["username"] = $user->getUsername();
$_SESSION["email"] = $user->getEmail();
$_SESSION["nbCovers"] = $user->getNbCovers();
$_SESSION["allergies"] = $user->getAllergies();

echo "<script>window.location='index.php';</script>";
