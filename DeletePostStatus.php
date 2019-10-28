<?php

$mysqli = new mysqli("mysql.eecs.ku.edu", "apg", "UiHu9mai", "apg");
if ($mysqli->connect_errno) {
      printf("Connect failed: %s<br>", $mysqli->connect_error);
      exit();
  }

  $query = "SELECT post_id, content, author_id FROM Posts ORDER by post_id";
    if ($result = $mysqli->query($query)) {
        foreach($_POST['checked'] as $value)
        {
           $deletion="DELETE FROM Posts WHERE post_id=$value";
           if ($mysqli->query($deletion) == TRUE) {
             echo "Deleted id ". $value . "<br>";
           }
           else{

             echo "Error id ".$value." did not delete ";

           }
        }



        $result->free();
    }
    $mysqli->close();


 ?>
