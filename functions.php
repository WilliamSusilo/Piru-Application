<?php 

// connecting to database
$db = mysqli_connect("localhost", "root", "", "piru");

// ADD data to database
function add($data, $username){
    global $db;

    $date = htmlspecialchars($data["date"]);
    $name = htmlspecialchars($data["name"]);
    $activity = htmlspecialchars($data["activity"]);
    $time = htmlspecialchars($data["time"]);
    $room = htmlspecialchars($data["room"]);
    $participants = htmlspecialchars($data["participants"]);
    $equipments = htmlspecialchars($data["equipments"]);

    // query to insert data
    $query = "INSERT INTO borrowings
                VALUES
                ('', '$date', '$name', '$activity', '$time', '$room', '$participants', '$equipments', '$username')
                ";
    
    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

// QUERY data from database
function query($query){
    global $db;

    // query
    $result = mysqli_query($db, $query);

    $rows = [];

    // fetch
    while ( $row = mysqli_fetch_assoc($result) ){
        $rows[] = $row;
    }
    
    // returning 2 dimensions array
    return $rows;
}

?>