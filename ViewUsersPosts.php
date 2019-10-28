<?php

$mysqli = new mysqli("mysql.eecs.ku.edu", "apg", "UiHu9mai", "apg");
$id = $_POST['ids'];
/* check connection */
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}
elseif (empty($id) || $id == "") {
  echo "No user selected";
  exit();
}
$query = "SELECT post_id, content, author_id FROM Posts WHERE author_id = '$id' ORDER BY post_id";

if ($result = $mysqli->query($query)) {
  echo "<table border = 1>";
  echo "<th>Post_id</th><th>Content</th><th>Author</th>";
  while ($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["post_id"]. " </td>";
        echo "<td>" . $row["content"]. "</td>";
        echo "<td>" . $row["author_id"]. " </td></tr>";

}
  $result->free();
}
echo "</table>";

$mysqli->close();

 ?>
