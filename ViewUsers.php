<?php

$mysqli = new mysqli("mysql.eecs.ku.edu", "apg", "UiHu9mai", "apg");

/* check connection */
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

$sql = "SELECT * FROM Users;";

echo "<h1> All Users in Database </h1>";

$result = $mysqli->query($sql);
echo "<table border = 1>";
echo "<tr><th>ID</th></tr>";
if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
      echo "<tr>";
        echo "<td>" . $row["Users_id"] . "</td>" . "</tr>" ."<br>";
    }
} else {
    echo "0 results";
}
echo "</table>";
$mysqli->close();

 ?>
