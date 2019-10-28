
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Delete a Post</title>
  </head>
  <body>
<h1>Delete a Post</h1> <br>


<?php

$mysqli = new mysqli("mysql.eecs.ku.edu", "apg", "UiHu9mai", "apg");
if ($mysqli->connect_errno) {
      printf("Connect failed: %s<br>", $mysqli->connect_error);
      exit();
  }

  $query = "SELECT post_id, content, author_id FROM Posts ORDER by post_id";
if ($result = $mysqli->query($query)) {
  echo "<h1>Bring Down the Ban Hammer!</h1>";
  echo "<form action='DeletePostStatus.php' method='post'>";
  echo "<table border = 1>";
  echo "<th>Delete</th><th>Post_id</th><th>Content</th><th>Author</th>";
  while ($row = $result->fetch_assoc()) {
        echo "<tr><td><input type='checkbox' name='checked[" . $row["post_id"]. " ]' value='" . $row["post_id"]. " '></td>";
        echo "<td>" . $row["post_id"]. " </td>";
        echo "<td>" . $row["content"]. "</td>";
        echo "<td>" . $row["author_id"]. " </td></tr>";

}
  echo "</table>";
  echo "<input type='submit' value='Submit'>";
  echo "</form>";
  $result->free();



}

$mysqli->close();
 ?>

</body>
</html>
