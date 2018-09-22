<?php
include_once 'config/session.php';
if ($_SESSION['user'] == NULL) {
  header('Location: loginpage.php');
}
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "booka";
$con = new mysqli($servername,$username, $password, $dbname);
$sql = "UPDATE transactions SET Date_end=CURDATE() WHERE ID_transaction='$_SESSION[transactionid]'";
if ($con->query($sql) === TRUE) {
    header('Location: givebacksuccess.php');
} else {
    echo "Error: " . $sql . "<br>" . $con->error;
}
$con->close();
 ?>
