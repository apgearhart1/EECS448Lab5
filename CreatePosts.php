<?php
$id = $_POST["user_id"];
$pst = $_POST["post"];

$mysqli = new mysqli("mysql.eecs.ku.edu", "apg", "UiHu9mai", "apg");

/* check connection */
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

$sql = mysql_query("SELECT * FROM Users WHERE Users_id = '$id';");
$matchFound = mysql_num_rows($sql) > 0 ? 'yes' : 'no';


if(mysql_num_rows($sql) == 0 || empty($pst)) {
    echo "User does not exist, please create a new user on the Create User Page<br/>";
}

else
{

    $query = "SELECT content, author_id from Posts";

    if ($result = $mysqli->query($query))
    {
      $newContent="INSERT INTO Posts (content, author_id) VALUES ('$pst', '$id')";
      if ($mysqli->query($newContent) == TRUE) {
        echo "Your post has been made! <br>";
      }
      else {

        echo "Error posting new content <br>";
      }
      $result->free();
    }
    else
    {
        echo "Error adding content in database <br>";
    }

}







/* close connection */
$mysqli->close();



 ?>
