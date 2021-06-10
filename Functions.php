<?php

/*
 * Bader Alotaibi 53306
 * Fatemah Abbas 50174
 * Andre Thomas 53453
 */

function connect() {
    $host = "localhost";
    $user = "root";
    $password = '';
    $db_name = "csis255 project";

    $c = mysqli_connect($host, $user, $password, $db_name);
    if (mysqli_connect_errno()) {
        die("Failed to connect with MySQL: " . mysqli_connect_error());
    }
    mysqli_set_charset($c, "utf8");
    return $c;
}

function comments($media,$con) {
    $sql = "SELECT * FROM Comments WHERE Media_ID =(Select Media_ID FROM media WHERE Title = '$media')";
    $result = mysqli_query($con, $sql);
    if (mysqli_num_rows($result) > 0) {
        echo "<ul class='comments'>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<li>User#" . $row['User_ID'] . " : " . $row['Text'] . "</li><br>";
        }
    } else {
        echo "No Comments";
    }
}
function get_Media_ID(){
    
}