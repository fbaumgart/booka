<?php
include_once 'config/session.php';
require_once('config/dbconnect.php');
if ($_SESSION['user'] == NULL) {
  header('Location: loginpage.php');
}
if (isset($_POST["button"]))
{
   $_SESSION['transactionid'] = $_POST["button"];
   header('Location: giveback.php');
}
 ?>
<!DOCTYPE html>
<html>
  <head>
    <title>My Account | Booka</title>
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    <?php include 'includes/header.php'; ?>
    <div class="wrapper3">
      <h1>My Account</h1>
      <hr>
      <h2>Rented books:</h2>
      <?php
     $userid = $_SESSION['userid'];
     $sql = "
     SELECT transactions.ID_transaction, books.ID_book, books.title,
     CONCAT(books.author_last_name,' ',books.author_first_name) AS author,
     transactions.Date_start FROM transactions NATURAL JOIN books
     WHERE transactions.Date_end IS NULL AND transactions.ID_User = '$userid' ";
     if(!$result = $con->query($sql)){
     die('There was an error running the query [' . $con->error .']');
   }
   if($result->num_rows > 0) {
     echo "<table>
         <th>Book ID</th>
         <th>Title</th>
         <th>Author</th>
         <th>Rent date</th>
       </tr>";
   while($row = $result->fetch_assoc()){
   echo "<tr>";
   echo "<td>" . $row['ID_book'] . "</td>";
   echo "<td>" . $row['title'] . "</td>";
   echo "<td>" . $row['author'] . "</td>";
   echo "<td>" . $row['Date_start'] . "</td>";
   echo "<td>" . '<form action=' . htmlspecialchars($_SERVER["PHP_SELF"]) . ' method="post"> <button type="submit" name="button" value=' . $row["ID_transaction"] . ' class="rentbutton">GIVE BACK</button> </form>' . "</td>";
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
