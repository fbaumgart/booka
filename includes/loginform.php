<?php
echo '<div class="forms column">
  <h2>Log in</h2>
  <hr>
<form name="loginForm" class="loginForm" action= ' . htmlspecialchars($_SERVER["PHP_SELF"]) . ' method="post" onsubmit="return validateForm2()">
  <input id="username" type="text" name="username" value="" placeholder="Enter your login">
  <br>
  <input id="password" type="password" name="password" value="" placeholder="Password">
  <br>';
  ?>
  <?php if (isset($error)): ?>
    <span class="error"><?php echo $error; ?></span>
  <?php endif ?>
  <?php
  echo '
  <button id="submit" class="button" type="submit" name="submitLogin">Log In</button>
</form>
  <p>Not our member yet? <a class="register" href="registerpage.php">Register now</a></p>
</div>';
 ?>
