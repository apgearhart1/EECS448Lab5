<?php

  $id = $_POST["user"];


$mysqli = new mysqli("mysql.eecs.ku.edu", "apg", "UiHu9mai", "apg");

/* check connection */
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

$query = "SELECT Users_id FROM Users";
$rs = mysqli_query($mysqli,$query);
$data = mysqli_fetch_array($rs, MYSQLI_NUM);
$found = mysql_num_rows($id) > 0 ? 'no' : 'Your ID was added successfully!';

/*if (mysqli_query($mysqli, $id)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $id . "<br>" . mysqli_error($mysqli);
}*/



if($data[0] > 1) {
    echo "User Already in Exists<br/>";
}

else
{
    $newUser="INSERT INTO Users(Users_id) values('$id')";
    if (mysqli_query($mysqli,$newUser))
    {
        echo "You are now registered<br/>";
    }
    else
    {
        echo "Error adding user in database<br/>";
    }
}







/* close connection */
$mysqli->close();




 ?>
