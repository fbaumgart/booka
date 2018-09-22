<?php
include_once 'config/session.php';
if ($_SESSION['user'] == NULL) {
  header('Location: loginpage.php');
}

if (isset($_POST["button"]))
{
   $_SESSION['bookid'] = $_POST["button"];
   header('Location: rent.php');
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Book Catalog | Booka</title>
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <?php include 'includes/header.php'; ?>
  <div class="wrapper3">
    <h1>Book catalog</h1>
    <hr>
    <table>
      <tr>
        <th>Book ID</th>
        <th>Title</th>
        <th>Author</th>
        <th></th>
      </tr>
      <?php
      require("config/dbconnect.php");
      $sql = "
      SELECT ID_book, title, CONCAT(author_last_name,' ',author_first_name) AS author from books";

      if(!$result = $con->query($sql)){
      die('There was an error running the query [' . $con->error .']');
      }

      while($row = $result->fetch_assoc()){
      echo "<tr>";
      echo "<td>" . $row['ID_book'] . "</td>";
      echo "<td>" . $row['title'] . "</td>";
      echo "<td>" . $row['author'] . "</td>";
      echo "<td>" . '<form action=' . htmlspecialchars($_SERVER["PHP_SELF"]) . ' method="post"> <button type="submit" name="button" value=' . $row["ID_book"] . ' class="rentbutton">RENT</button> </form>' . "</td>";
      echo "</tr>";
      }

      $result->free();
      $con->close();
      ?>
    </table>
  </div>
  
</body>

</html>
