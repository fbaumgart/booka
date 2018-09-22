<?php include 'register.php'; ?>

<html>
<head>
  <title>Register | Booka</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <div class="wrapper2">
    <div class="column">
    <h1>Join Booka today!</h1>
    <p>Dostoyevsky, Czechow, Kafka, Bukowski, Nesbo - all best books in one place! </p>
    <p>Register now and gain access to our book catalogue. Rent one in no time!</p>
    <hr><br>
    <p>Already have an account? <a class="register" href="loginpage.php">Login!</a></p>
    </div>
    <div class="column">
      <h2>Sign up</h2> <hr>
      <form name="loginForm" class="loginForm" action="registerpage.php" method="post" onsubmit="return validateForm()">
        <input type="text" name="username" value="" placeholder="Login" autocomplete="off">
          <?php if (isset($name_error)): ?>
	  	    <br><span class="error"><?php echo $name_error; ?></span>
	        <?php endif ?>
        <input type="password" name="password" value="" placeholder="Password" autocomplete="off">
          <?php if (isset($password_error)): ?>
	  	    <br><span class="error"><?php echo $password_error; ?></span>
	        <?php endif ?>
        <input id="confirmPassword" type="password" name="confirmPassword" value="" placeholder="Confirm password" autocomplete="off">
          <?php if (isset($password_error2)): ?>
	  	    <br><span class="error"><?php echo $password_error2; ?></span>
	        <?php endif ?>
        <input id="email" type="text" name="email" value="" placeholder="E-mail address" autocomplete="off">
          <?php if (isset($email_error)): ?>
      	  <br><span class="error"><?php echo $email_error; ?></span>
          <?php endif ?>
        <button type="submit" name="button" class="button">Register now</button>
      </form>
    </div>
  </div>
  <script src="validate.js"></script>

</body>
</html>
