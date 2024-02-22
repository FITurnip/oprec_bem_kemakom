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

    if($conn->connect_error) die("connection is failed");

    $stmt = $conn->prepare('SELECT * FROM Capengurus WHERE nim = ? limit 1');
    $stmt->bind_param('s', $nim);
    $stmt->execute();
    $queryResult = $stmt->get_result();

    $result = $queryResult->fetch_assoc();
    
    $conn->close();
    return $result;
}


function getUcapanMotivasi($kelolosan) {
    $conn = connectDB();

    if($conn->connect_error) die("connection is failed");

    $time = time();
    $stmt = $conn->prepare('SELECT * FROM UcapanMotivasi WHERE kelolosan = ? ORDER BY RAND(?) LIMIT 1');
    $stmt->bind_param('ss', $kelolosan, $time);
    $stmt->execute();
    $queryResult = $stmt->get_result();

    $result = $queryResult->fetch_assoc();
    
    $conn->close();
    return $result;
}

// hastag sinariaksi salah 
// tombol close reload terus v
// javascriptnya belum ngehandle kalau datanya g ada v
// jangan pas klik close malah reload bang v
// ini urang ubah phpnya buat ngehindari sql injection. takutnya ada yang ngebobol database kemakom v
// background belum responsive sesuai kesepakatan awal v 
// prevent enter when input nim  v

