<?php
    //connect to DB
    include "./connect.php";

    //build query
    $query = "SELECT idText, title FROM posts ORDER BY publishDate DESC LIMIT 12;";

    //execute query
    $result = mysqli_query($conn, $query);

    //echo JS funcs to show posts
    while ($row = mysqli_fetch_assoc($result)) {
        echo 'addToArchive("' . $row["idText"] . '", "' . $row["title"] . '");' . "\n";
    }
?>