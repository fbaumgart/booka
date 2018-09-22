<?php
include_once 'config/session.php';
if ($_SESSION['user'] == NULL) {
  header('Location: loginpage.php');
}
require_once('config/dbconnect.php');
$userid = $_SESSION['userid'];
$sql = "INSERT INTO transactions (Date_start, ID_book, ID_user) values (CURDATE(), '$_SESSION[bookid]', '$userid')";
if ($con->query($sql) === TRUE) {
  header('Location: rentsuccess.php');
} else {
    echo "Error: " . $sql . "<br>" . $con->error;
}
$_SESSION['bookid'] = NULL;
$con->close();
 ?>
