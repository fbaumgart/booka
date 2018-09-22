<?php
include_once 'login.php';
if ($_SESSION['user'] == NULL) {
  header('Location: loginpage.php');
}
 ?>
<!doctype html>
<html>
<head>
    <title> Goodbye! | Booka </title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <div class="wrapper2">
    <div class="intro column">
    <h1>Already read all amazing stuff we have?</h1>
    <p>We hope to see you soon again so you can become a total book-nerd.</p>
    <p>Thank you for using our service!</p>
  </div>
    <?php include 'includes/loginform.php'; ?>
  </div>
  <script src="validate.js"></script>
</body>
</html>
