<?php
    //connect to DB
    include "./connect.php";

    //get blog id
    $id = $_GET['id'];

    //build query
    $query = 'SELECT title, publishDate, img, body FROM posts WHERE idText="' . $id . '";';

    //execute query
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);

    //echo JS func to build blog data
    echo 'loadData("' . $row["title"] . '", "' . $row["publishDate"] . '", "' . $row["img"] . '", "' . $row["body"] . '");';
?>