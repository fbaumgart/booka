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
    <h1>Search results</h1>
    <hr>
    <?php
    require_once('config/dbconnect.php');
    $query = $_POST["q"];
    $search_type = $_POST["search_type"];
    if ($search_type == 'author_last_name'){
    $search_type = "author_last_name LIKE '%{$query}%' OR author_first_name";
}
    $sql = "
    SELECT ID_book, title, CONCAT(author_last_name,' ',author_first_name) AS author from books
    WHERE $search_type LIKE '%{$query}%'" ;
    if(!$result = $con->query($sql)){
    die('There was an error running the query [' . $con->error .']');
    }
    if($result->num_rows > 0) {
      echo "<table>
          <th>Book ID</th>
          <th>Title</th>
          <th>Author</th>
          <th></th>
        </tr>";
    while($row = $result->fetch_assoc()){
    echo "<tr>";
    echo "<td>" . $row['ID_book'] . "</td>";
    echo "<td>" . $row['title'] . "</td>";
    echo "<td>" . $row['author'] . "</td>";
    echo "<td>" . '<form action="search2.php" method="post"> <button type="submit" name="button" value=' . $row["ID_book"] . ' class="rentbutton">RENT</button> </form>' . "</td>";
    echo "</tr>";
    echo "</tr>";
    }
    echo  "</table>";
    }
    else {
      echo "No records to display!";
    }
    $result->free();
    $con->close();
    ?>
  </div>
  
</body>
</html>
