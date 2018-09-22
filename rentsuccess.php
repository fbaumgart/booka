<?php
include_once 'config/session.php';
if ($_SESSION['user'] == NULL){
  header('Location: loginpage.php');
}
 ?>
<!DOCTYPE html>
<html >
  <head>
    <title>Book catalog | Booka</title>
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    <?php include 'includes/header.php'; ?>
    <div class="wrapper2">
      <div class="column">
        <h1>Book successfully rented!</h1>
        <p>You can search now for other books on <a class="link" href="catalog.php">Book Catalog</a> page.</p>
        <p>All information about your rented books are available on <a class="link" href="myaccount.php">My Account</a> page</p>
      </div>
      <div class="column">
      </div>
    </div>
    
  </body>
</html>
