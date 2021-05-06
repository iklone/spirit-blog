<?php
    //test password
    $password = $_POST["password"];
    include "./passwordCheck.php";
    if ($password != $realPassword) {
        die("Incorrect Password");
    }
    echo "Correct Password";
    echo "<br>";

    //get vars from post
    $title = $_POST["title"];
    $idText = $_POST["idText"];
    $imgURL = $_POST["imgURL"];
    $body = $_POST["body"];

    //save body to file
    $newFileURL = "../posts/" . $idText;
    $newPostFile = fopen($newFileURL, "w") or die("Unable to create file");
    fwrite($newPostFile, $body);
    fclose($newPostFile);
    echo "Saved body to " . $newFileURL;
    echo "<br>";

     //Save metadata to DB
    //connect to DB
    include "./connect.php";

    //build query
    $query = 'INSERT INTO `posts` (`title`, `img`, `body`, `idText`) VALUES ("' . $title . '", "' . $imgURL  . '", "' . $idText . '", "' . $idText . '");';
    echo $query;
    echo "<br>";

    //execute query
    $result = mysqli_query($conn, $query);
    echo "Saved metadata to DB";
    echo "<br>";
    echo '<a href="/post/' . $idText . '" target="_blank">Click to view post</a>';
?>