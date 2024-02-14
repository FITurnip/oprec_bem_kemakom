<?php

function connectDB() {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "CapengurusSinariAksi";
    
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    return $conn;
}

function getCapengurus($nim) {
    $conn = connectDB();
    $query = "SELECT * FROM Capengurus WHERE nim = $nim limit 1;";
    $queryResult = $conn->query($query);
    $result = null;

    if ($queryResult->num_rows > 0) {
        while($row = $queryResult->fetch_assoc()) {
            $result = $row;
        }
    } else {
        echo "0 queryResults";
    }
    $conn->close();
    
    return $result;
}


function getUcapanMotivasi($kelolosan) {
    $conn = connectDB();
    if($conn->connect_error) {
        die("connection is failed");
    }
    $time = time();
    $query = "SELECT * FROM UcapanMotivasi WHERE kelolosan = $kelolosan ORDER BY RAND($time) LIMIT 1;";
    $queryResult = $conn->query($query);
    $result = null;

    if ($queryResult->num_rows > 0) {
        while($row = $queryResult->fetch_assoc()) {
            $result = $row;
        }
    } else {
        echo "0 queryResults";
    }
    $conn->close();

    return $result;
}
?>