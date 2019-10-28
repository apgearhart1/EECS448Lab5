<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>View Users Posts</title>
  </head>
  <body>
    <h2>Select a User ID</h2>
    <form class="" action="ViewUsersPosts.php" method="post">
      <select name="ids">
  <?php
  $mysqli = new mysqli("mysql.eecs.ku.edu", "apg", "UiHu9mai", "apg");
  if ($mysqli->connect_errno)
      {
          printf("Connect failed: %s\n", $mysqli->connect_error);
          exit();
      }
  $query = "SELECT Users_id FROM Users ORDER BY Users_id";

  if ($result = $mysqli->query($query)){

    while ($row = $result->fetch_assoc()){
      echo " <option value='". $row['Users_id'] ."'> ". $row['Users_id'] ." </option> ";
    }
  $result->free();

}
else{
  echo "No records available";
}
$mysqli->close();
  ?>
</select><br>
<input type="submit" value="Submit">
  </form>

  </body>
</html>
