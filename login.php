<?php
include_once 'config/session.php';
require_once('config/dbconnect.php');

if (isset($_POST['submitLogin'])){
$username=$_POST["username"];
$password=$_POST["password"];

if ($stmt = $con -> prepare("SELECT ID_user, username, password FROM users WHERE username = ?")) {
$stmt -> bind_param('s', $username);
$stmt -> execute();
$stmt -> bind_result($userid, $user, $pass);
$stmt -> fetch();}

if ($user == $username and password_verify($password, $pass)){
  $_SESSION['user'] = $user;
  $_SESSION['userid'] = $userid;
  header('Location: index.php');
}
else {
  global $error;
  $error = "Wrong username or password";
}
$stmt->free_result();
$stmt->close();
}
$con->close();
?>
