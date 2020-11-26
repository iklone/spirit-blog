<?php
    //connect to DB
    include "./connect.php";

    //index of first post to return
    $start = $_GET['start'];
    //number of posts to return
    $num = $_GET['num'];

    //build query
    $query = "SELECT idText, title, img FROM posts ORDER BY publishDate DESC LIMIT " . $start . ", " . $num . ";";

    //execute query
    $result = mysqli_query($conn, $query);

    //echo JS funcs to show posts
    while ($row = mysqli_fetch_assoc($result)) {
        echo 'addPost("' . $row["idText"] . '", "' . $row["title"] . '", "' . $row["img"] . '");' . "\n";
    }
?>