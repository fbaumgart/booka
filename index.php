<?php
include_once 'config/session.php';
if ($_SESSION['user'] == NULL) {
  header('Location: loginpage.php');
}
 ?>
    <!doctype html>
    <html>
    <head>
    <title>Booka | Homepage</title>
    <link rel="stylesheet" href="css/style.css">
    <script>
window.onload = function() {
document.getElementById("searchInput").focus();
};
</script>
    </head>
    <body>
    <?php include 'includes/header.php'; ?>
    <div class="wrapper">
      <div class="logo">
        <a class="navlink" href="index.php" title="Your Web Library">BOOKA</a>
      </div>
        <form class="search" action="search2.php" method="post">
          <div>
            <input id="searchInput" type="search" name="q" value="" placeholder="What do you want to read today?">
            <button id="searchButton" type="submit" style="border: 0; background: transparent">
            <img src="css/search.png" width="25px" height="25px" alt="search"/>
            </button>
          </div>
          <input type="radio" name="search_type" value="author_last_name" checked>Author
          <input type="radio" name="search_type" value="title">Title
        </form>
    </div>
    
    </body>
    </html>
