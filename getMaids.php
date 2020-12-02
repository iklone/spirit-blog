<?php
    //connect to DB
    include "./connectMaid.php";

    //sort by which field, default id
    if (isset($_GET["sort"])) {
        $sortBy = $_GET["sort"];
    } else {
        $sortBy = "`maid`.`id`";
    }

    //build query
    $query = "SELECT maid.id, maid.christname AS forename, maid.surname, maid.MAL_ID, maid.description, maid.style, series.name AS series, series.MAL_ID AS series_MAL_ID, series.type AS series_type FROM maid, series WHERE maid.series = series.ID ORDER BY " . $sortBy . " ASC;";

    //execute query
    $result = mysqli_query($conn, $query);

    //echo JS funcs to show posts
    while ($row = mysqli_fetch_assoc($result)) {
        $name = $row["forename"] . " " . $row["surname"];
        echo 'addRow("' . $row["id"] . '", "' . $name . '", "' . $row["series"] . '", "' . $row["style"] . '", "' . $row["MAL_ID"] . '", "' . $row["series_MAL_ID"] . '", "' . $row["series_type"] . '", "' . $row["description"] . '");' . "\n";
    }
?>