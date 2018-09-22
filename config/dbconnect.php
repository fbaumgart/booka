<?php $servername = "localhost";
$username = "root";
$password = "";
$dbname = "booka";
$con = new mysqli($servername,$username, $password, $dbname);
if ($con->connect_error) {
 die ("Failed to connect to MySQL: " . $con->connect_error);
}
?>
