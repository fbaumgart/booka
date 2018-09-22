<?php include 'login.php';
if ($_SESSION['user'] == NULL) {
  header('Location: loginpage.php');
}
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Register | Booka</title>
    <link rel="stylesheet" href="css/style.css">
  </head>

  <body>
    <div class="wrapper2">
      <div class="intro column">
        <h1>Congratulations!</h1>
        <p>Your account has been successfully activated!</p>
        <p>Please Log In to start using Booka and get your hands on all-time classic books!</p>
    </div>
      <?php include 'includes/loginform.php'; ?>
      </div>
      <script src="validate.js"></script>
  </body>
</html>
